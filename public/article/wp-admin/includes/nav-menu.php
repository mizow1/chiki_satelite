<?php
/**
 * Core Navigation Menu API
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 3.0.0
 */

/** Walker_Nav_Menu_Edit class */
require_once ABSPATH . 'wp-admin/includes/class-walker-nav-menu-edit.php';

/** Walker_Nav_Menu_Checklist class */
require_once ABSPATH . 'wp-admin/includes/class-walker-nav-menu-checklist.php';

/**
 * Prints the appropriate response to a menu quick search.
 *
 * @since 3.0.0
 *
 * @param array $request The unsanitized request values.
 */
function _wp_ajax_menu_quick_search( $request = array() ) {
	$args            = array();
	$type            = isset( $request['type'] ) ? $request['type'] : '';
	$object_type     = isset( $request['object_type'] ) ? $request['object_type'] : '';
	$query           = isset( $request['q'] ) ? $request['q'] : '';
	$response_format = isset( $request['response-format'] ) ? $request['response-format'] : '';

	if ( ! $response_format || ! in_array( $response_format, array( 'json', 'markup' ), true ) ) {
		$response_format = 'json';
	}

	if ( 'markup' === $response_format ) {
		$args['walker'] = new Walker_Nav_Menu_Checklist();
	}

	if ( 'get-post-item' === $type ) {
		if ( post_type_exists( $object_type ) ) {
			if ( isset( $request['ID'] ) ) {
				$object_id = (int) $request['ID'];

				if ( 'markup' === $response_format ) {
					echo walk_nav_menu_tree(
						array_map( 'wp_setup_nav_menu_item', array( get_post( $object_id ) ) ),
						0,
						(object) $args
					);
				} elseif ( 'json' === $response_format ) {
					echo wp_json_encode(
						array(
							'ID'         => $object_id,
							'post_title' => get_the_title( $object_id ),
							'post_type'  => get_post_type( $object_id ),
						)
					);
					echo "\n";
				}
			}
		} elseif ( taxonomy_exists( $object_type ) ) {
			if ( isset( $request['ID'] ) ) {
				$object_id = (int) $request['ID'];

				if ( 'markup' === $response_format ) {
					echo walk_nav_menu_tree(
						array_map( 'wp_setup_nav_menu_item', array( get_term( $object_id, $object_type ) ) ),
						0,
						(object) $args
					);
				} elseif ( 'json' === $response_format ) {
					$post_obj = get_term( $object_id, $object_type );
					echo wp_json_encode(
						array(
							'ID'         => $object_id,
							'post_title' => $post_obj->name,
							'post_type'  => $object_type,
						)
					);
					echo "\n";
				}
			}
		}
	} elseif ( preg_match( '/quick-search-(posttype|taxonomy)-([a-zA-Z_-]*\b)/', $type, $matches ) ) {
		if ( 'posttype' === $matches[1] && get_post_type_object( $matches[2] ) ) {
			$post_type_obj = _wp_nav_menu_meta_box_object( get_post_type_object( $matches[2] ) );
			$args          = array_merge(
				$args,
				array(
					'no_found_rows'          => true,
					'update_post_meta_cache' => false,
					'update_post_term_cache' => false,
					'posts_per_page'         => 10,
					'post_type'              => $matches[2],
					's'                      => $query,
				)
			);

			if ( isset( $post_type_obj->_default_query ) ) {
				$args = array_merge( $args, (array) $post_type_obj->_default_query );
			}

			$search_results_query = new WP_Query( $args );
			if ( ! $search_results_query->have_posts() ) {
				return;
			}

			while ( $search_results_query->have_posts() ) {
				$post = $search_results_query->next_post();

				if ( 'markup' === $response_format ) {
					$var_by_ref = $post->ID;
					echo walk_nav_menu_tree(
						array_map( 'wp_setup_nav_menu_item', array( get_post( $var_by_ref ) ) ),
						0,
						(object) $args
					);
				} elseif ( 'json' === $response_format ) {
					echo wp_json_encode(
						array(
							'ID'         => $post->ID,
							'post_title' => get_the_title( $post->ID ),
							'post_type'  => $matches[2],
						)
					);
					echo "\n";
				}
			}
		} elseif ( 'taxonomy' === $matches[1] ) {
			$terms = get_terms(
				array(
					'taxonomy'   => $matches[2],
					'name__like' => $query,
					'number'     => 10,
					'hide_empty' => false,
				)
			);

			if ( empty( $terms ) || is_wp_error( $terms ) ) {
				return;
			}

			foreach ( (array) $terms as $term ) {
				if ( 'markup' === $response_format ) {
					echo walk_nav_menu_tree(
						array_map( 'wp_setup_nav_menu_item', array( $term ) ),
						0,
						(object) $args
					);
				} elseif ( 'json' === $response_format ) {
					echo wp_json_encode(
						array(
							'ID'         => $term->term_id,
							'post_title' => $term->name,
							'post_type'  => $matches[2],
						)
					);
					echo "\n";
				}
			}
		}
	}
}

/**
 * Register nav menu meta boxes and advanced menu items.
 *
 * @since 3.0.0
 */
function wp_nav_menu_setup() {
	// Register meta boxes.
	wp_nav_menu_post_type_meta_boxes();
	add_meta_box(
		'add-custom-links',
		__( 'Custom Links' ),
		'wp_nav_menu_item_link_meta_box',
		'nav-menus',
		'side',
		'default'
	);
	wp_nav_menu_taxonomy_meta_boxes();

	// Register advanced menu items (columns).
	add_filter( 'manage_nav-menus_columns', 'wp_nav_menu_manage_columns' );

	// If first time editing, disable advanced items by default.
	if ( false === get_user_option( 'managenav-menuscolumnshidden' ) ) {
		$user = wp_get_current_user();
		update_user_meta(
			$user->ID,
			'managenav-menuscolumnshidden',
			array(
				0 => 'link-target',
				1 => 'css-classes',
				2 => 'xfn',
				3 => 'description',
				4 => 'title-attribute',
			)
		);
	}
}

/**
 * Limit the amount of meta boxes to pages, posts, links, and categories for first time users.
 *
 * @since 3.0.0
 *
 * @global array $wp_meta_boxes Global meta box state.
 */
function wp_initial_nav_menu_meta_boxes() {
	global $wp_meta_boxes;

	if ( get_user_option( 'metaboxhidden_nav-menus' ) !== false || ! is_array( $wp_meta_boxes ) ) {
		return;
	}

	$initial_meta_boxes = array( 'add-post-type-page', 'add-post-type-post', 'add-custom-links', 'add-category' );
	$hidden_meta_boxes  = array();

	foreach ( array_keys( $wp_meta_boxes['nav-menus'] ) as $context ) {
		foreach ( array_keys( $wp_meta_boxes['nav-menus'][ $context ] ) as $priority ) {
			foreach ( $wp_meta_boxes['nav-menus'][ $context ][ $priority ] as $box ) {
				if ( in_array( $box['id'], $initial_meta_boxes, true ) ) {
					unset( $box['id'] );
				} else {
					$hidden_meta_boxes[] = $box['id'];
				}
			}
		}
	}

	$user = wp_get_current_user();
	update_user_meta( $user->ID, 'metaboxhidden_nav-menus', $hidden_meta_boxes );
}

/**
 * Creates meta boxes for any post type menu item..
 *
 * @since 3.0.0
 */
function wp_nav_menu_post_type_meta_boxes() {
	$post_types = get_post_types( array( 'show_in_nav_menus' => true ), 'object' );

	if ( ! $post_types ) {
		return;
	}

	foreach ( $post_types as $post_type ) {
		/**
		 * Filters whether a menu items meta box will be added for the current
		 * object type.
		 *
		 * If a falsey value is returned instead of an object, the menu items
		 * meta box for the current meta box object will not be added.
		 *
		 * @since 3.0.0
		 *
		 * @param WP_Post_Type|false $post_type The current object to add a menu items
		 *                                      meta box for.
		 */
		$post_type = apply_filters( 'nav_menu_meta_box_object', $post_type );

		if ( $post_type ) {
			$id = $post_type->name;
			// Give pages a higher priority.
			$priority = ( 'page' === $post_type->name ? 'core' : 'default' );
			add_meta_box(
				"add-post-type-{$id}",
				$post_type->labels->name,
				'wp_nav_menu_item_post_type_meta_box',
				'nav-menus',
				'side',
				$priority,
				$post_type
			);
		}
	}
}

/**
 * Creates meta boxes for any taxonomy menu item.
 *
 * @since 3.0.0
 */
function wp_nav_menu_taxonomy_meta_boxes() {
	$taxonomies = get_taxonomies( array( 'show_in_nav_menus' => true ), 'object' );

	if ( ! $taxonomies ) {
		return;
	}

	foreach ( $taxonomies as $tax ) {
		/** This filter is documented in wp-admin/includes/nav-menu.php */
		$tax = apply_filters( 'nav_menu_meta_box_object', $tax );

		if ( $tax ) {
			$id = $tax->name;
			add_meta_box(
				"add-{$id}",
				$tax->labels->name,
				'wp_nav_menu_item_taxonomy_meta_box',
				'nav-menus',
				'side',
				'default',
				$tax
			);
		}
	}
}

/**
 * Check whether to disable the Menu Locations meta box submit button and inputs.
 *
 * @since 3.6.0
 * @since 5.3.1 The `$display` parameter was added.
 *
 * @global bool $one_theme_location_no_menus to determine if no menus exist
 *
 * @param int|string $nav_menu_selected_id ID, name, or slug of the currently selected menu.
 * @param bool       $display              Whether to display or just return the string.
 * @return string|false Disabled attribute if at least one menu exists, false if not.
 */
function wp_nav_menu_disabled_check( $nav_menu_selected_id, $display = true ) {
	global $one_theme_location_no_menus;

	if ( $one_theme_location_no_menus ) {
		return false;
	}

	return disabled( $nav_menu_selected_id, 0, $display );
}

/**
 * Displays a meta box for the custom links menu item.
 *
 * @since 3.0.0
 *
 * @global int        $_nav_menu_placeholder
 * @global int|string $nav_menu_selected_id
 */
function wp_nav_menu_item_link_meta_box() {
	global $_nav_menu_placeholder, $nav_menu_selected_id;

	$_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;

	?>
	<div class="customlinkdiv" id="customlinkdiv">
		<input type="hidden" value="custom" name="menu-item[<?php echo $_nav_menu_placeholder; ?>][menu-item-type]" />
		<p id="menu-item-url-wrap" class="wp-clearfix">
			<label class="howto" for="custom-menu-item-url"><?php _e( 'URL' ); ?></label>
			<input id="custom-menu-item-url" name="menu-item[<?php echo $_nav_menu_placeholder; ?>][menu-item-url]"
				type="text"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
				class="code menu-item-textbox form-required" placeholder="https://"
			/>
			<span id="custom-url-error" class="error-message" style="display: none;"><?php _e( 'Please provide a valid link.' ); ?></span>
		</p>

		<p id="menu-item-name-wrap" class="wp-clearfix">
			<label class="howto" for="custom-menu-item-name"><?php _e( 'Link Text' ); ?></label>
			<input id="custom-menu-item-name" name="menu-item[<?php echo $_nav_menu_placeholder; ?>][menu-item-title]"
				type="text"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
				class="regular-text menu-item-textbox"
			/>
		</p>

		<p class="button-controls wp-clearfix">
			<span class="add-to-menu">
				<input id="submit-customlinkdiv" name="add-custom-menu-item"
					type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
					class="button submit-add-to-menu right" value="<?php esc_attr_e( 'Add to Menu' ); ?>"
				/>
				<span class="spinner"></span>
			</span>
		</p>

	</div><!-- /.customlinkdiv -->
	<?php
}

/**
 * Displays a meta box for a post type menu item.
 *
 * @since 3.0.0
 *
 * @global int        $_nav_menu_placeholder
 * @global int|string $nav_menu_selected_id
 *
 * @param string $data_object Not used.
 * @param array  $box {
 *     Post type menu item meta box arguments.
 *
 *     @type string       $id       Meta box 'id' attribute.
 *     @type string       $title    Meta box title.
 *     @type callable     $callback Meta box display callback.
 *     @type WP_Post_Type $args     Extra meta box arguments (the post type object for this meta box).
 * }
 */
function wp_nav_menu_item_post_type_meta_box( $data_object, $box ) {
	global $_nav_menu_placeholder, $nav_menu_selected_id;

	$post_type_name = $box['args']->name;
	$post_type      = get_post_type_object( $post_type_name );
	$tab_name       = $post_type_name . '-tab';

	// Paginate browsing for large numbers of post objects.
	$per_page = 50;
	$pagenum  = isset( $_REQUEST[ $tab_name ] ) && isset( $_REQUEST['paged'] ) ? absint( $_REQUEST['paged'] ) : 1;
	$offset   = 0 < $pagenum ? $per_page * ( $pagenum - 1 ) : 0;

	$args = array(
		'offset'                 => $offset,
		'order'                  => 'ASC',
		'orderby'                => 'title',
		'posts_per_page'         => $per_page,
		'post_type'              => $post_type_name,
		'suppress_filters'       => true,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false,
	);

	if ( isset( $box['args']->_default_query ) ) {
		$args = array_merge( $args, (array) $box['args']->_default_query );
	}

	/*
	 * If we're dealing with pages, let's prioritize the Front Page,
	 * Posts Page and Privacy Policy Page at the top of the list.
	 */
	$important_pages = array();
	if ( 'page' === $post_type_name ) {
		$suppress_page_ids = array();

		// Insert Front Page or custom Home link.
		$front_page = 'page' === get_option( 'show_on_front' ) ? (int) get_option( 'page_on_front' ) : 0;

		$front_page_obj = null;

		if ( ! empty( $front_page ) ) {
			$front_page_obj = get_post( $front_page );
		}

		if ( $front_page_obj ) {
			$front_page_obj->front_or_home = true;

			$important_pages[]   = $front_page_obj;
			$suppress_page_ids[] = $front_page_obj->ID;
		} else {
			$_nav_menu_placeholder = ( 0 > $_nav_menu_placeholder ) ? (int) $_nav_menu_placeholder - 1 : -1;
			$front_page_obj        = (object) array(
				'front_or_home' => true,
				'ID'            => 0,
				'object_id'     => $_nav_menu_placeholder,
				'post_content'  => '',
				'post_excerpt'  => '',
				'post_parent'   => '',
				'post_title'    => _x( 'Home', 'nav menu home label' ),
				'post_type'     => 'nav_menu_item',
				'type'          => 'custom',
				'url'           => home_url( '/' ),
			);

			$important_pages[] = $front_page_obj;
		}

		// Insert Posts Page.
		$posts_page = 'page' === get_option( 'show_on_front' ) ? (int) get_option( 'page_for_posts' ) : 0;

		if ( ! empty( $posts_page ) ) {
			$posts_page_obj = get_post( $posts_page );

			if ( $posts_page_obj ) {
				$front_page_obj->posts_page = true;

				$important_pages[]   = $posts_page_obj;
				$suppress_page_ids[] = $posts_page_obj->ID;
			}
		}

		// Insert Privacy Policy Page.
		$privacy_policy_page_id = (int) get_option( 'wp_page_for_privacy_policy' );

		if ( ! empty( $privacy_policy_page_id ) ) {
			$privacy_policy_page = get_post( $privacy_policy_page_id );

			if ( $privacy_policy_page instanceof WP_Post && 'publish' === $privacy_policy_page->post_status ) {
				$privacy_policy_page->privacy_policy_page = true;

				$important_pages[]   = $privacy_policy_page;
				$suppress_page_ids[] = $privacy_policy_page->ID;
			}
		}

		// Add suppression array to arguments for WP_Query.
		if ( ! empty( $suppress_page_ids ) ) {
			$args['post__not_in'] = $suppress_page_ids;
		}
	}

	// @todo Transient caching of these results with proper invalidation on updating of a post of this type.
	$get_posts = new WP_Query();
	$posts     = $get_posts->query( $args );

	// Only suppress and insert when more than just suppression pages available.
	if ( ! $get_posts->post_count ) {
		if ( ! empty( $suppress_page_ids ) ) {
			unset( $args['post__not_in'] );
			$get_posts = new WP_Query();
			$posts     = $get_posts->query( $args );
		} else {
			echo '<p>' . __( 'No items.' ) . '</p>';
			return;
		}
	} elseif ( ! empty( $important_pages ) ) {
		$posts = array_merge( $important_pages, $posts );
	}

	$num_pages = $get_posts->max_num_pages;

	$page_links = paginate_links(
		array(
			'base'               => add_query_arg(
				array(
					$tab_name     => 'all',
					'paged'       => '%#%',
					'item-type'   => 'post_type',
					'item-object' => $post_type_name,
				)
			),
			'format'             => '',
			'prev_text'          => '<span aria-label="' . esc_attr__( 'Previous page' ) . '">' . __( '&laquo;' ) . '</span>',
			'next_text'          => '<span aria-label="' . esc_attr__( 'Next page' ) . '">' . __( '&raquo;' ) . '</span>',
			/* translators: Hidden accessibility text. */
			'before_page_number' => '<span class="screen-reader-text">' . __( 'Page' ) . '</span> ',
			'total'              => $num_pages,
			'current'            => $pagenum,
		)
	);

	$db_fields = false;
	if ( is_post_type_hierarchical( $post_type_name ) ) {
		$db_fields = array(
			'parent' => 'post_parent',
			'id'     => 'ID',
		);
	}

	$walker = new Walker_Nav_Menu_Checklist( $db_fields );

	$current_tab = 'most-recent';

	if ( isset( $_REQUEST[ $tab_name ] ) && in_array( $_REQUEST[ $tab_name ], array( 'all', 'search' ), true ) ) {
		$current_tab = $_REQUEST[ $tab_name ];
	}

	if ( ! empty( $_REQUEST[ "quick-search-posttype-{$post_type_name}" ] ) ) {
		$current_tab = 'search';
	}

	$removed_args = array(
		'action',
		'customlink-tab',
		'edit-menu-item',
		'menu-item',
		'page-tab',
		'_wpnonce',
	);

	$most_recent_url = '';
	$view_all_url    = '';
	$search_url      = '';

	if ( $nav_menu_selected_id ) {
		$most_recent_url = add_query_arg( $tab_name, 'most-recent', remove_query_arg( $removed_args ) );
		$view_all_url    = add_query_arg( $tab_name, 'all', remove_query_arg( $removed_args ) );
		$search_url      = add_query_arg( $tab_name, 'search', remove_query_arg( $removed_args ) );
	}
	?>
	<div id="<?php echo esc_attr( "posttype-{$post_type_name}" ); ?>" class="posttypediv">
		<ul id="<?php echo esc_attr( "posttype-{$post_type_name}-tabs" ); ?>" class="posttype-tabs add-menu-item-tabs">
			<li <?php echo ( 'most-recent' === $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link"
					data-type="<?php echo esc_attr( "tabs-panel-posttype-{$post_type_name}-most-recent" ); ?>"
					href="<?php echo esc_url( $most_recent_url . "#tabs-panel-posttype-{$post_type_name}-most-recent" ); ?>"
				>
					<?php _e( 'Most Recent' ); ?>
				</a>
			</li>
			<li <?php echo ( 'all' === $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link"
					data-type="<?php echo esc_attr( "{$post_type_name}-all" ); ?>"
					href="<?php echo esc_url( $view_all_url . "#{$post_type_name}-all" ); ?>"
				>
					<?php _e( 'View All' ); ?>
				</a>
			</li>
			<li <?php echo ( 'search' === $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link"
					data-type="<?php echo esc_attr( "tabs-panel-posttype-{$post_type_name}-search" ); ?>"
					href="<?php echo esc_url( $search_url . "#tabs-panel-posttype-{$post_type_name}-search" ); ?>"
				>
					<?php _e( 'Search' ); ?>
				</a>
			</li>
		</ul><!-- .posttype-tabs -->

		<div id="<?php echo esc_attr( "tabs-panel-posttype-{$post_type_name}-most-recent" ); ?>"
			class="tabs-panel <?php echo ( 'most-recent' === $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>"
			role="region" aria-label="<?php esc_attr_e( 'Most Recent' ); ?>" tabindex="0"
		>
			<ul id="<?php echo esc_attr( "{$post_type_name}checklist-most-recent" ); ?>"
				class="categorychecklist form-no-clear"
			>
				<?php
				$recent_args = array_merge(
					$args,
					array(
						'orderby'        => 'post_date',
						'order'          => 'DESC',
						'posts_per_page' => 15,
					)
				);
				$most_recent = $get_posts->query( $recent_args );

				$args['walker'] = $walker;

				/**
				 * Filters the posts displayed in the 'Most Recent' tab of the current
				 * post type's menu items meta box.
				 *
				 * The dynamic portion of the hook name, `$post_type_name`, refers to the post type name.
				 *
				 * Possible hook names include:
				 *
				 *  - `nav_menu_items_post_recent`
				 *  - `nav_menu_items_page_recent`
				 *
				 * @since 4.3.0
				 * @since 4.9.0 Added the `$recent_args` parameter.
				 *
				 * @param WP_Post[] $most_recent An array of post objects being listed.
				 * @param array     $args        An array of `WP_Query` arguments for the meta box.
				 * @param array     $box         Arguments passed to `wp_nav_menu_item_post_type_meta_box()`.
				 * @param array     $recent_args An array of `WP_Query` arguments for 'Most Recent' tab.
				 */
				$most_recent = apply_filters(
					"nav_menu_items_{$post_type_name}_recent",
					$most_recent,
					$args,
					$box,
					$recent_args
				);

				echo walk_nav_menu_tree(
					array_map( 'wp_setup_nav_menu_item', $most_recent ),
					0,
					(object) $args
				);
				?>
			</ul>
		</div><!-- /.tabs-panel -->

		<div id="<?php echo esc_attr( "tabs-panel-posttype-{$post_type_name}-search" ); ?>"
			class="tabs-panel <?php echo ( 'search' === $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>"
			role="region" aria-label="<?php echo esc_attr( $post_type->labels->search_items ); ?>" tabindex="0"
		>
			<?php
			if ( isset( $_REQUEST[ "quick-search-posttype-{$post_type_name}" ] ) ) {
				$searched       = esc_attr( $_REQUEST[ "quick-search-posttype-{$post_type_name}" ] );
				$search_results = get_posts(
					array(
						's'         => $searched,
						'post_type' => $post_type_name,
						'fields'    => 'all',
						'order'     => 'DESC',
					)
				);
			} else {
				$searched       = '';
				$search_results = array();
			}
			?>
			<p class="quick-search-wrap">
				<label for="<?php echo esc_attr( "quick-search-posttype-{$post_type_name}" ); ?>" class="screen-reader-text">
					<?php
					/* translators: Hidden accessibility text. */
					_e( 'Search' );
					?>
				</label>
				<input type="search"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
					class="quick-search" value="<?php echo $searched; ?>"
					name="<?php echo esc_attr( "quick-search-posttype-{$post_type_name}" ); ?>"
					id="<?php echo esc_attr( "quick-search-posttype-{$post_type_name}" ); ?>"
				/>
				<span class="spinner"></span>
				<?php
				submit_button(
					__( 'Search' ),
					'small quick-search-submit hide-if-js',
					'submit',
					false,
					array( 'id' => "submit-quick-search-posttype-{$post_type_name}" )
				);
				?>
			</p>

			<ul id="<?php echo esc_attr( "{$post_type_name}-search-checklist" ); ?>"
				data-wp-lists="<?php echo esc_attr( "list:{$post_type_name}" ); ?>"
				class="categorychecklist form-no-clear"
			>
			<?php if ( ! empty( $search_results ) && ! is_wp_error( $search_results ) ) : ?>
				<?php
				$args['walker'] = $walker;
				echo walk_nav_menu_tree(
					array_map( 'wp_setup_nav_menu_item', $search_results ),
					0,
					(object) $args
				);
				?>
			<?php elseif ( is_wp_error( $search_results ) ) : ?>
				<li><?php echo $search_results->get_error_message(); ?></li>
			<?php elseif ( ! empty( $searched ) ) : ?>
				<li><?php _e( 'No results found.' ); ?></li>
			<?php endif; ?>
			</ul>
		</div><!-- /.tabs-panel -->

		<div id="<?php echo esc_attr( "{$post_type_name}-all" ); ?>"
			class="tabs-panel tabs-panel-view-all <?php echo ( 'all' === $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>"
			role="region" aria-label="<?php echo esc_attr( $post_type->labels->all_items ); ?>" tabindex="0"
		>
			<?php if ( ! empty( $page_links ) ) : ?>
				<div class="add-menu-item-pagelinks">
					<?php echo $page_links; ?>
				</div>
			<?php endif; ?>

			<ul id="<?php echo esc_attr( "{$post_type_name}checklist" ); ?>"
				data-wp-lists="<?php echo esc_attr( "list:{$post_type_name}" ); ?>"
				class="categorychecklist form-no-clear"
			>
				<?php
				$args['walker'] = $walker;

				if ( $post_type->has_archive ) {
					$_nav_menu_placeholder = ( 0 > $_nav_menu_placeholder ) ? (int) $_nav_menu_placeholder - 1 : -1;
					array_unshift(
						$posts,
						(object) array(
							'ID'           => 0,
							'object_id'    => $_nav_menu_placeholder,
							'object'       => $post_type_name,
							'post_content' => '',
							'post_excerpt' => '',
							'post_title'   => $post_type->labels->archives,
							'post_type'    => 'nav_menu_item',
							'type'         => 'post_type_archive',
							'url'          => get_post_type_archive_link( $post_type_name ),
						)
					);
				}

				/**
				 * Filters the posts displayed in the 'View All' tab of the current
				 * post type's menu items meta box.
				 *
				 * The dynamic portion of the hook name, `$post_type_name`, refers
				 * to the slug of the current post type.
				 *
				 * Possible hook names include:
				 *
				 *  - `nav_menu_items_post`
				 *  - `nav_menu_items_page`
				 *
				 * @since 3.2.0
				 * @since 4.6.0 Converted the `$post_type` parameter to accept a WP_Post_Type object.
				 *
				 * @see WP_Query::query()
				 *
				 * @param object[]     $posts     The posts for the current post type. Mostly `WP_Post` objects, but
				 *                                can also contain "fake" post objects to represent other menu items.
				 * @param array        $args      An array of `WP_Query` arguments.
				 * @param WP_Post_Type $post_type The current post type object for this menu item meta box.
				 */
				$posts = apply_filters(
					"nav_menu_items_{$post_type_name}",
					$posts,
					$args,
					$post_type
				);

				$checkbox_items = walk_nav_menu_tree(
					array_map( 'wp_setup_nav_menu_item', $posts ),
					0,
					(object) $args
				);

				echo $checkbox_items;
				?>
			</ul>

			<?php if ( ! empty( $page_links ) ) : ?>
				<div class="add-menu-item-pagelinks">
					<?php echo $page_links; ?>
				</div>
			<?php endif; ?>
		</div><!-- /.tabs-panel -->

		<p class="button-controls wp-clearfix" data-items-type="<?php echo esc_attr( "posttype-{$post_type_name}" ); ?>">
			<span class="list-controls hide-if-no-js">
				<input type="checkbox"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
					id="<?php echo esc_attr( $tab_name ); ?>" class="select-all"
				/>
				<label for="<?php echo esc_attr( $tab_name ); ?>"><?php _e( 'Select All' ); ?></label>
			</span>

			<span class="add-to-menu">
				<input type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
					class="button submit-add-to-menu right" value="<?php esc_attr_e( 'Add to Menu' ); ?>"
					name="add-post-type-menu-item" id="<?php echo esc_attr( "submit-posttype-{$post_type_name}" ); ?>"
				/>
				<span class="spinner"></span>
			</span>
		</p>

	</div><!-- /.posttypediv -->
	<?php
}

/**
 * Displays a meta box for a taxonomy menu item.
 *
 * @since 3.0.0
 *
 * @global int|string $nav_menu_selected_id
 *
 * @param string $data_object Not used.
 * @param array  $box {
 *     Taxonomy menu item meta box arguments.
 *
 *     @type string   $id       Meta box 'id' attribute.
 *     @type string   $title    Meta box title.
 *     @type callable $callback Meta box display callback.
 *     @type object   $args     Extra meta box arguments (the taxonomy object for this meta box).
 * }
 */
function wp_nav_menu_item_taxonomy_meta_box( $data_object, $box ) {
	global $nav_menu_selected_id;

	$taxonomy_name = $box['args']->name;
	$taxonomy      = get_taxonomy( $taxonomy_name );
	$tab_name      = $taxonomy_name . '-tab';

	// Paginate browsing for large numbers of objects.
	$per_page = 50;
	$pagenum  = isset( $_REQUEST[ $tab_name ] ) && isset( $_REQUEST['paged'] ) ? absint( $_REQUEST['paged'] ) : 1;
	$offset   = 0 < $pagenum ? $per_page * ( $pagenum - 1 ) : 0;

	$args = array(
		'taxonomy'     => $taxonomy_name,
		'child_of'     => 0,
		'exclude'      => '',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'include'      => '',
		'number'       => $per_page,
		'offset'       => $offset,
		'order'        => 'ASC',
		'orderby'      => 'name',
		'pad_counts'   => false,
	);

	$terms = get_terms( $args );

	if ( ! $terms || is_wp_error( $terms ) ) {
		echo '<p>' . __( 'No items.' ) . '</p>';
		return;
	}

	$num_pages = (int) ceil(
		(int) wp_count_terms(
			array_merge(
				$args,
				array(
					'number' => '',
					'offset' => '',
				)
			)
		) / $per_page
	);

	$page_links = paginate_links(
		array(
			'base'               => add_query_arg(
				array(
					$tab_name     => 'all',
					'paged'       => '%#%',
					'item-type'   => 'taxonomy',
					'item-object' => $taxonomy_name,
				)
			),
			'format'             => '',
			'prev_text'          => '<span aria-label="' . esc_attr__( 'Previous page' ) . '">' . __( '&laquo;' ) . '</span>',
			'next_text'          => '<span aria-label="' . esc_attr__( 'Next page' ) . '">' . __( '&raquo;' ) . '</span>',
			/* translators: Hidden accessibility text. */
			'before_page_number' => '<span class="screen-reader-text">' . __( 'Page' ) . '</span> ',
			'total'              => $num_pages,
			'current'            => $pagenum,
		)
	);

	$db_fields = false;
	if ( is_taxonomy_hierarchical( $taxonomy_name ) ) {
		$db_fields = array(
			'parent' => 'parent',
			'id'     => 'term_id',
		);
	}

	$walker = new Walker_Nav_Menu_Checklist( $db_fields );

	$current_tab = 'most-used';

	if ( isset( $_REQUEST[ $tab_name ] ) && in_array( $_REQUEST[ $tab_name ], array( 'all', 'most-used', 'search' ), true ) ) {
		$current_tab = $_REQUEST[ $tab_name ];
	}

	if ( ! empty( $_REQUEST[ "quick-search-taxonomy-{$taxonomy_name}" ] ) ) {
		$current_tab = 'search';
	}

	$removed_args = array(
		'action',
		'customlink-tab',
		'edit-menu-item',
		'menu-item',
		'page-tab',
		'_wpnonce',
	);

	$most_used_url = '';
	$view_all_url  = '';
	$search_url    = '';

	if ( $nav_menu_selected_id ) {
		$most_used_url = add_query_arg( $tab_name, 'most-used', remove_query_arg( $removed_args ) );
		$view_all_url  = add_query_arg( $tab_name, 'all', remove_query_arg( $removed_args ) );
		$search_url    = add_query_arg( $tab_name, 'search', remove_query_arg( $removed_args ) );
	}
	?>
	<div id="<?php echo esc_attr( "taxonomy-{$taxonomy_name}" ); ?>" class="taxonomydiv">
		<ul id="<?php echo esc_attr( "taxonomy-{$taxonomy_name}-tabs" ); ?>" class="taxonomy-tabs add-menu-item-tabs">
			<li <?php echo ( 'most-used' === $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link"
					data-type="<?php echo esc_attr( "tabs-panel-{$taxonomy_name}-pop" ); ?>"
					href="<?php echo esc_url( $most_used_url . "#tabs-panel-{$taxonomy_name}-pop" ); ?>"
				>
					<?php echo esc_html( $taxonomy->labels->most_used ); ?>
				</a>
			</li>
			<li <?php echo ( 'all' === $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link"
					data-type="<?php echo esc_attr( "tabs-panel-{$taxonomy_name}-all" ); ?>"
					href="<?php echo esc_url( $view_all_url . "#tabs-panel-{$taxonomy_name}-all" ); ?>"
				>
					<?php _e( 'View All' ); ?>
				</a>
			</li>
			<li <?php echo ( 'search' === $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link"
					data-type="<?php echo esc_attr( "tabs-panel-search-taxonomy-{$taxonomy_name}" ); ?>"
					href="<?php echo esc_url( $search_url . "#tabs-panel-search-taxonomy-{$taxonomy_name}" ); ?>"
				>
					<?php _e( 'Search' ); ?>
				</a>
			</li>
		</ul><!-- .taxonomy-tabs -->

		<div id="<?php echo esc_attr( "tabs-panel-{$taxonomy_name}-pop" ); ?>"
			class="tabs-panel <?php echo ( 'most-used' === $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>"
			role="region" aria-label="<?php echo esc_attr( $taxonomy->labels->most_used ); ?>" tabindex="0"
		>
			<ul id="<?php echo esc_attr( "{$taxonomy_name}checklist-pop" ); ?>"
				class="categorychecklist form-no-clear"
			>
				<?php
				$popular_terms = get_terms(
					array(
						'taxonomy'     => $taxonomy_name,
						'orderby'      => 'count',
						'order'        => 'DESC',
						'number'       => 10,
						'hierarchical' => false,
					)
				);

				$args['walker'] = $walker;
				echo walk_nav_menu_tree(
					array_map( 'wp_setup_nav_menu_item', $popular_terms ),
					0,
					(object) $args
				);
				?>
			</ul>
		</div><!-- /.tabs-panel -->

		<div id="<?php echo esc_attr( "tabs-panel-{$taxonomy_name}-all" ); ?>"
			class="tabs-panel tabs-panel-view-all <?php echo ( 'all' === $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>"
			role="region" aria-label="<?php echo esc_attr( $taxonomy->labels->all_items ); ?>" tabindex="0"
		>
			<?php if ( ! empty( $page_links ) ) : ?>
				<div class="add-menu-item-pagelinks">
					<?php echo $page_links; ?>
				</div>
			<?php endif; ?>

			<ul id="<?php echo esc_attr( "{$taxonomy_name}checklist" ); ?>"
				data-wp-lists="<?php echo esc_attr( "list:{$taxonomy_name}" ); ?>"
				class="categorychecklist form-no-clear"
			>
				<?php
				$args['walker'] = $walker;
				echo walk_nav_menu_tree(
					array_map( 'wp_setup_nav_menu_item', $terms ),
					0,
					(object) $args
				);
				?>
			</ul>

			<?php if ( ! empty( $page_links ) ) : ?>
				<div class="add-menu-item-pagelinks">
					<?php echo $page_links; ?>
				</div>
			<?php endif; ?>
		</div><!-- /.tabs-panel -->

		<div id="<?php echo esc_attr( "tabs-panel-search-taxonomy-{$taxonomy_name}" ); ?>"
			class="tabs-panel <?php echo ( 'search' === $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>"
			role="region" aria-label="<?php echo esc_attr( $taxonomy->labels->search_items ); ?>" tabindex="0">
			<?php
			if ( isset( $_REQUEST[ "quick-search-taxonomy-{$taxonomy_name}" ] ) ) {
				$searched       = esc_attr( $_REQUEST[ "quick-search-taxonomy-{$taxonomy_name}" ] );
				$search_results = get_terms(
					array(
						'taxonomy'     => $taxonomy_name,
						'name__like'   => $searched,
						'fields'       => 'all',
						'orderby'      => 'count',
						'order'        => 'DESC',
						'hierarchical' => false,
					)
				);
			} else {
				$searched       = '';
				$search_results = array();
			}
			?>
			<p class="quick-search-wrap">
				<label for="<?php echo esc_attr( "quick-search-taxonomy-{$taxonomy_name}" ); ?>" class="screen-reader-text">
					<?php
					/* translators: Hidden accessibility text. */
					_e( 'Search' );
					?>
				</label>
				<input type="search"
					class="quick-search" value="<?php echo $searched; ?>"
					name="<?php echo esc_attr( "quick-search-taxonomy-{$taxonomy_name}" ); ?>"
					id="<?php echo esc_attr( "quick-search-taxonomy-{$taxonomy_name}" ); ?>"
				/>
				<span class="spinner"></span>
				<?php
				submit_button(
					__( 'Search' ),
					'small quick-search-submit hide-if-js',
					'submit',
					false,
					array( 'id' => "submit-quick-search-taxonomy-{$taxonomy_name}" )
				);
				?>
			</p>

			<ul id="<?php echo esc_attr( "{$taxonomy_name}-search-checklist" ); ?>"
				data-wp-lists="<?php echo esc_attr( "list:{$taxonomy_name}" ); ?>"
				class="categorychecklist form-no-clear"
			>
			<?php if ( ! empty( $search_results ) && ! is_wp_error( $search_results ) ) : ?>
				<?php
				$args['walker'] = $walker;
				echo walk_nav_menu_tree(
					array_map( 'wp_setup_nav_menu_item', $search_results ),
					0,
					(object) $args
				);
				?>
			<?php elseif ( is_wp_error( $search_results ) ) : ?>
				<li><?php echo $search_results->get_error_message(); ?></li>
			<?php elseif ( ! empty( $searched ) ) : ?>
				<li><?php _e( 'No results found.' ); ?></li>
			<?php endif; ?>
			</ul>
		</div><!-- /.tabs-panel -->

		<p class="button-controls wp-clearfix" data-items-type="<?php echo esc_attr( "taxonomy-{$taxonomy_name}" ); ?>">
			<span class="list-controls hide-if-no-js">
				<input type="checkbox"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
					id="<?php echo esc_attr( $tab_name ); ?>" class="select-all"
				/>
				<label for="<?php echo esc_attr( $tab_name ); ?>"><?php _e( 'Select All' ); ?></label>
			</span>

			<span class="add-to-menu">
				<input type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?>
					class="button submit-add-to-menu right" value="<?php esc_attr_e( 'Add to Menu' ); ?>"
					name="add-taxonomy-menu-item" id="<?php echo esc_attr( "submit-taxonomy-{$taxonomy_name}" ); ?>"
				/>
				<span class="spinner"></span>
			</span>
		</p>

	</div><!-- /.taxonomydiv -->
	<?php
}

/**
 * Save posted nav menu item data.
 *
 * @since 3.0.0
 *
 * @param int     $menu_id   The menu ID for which to save this item. Value of 0 makes a draft, orphaned menu item. Default 0.
 * @param array[] $menu_data The unsanitized POSTed menu item data.
 * @return int[] The database IDs of the items saved
 */
function wp_save_nav_menu_items( $menu_id = 0, $menu_data = array() ) {
	$menu_id     = (int) $menu_id;
	$items_saved = array();

	if ( 0 === $menu_id || is_nav_menu( $menu_id ) ) {

		// Loop through all the menu items' POST values.
		foreach ( (array) $menu_data as $_possible_db_id => $_item_object_data ) {
			if (
				// Checkbox is not checked.
				empty( $_item_object_data['menu-item-object-id'] ) &&
				(
					// And item type either isn't set.
					! isset( $_item_object_data['menu-item-type'] ) ||
					// Or URL is the default.
					in_array( $_item_object_data['menu-item-url'], array( 'https://', 'http://', '' ), true ) ||
					// Or it's not a custom menu item (but not the custom home page).
					! ( 'custom' === $_item_object_data['menu-item-type'] && ! isset( $_item_object_data['menu-item-db-id'] ) ) ||
					// Or it *is* a custom menu item that already exists.
					! empty( $_item_object_data['menu-item-db-id'] )
				)
			) {
				// Then this potential menu item is not getting added to this menu.
				continue;
			}

			// If this possible menu item doesn't actually have a menu database ID yet.
			if (
				empty( $_item_object_data['menu-item-db-id'] ) ||
				( 0 > $_possible_db_id ) ||
				$_possible_db_id !== (int) $_item_object_data['menu-item-db-id']
			) {
				$_actual_db_id = 0;
			} else {
				$_actual_db_id = (int) $_item_object_data['menu-item-db-id'];
			}

			$args = array(
				'menu-item-db-id'       => ( isset( $_item_object_data['menu-item-db-id'] ) ? $_item_object_data['menu-item-db-id'] : '' ),
				'menu-item-object-id'   => ( isset( $_item_object_data['menu-item-object-id'] ) ? $_item_object_data['menu-item-object-id'] : '' ),
				'menu-item-object'      => ( isset( $_item_object_data['menu-item-object'] ) ? $_item_object_data['menu-item-object'] : '' ),
				'menu-item-parent-id'   => ( isset( $_item_object_data['menu-item-parent-id'] ) ? $_item_object_data['menu-item-parent-id'] : '' ),
				'menu-item-position'    => ( isset( $_item_object_data['menu-item-position'] ) ? $_item_object_data['menu-item-position'] : '' ),
				'menu-item-type'        => ( isset( $_item_object_data['menu-item-type'] ) ? $_item_object_data['menu-item-type'] : '' ),
				'menu-item-title'       => ( isset( $_item_object_data['menu-item-title'] ) ? $_item_object_data['menu-item-title'] : '' ),
				'menu-item-url'         => ( isset( $_item_object_data['menu-item-url'] ) ? $_item_object_data['menu-item-url'] : '' ),
				'menu-item-description' => ( isset( $_item_object_data['menu-item-description'] ) ? $_item_object_data['menu-item-description'] : '' ),
				'menu-item-attr-title'  => ( isset( $_item_object_data['menu-item-attr-title'] ) ? $_item_object_data['menu-item-attr-title'] : '' ),
				'menu-item-target'      => ( isset( $_item_object_data['menu-item-target'] ) ? $_item_object_data['menu-item-target'] : '' ),
				'menu-item-classes'     => ( isset( $_item_object_data['menu-item-classes'] ) ? $_item_object_data['menu-item-classes'] : '' ),
				'menu-item-xfn'         => ( isset( $_item_object_data['menu-item-xfn'] ) ? $_item_object_data['menu-item-xfn'] : '' ),
			);

			$items_saved[] = wp_update_nav_menu_item( $menu_id, $_actual_db_id, $args );

		}
	}

	return $items_saved;
}

/**
 * Adds custom arguments to some of the meta box object types.
 *
 * @since 3.0.0
 *
 * @access private
 *
 * @param object $data_object The post type or taxonomy meta-object.
 * @return object The post type or taxonomy object.
 */
function _wp_nav_menu_meta_box_object( $data_object = null ) {
	if ( isset( $data_object->name ) ) {

		if ( 'page' === $data_object->name ) {
			$data_object->_default_query = array(
				'orderby'     => 'menu_order title',
				'post_status' => 'publish',
			);

			// Posts should show only published items.
		} elseif ( 'post' === $data_object->name ) {
			$data_object->_default_query = array(
				'post_status' => 'publish',
			);

			// Categories should be in reverse chronological order.
		} elseif ( 'category' === $data_object->name ) {
			$data_object->_default_query = array(
				'orderby' => 'id',
				'order'   => 'DESC',
			);

			// Custom post types should show only published items.
		} else {
			$data_object->_default_query = array(
				'post_status' => 'publish',
			);
		}
	}

	return $data_object;
}

/**
 * Returns the menu formatted to edit.
 *
 * @since 3.0.0
 *
 * @param int $menu_id Optional. The ID of the menu to format. Default 0.
 * @return string|WP_Error The menu formatted to edit or error object on failure.
 */
function wp_get_nav_menu_to_edit( $menu_id = 0 ) {
	$menu = wp_get_nav_menu_object( $menu_id );

	// If the menu exists, get its items.
	if ( is_nav_menu( $menu ) ) {
		$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'post_status' => 'any' ) );
		$result     = '<div id="menu-instructions" class="post-body-plain';
		$result    .= ( ! empty( $menu_items ) ) ? ' menu-instructions-inactive">' : '">';
		$result    .= '<p>' . __( 'Add menu items from the column on the left.' ) . '</p>';
		$result    .= '</div>';

		if ( empty( $menu_items ) ) {
			return $result . ' <ul class="menu" id="menu-to-edit"> </ul>';
		}

		/**
		 * Filters the Walker class used when adding nav menu items.
		 *
		 * @since 3.0.0
		 *
		 * @param string $class   The walker class to use. Default 'Walker_Nav_Menu_Edit'.
		 * @param int    $menu_id ID of the menu being rendered.
		 */
		$walker_class_name = apply_filters( 'wp_edit_nav_menu_walker', 'Walker_Nav_Menu_Edit', $menu_id );

		if ( class_exists( $walker_class_name ) ) {
			$walker = new $walker_class_name();
		} else {
			return new WP_Error(
				'menu_walker_not_exist',
				sprintf(
					/* translators: %s: Walker class name. */
					__( 'The Walker class named %s does not exist.' ),
					'<strong>' . $walker_class_name . '</strong>'
				)
			);
		}

		$some_pending_menu_items = false;
		$some_invalid_menu_items = false;

		foreach ( (array) $menu_items as $menu_item ) {
			if ( isset( $menu_item->post_status ) && 'draft' === $menu_item->post_status ) {
				$some_pending_menu_items = true;
			}
			if ( ! empty( $menu_item->_invalid ) ) {
				$some_invalid_menu_items = true;
			}
		}

		if ( $some_pending_menu_items ) {
			$message     = __( 'Click Save Menu to make pending menu items public.' );
			$notice_args = array(
				'type'               => 'info',
				'additional_classes' => array( 'notice-alt', 'inline' ),
			);
			$result     .= wp_get_admin_notice( $message, $notice_args );
		}

		if ( $some_invalid_menu_items ) {
			$message     = __( 'There are some invalid menu items. Please check or delete them.' );
			$notice_args = array(
				'type'               => 'error',
				'additional_classes' => array( 'notice-alt', 'inline' ),
			);
			$result     .= wp_get_admin_notice( $message, $notice_args );
		}

		$result .= '<ul class="menu" id="menu-to-edit"> ';
		$result .= walk_nav_menu_tree(
			array_map( 'wp_setup_nav_menu_item', $menu_items ),
			0,
			(object) array( 'walker' => $walker )
		);
		$result .= ' </ul> ';

		return $result;
	} elseif ( is_wp_error( $menu ) ) {
		return $menu;
	}
}

/**
 * Returns the columns for the nav menus page.
 *
 * @since 3.0.0
 *
 * @return string[] Array of column titles keyed by their column name.
 */
function wp_nav_menu_manage_columns() {
	return array(
		'_title'          => __( 'Show advanced menu properties' ),
		'cb'              => '<input type="checkbox" />',
		'link-target'     => __( 'Link Target' ),
		'title-attribute' => __( 'Title Attribute' ),
		'css-classes'     => __( 'CSS Classes' ),
		'xfn'             => __( 'Link Relationship (XFN)' ),
		'description'     => __( 'Description' ),
	);
}

/**
 * Deletes orphaned draft menu items
 *
 * @access private
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function _wp_delete_orphaned_draft_menu_items() {
	global $wpdb;

	$delete_timestamp = time() - ( DAY_IN_SECONDS * EMPTY_TRASH_DAYS );

	// Delete orphaned draft menu items.
	$menu_items_to_delete = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT ID FROM $wpdb->posts AS p
			LEFT JOIN $wpdb->postmeta AS m ON p.ID = m.post_id
			WHERE post_type = 'nav_menu_item' AND post_status = 'draft'
			AND meta_key = '_menu_item_orphaned' AND meta_value < %d",
			$delete_timestamp
		)
	);

	foreach ( (array) $menu_items_to_delete as $menu_item_id ) {
		wp_delete_post( $menu_item_id, true );
	}
}

/**
 * Saves nav menu items.
 *
 * @since 3.6.0
 *
 * @param int|string $nav_menu_selected_id    ID, slug, or name of the currently-selected menu.
 * @param string     $nav_menu_selected_title Title of the currently-selected menu.
 * @return string[] The menu updated messages.
 */
function wp_nav_menu_update_menu_items( $nav_menu_selected_id, $nav_menu_selected_title ) {
	$unsorted_menu_items = wp_get_nav_menu_items(
		$nav_menu_selected_id,
		array(
			'orderby'     => 'ID',
			'output'      => ARRAY_A,
			'output_key'  => 'ID',
			'post_status' => 'draft,publish',
		)
	);

	$messages   = array();
	$menu_items = array();

	// Index menu items by DB ID.
	foreach ( $unsorted_menu_items as $_item ) {
		$menu_items[ $_item->db_id ] = $_item;
	}

	$post_fields = array(
		'menu-item-db-id',
		'menu-item-object-id',
		'menu-item-object',
		'menu-item-parent-id',
		'menu-item-position',
		'menu-item-type',
		'menu-item-title',
		'menu-item-url',
		'menu-item-description',
		'menu-item-attr-title',
		'menu-item-target',
		'menu-item-classes',
		'menu-item-xfn',
	);

	wp_defer_term_counting( true );

	// Loop through all the menu items' POST variables.
	if ( ! empty( $_POST['menu-item-db-id'] ) ) {
		foreach ( (array) $_POST['menu-item-db-id'] as $_key => $k ) {

			// Menu item title can't be blank.
			if ( ! isset( $_POST['menu-item-title'][ $_key ] ) || '' === $_POST['menu-item-title'][ $_key ] ) {
				continue;
			}

			$args = array();
			foreach ( $post_fields as $field ) {
				$args[ $field ] = isset( $_POST[ $field ][ $_key ] ) ? $_POST[ $field ][ $_key ] : '';
			}

			$menu_item_db_id = wp_update_nav_menu_item(
				$nav_menu_selected_id,
				( (int) $_POST['menu-item-db-id'][ $_key ] !== $_key ? 0 : $_key ),
				$args
			);

			if ( is_wp_error( $menu_item_db_id ) ) {
				$messages[] = wp_get_admin_notice(
					$menu_item_db_id->get_error_message(),
					array(
						'id'                 => 'message',
						'additional_classes' => array( 'error' ),
					)
				);
			} else {
				unset( $menu_items[ $menu_item_db_id ] );
			}
		}
	}

	// Remove menu items from the menu that weren't in $_POST.
	if ( ! empty( $menu_items ) ) {
		foreach ( array_keys( $menu_items ) as $menu_item_id ) {
			if ( is_nav_menu_item( $menu_item_id ) ) {
				wp_delete_post( $menu_item_id );
			}
		}
	}

	// Store 'auto-add' pages.
	$auto_add        = ! empty( $_POST['auto-add-pages'] );
	$nav_menu_option = (array) get_option( 'nav_menu_options' );

	if ( ! isset( $nav_menu_option['auto_add'] ) ) {
		$nav_menu_option['auto_add'] = array();
	}

	if ( $auto_add ) {
		if ( ! in_array( $nav_menu_selected_id, $nav_menu_option['auto_add'], true ) ) {
			$nav_menu_option['auto_add'][] = $nav_menu_selected_id;
		}
	} else {
		$key = array_search( $nav_menu_selected_id, $nav_menu_option['auto_add'], true );
		if ( false !== $key ) {
			unset( $nav_menu_option['auto_add'][ $key ] );
		}
	}

	// Remove non-existent/deleted menus.
	$nav_menu_option['auto_add'] = array_intersect(
		$nav_menu_option['auto_add'],
		wp_get_nav_menus( array( 'fields' => 'ids' ) )
	);

	update_option( 'nav_menu_options', $nav_menu_option, false );

	wp_defer_term_counting( false );

	/** This action is documented in wp-includes/nav-menu.php */
	do_action( 'wp_update_nav_menu', $nav_menu_selected_id );

	/* translators: %s: Nav menu title. */
	$message     = sprintf( __( '%s has been updated.' ), '<strong>' . $nav_menu_selected_title . '</strong>' );
	$notice_args = array(
		'id'                 => 'message',
		'dismissible'        => true,
		'additional_classes' => array( 'updated' ),
	);

	$messages[] = wp_get_admin_notice( $message, $notice_args );

	unset( $menu_items, $unsorted_menu_items );

	return $messages;
}

/**
 * If a JSON blob of navigation menu data is in POST data, expand it and inject
 * it into `$_POST` to avoid PHP `max_input_vars` limitations. See #14134.
 *
 * @ignore
 * @since 4.5.3
 * @access private
 */
function _wp_expand_nav_menu_post_data() {
	if ( ! isset( $_POST['nav-menu-data'] ) ) {
		return;
	}

	$data = json_decode( stripslashes( $_POST['nav-menu-data'] ) );

	if ( ! is_null( $data ) && $data ) {
		foreach ( $data as $post_input_data ) {
			/*
			 * For input names that are arrays (e.g. `menu-item-db-id[3][4][5]`),
			 * derive the array path keys via regex and set the value in $_POST.
			 */
			preg_match( '#([^\[]*)(\[(.+)\])?#', $post_input_data->name, $matches );

			$array_bits = array( $matches[1] );

			if ( isset( $matches[3] ) ) {
				$array_bits = array_merge( $array_bits, explode( '][', $matches[3] ) );
			}

			$new_post_data = array();

			// Build the new array value from leaf to trunk.
			for ( $i = count( $array_bits ) - 1; $i >= 0; $i-- ) {
				if ( count( $array_bits ) - 1 === $i ) {
					$new_post_data[ $array_bits[ $i ] ] = wp_slash( $post_input_data->value );
				} else {
					$new_post_data = array( $array_bits[ $i ] => $new_post_data );
				}
			}

			$_POST = array_replace_recursive( $_POST, $new_post_data );
		}
	}
}
