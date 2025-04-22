<?php
/* Smarty version 4.1.1, created on 2024-07-10 16:21:28
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/entry.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_668e3678889ef5_12395733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '759418b41bd368f0198adab938eca77b6296ac37' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/entry.html',
      1 => 1720596017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./parts/ga.html' => 1,
    'file:../../../../../common/header_isp.html' => 1,
    'file:./parts/header_menu.html' => 1,
    'file:./parts/footer_menu.html' => 1,
  ),
),false)) {
function content_668e3678889ef5_12395733 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="ja" lang="ja" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="viewport" content="width=device-width" />
	<title><?php if ($_smarty_tpl->tpl_vars['contents_data']->value['category'] == "kataomoi") {?>片思い<?php } else {
echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['contents_data']->value['category']]['name'];
}?>占い│<?php echo (($tmp = (($tmp = $_smarty_tpl->tpl_vars['contents_data']->value['name_biglobe'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name_rakuten'] ?? null : $tmp) ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name'] ?? null : $tmp);?>
│算命学相性占い</title>
	<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['contents_data']->value['caption_biglobe'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['caption'] ?? null : $tmp);?>
">
	<link rel="stylesheet" href="css/pc/common.css" type="text/css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery1.8.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/jquery.tile.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/default_form_ie.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/pc/entry.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/date.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/sex_auto_change.js"><?php echo '</script'; ?>
>
	<?php $_smarty_tpl->_subTemplateRender("file:./parts/ga.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(window).on('load', function() {
			loadCookie(<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['target_count'];?>
);
		});
	<?php echo '</script'; ?>
>
</head>

<body class="ow_body">

<?php $_smarty_tpl->_subTemplateRender("file:../../../../../common/header_isp.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="ow_body_bg_01">
<div class="ow_body_bg_02">

	<?php $_smarty_tpl->_subTemplateRender("file:./parts/header_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="ow_main">

		<div class="ow_bread">
			<a href="<?php echo (defined('CONTENTS_URL') ? constant('CONTENTS_URL') : null);?>
">TOP</a> &gt;
			入力ページ
		</div>


	<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['picup_contents_id_1'] > 500) {?>
			<div class="ow_waribiki">
				<div>
					こちらを購入頂くと、通常メニューを<strong class="ow_yellow">割引価格で2つご紹介致します。</strong><br>お好きな方を選んでご利用いただけます。
				</div>
			</div>
			<!-- /.ow_sub_menu_caption -->
	<?php }?>

<div class="ow_sp_contents">
		<div class="ow_common_menu">
			<div class="ow_common_menu_top ow_tac">
				<img class="ow_vab" src="img/pc/common/common_menu_top.jpg" alt="">
			</div>
			<div class="ow_common_menu_mid">
				<div class="ow_menu_head">
					<div class="ow_menu_icon">
						<div class="ow_menu_category">
							<img src="img/pc/category/<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['category'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['contents_data']->value['category']]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 2) {?>二<?php } else { ?>一<?php }?>人用" title="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['contents_data']->value['category']]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 2) {?>二<?php } else { ?>一<?php }?>人用" />
						</div>
					</div>
					<h1 class="ow_menu_title">
						<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['price_taxin'] <= 1) {?><span class="ow_menu_title_free">無料占い</span><br><?php }
if ($_smarty_tpl->tpl_vars['contents_data']->value['category'] == "kataomoi") {?>片思い<?php } else {
echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['contents_data']->value['category']]['name'];
}?>占い│<?php echo (($tmp = (($tmp = $_smarty_tpl->tpl_vars['contents_data']->value['name_biglobe'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name_rakuten'] ?? null : $tmp) ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name'] ?? null : $tmp);?>
│算命学相性占い
					</h1>
				</div>
			</div>
			<div class="ow_common_menu_btm ow_tac">
				<img class="ow_vat" src="img/pc/common/common_menu_btm.jpg" alt="">
			</div>
		</div>
		<!-- /.ow_common_menu -->

		<div class="ow_entry">
			<div class="ow_sample_intro ow_tac">
				<div class="ow_sample_intro_canvas">
					<img src="img/pc/top/sample_intro_canvas.jpg" alt=""/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_confetti">
					<img src="img/pc/top/sample_intro_confetti.png" alt="" title=""/>
				</div>

				<div class="ow_sample_intro_item ow_sample_intro_text">
					<img src="img/pc/top/sample_intro_text.png" alt="この恋もうダメ?!　最近ツイてない…　結婚は諦めた…" title="この恋もうダメ?!　最近ツイてない…　結婚は諦めた…"/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_title_1">
					<img src="img/pc/top/sample_intro_title_1.png" alt="絶望的な状態が激変する!" title="絶望的な状態が激変する!"/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_title_2">
					<img src="img/pc/top/sample_intro_title_2.png" alt="逆転成功術" title="逆転成功術"/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_hikari">
					<img src="img/pc/top/sample_intro_hikari.png" alt="" title=""/>
				</div>
			</div>
			<!-- /.ow_sample_intro -->

			<div class="ow_sub_menu ow_sub_menu_entry">
				<div class="ow_sub_menu_top ow_tac">
					<img class="ow_vab" src="img/pc/entry/sub_menu_top.jpg" alt="鑑定項目" title="鑑定項目">
				</div>
				<div class="ow_sub_menu_mid">
					<div class="ow_sub_menu_list">
	<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 1) {?>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					あなたを表す十二支占い
				</div>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					徹底占断／外向きのあなたと本来の姿
				</div>
	<?php } else { ?>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					あの人を表す十二支占い
				</div>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					徹底占断／外向きのあの人と本来の姿
				</div>
	<?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pack_contents_list']->value, 'val', false, 'key', 'pack_contents_list', array (
));
$_smarty_tpl->tpl_vars['val']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->do_else = false;
?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_data']->value[$_smarty_tpl->tpl_vars['key']->value], 'val2', false, 'key2', 'menu_data_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['val2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['val2']->value) {
$_smarty_tpl->tpl_vars['val2']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['total'];
?>
		<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['price_notax'] == 1) {?>
						<div class="ow_sub_menu_item ow_sub_menu_item ow_dot_base">
							<?php echo (($tmp = $_smarty_tpl->tpl_vars['val2']->value['note'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['val2']->value['name'] ?? null : $tmp);?>

						</div>
		<?php } elseif (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['last'] : null)) {?>
			<?php if ($_smarty_tpl->tpl_vars['val2']->value['astrology_category'] == 3) {?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo (($tmp = $_smarty_tpl->tpl_vars['val2']->value['note'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['val2']->value['name'] ?? null : $tmp);?>

						</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['val2']->value['astrology_category'] >= 5) {?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo (($tmp = $_smarty_tpl->tpl_vars['val2']->value['note'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['val2']->value['name'] ?? null : $tmp);?>

						</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['val2']->value['astrology_category'] >= 2) {?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo (($tmp = $_smarty_tpl->tpl_vars['val2']->value['note'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['val2']->value['name'] ?? null : $tmp);?>

						</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['val2']->value['astrology_category'] >= 4) {?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo (($tmp = $_smarty_tpl->tpl_vars['val2']->value['note'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['val2']->value['name'] ?? null : $tmp);?>

						</div>
			<?php } else { ?>
						<div class="ow_sub_menu_item ow_sub_menu_item ow_dot_base">
							<?php echo (($tmp = $_smarty_tpl->tpl_vars['val2']->value['note'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['val2']->value['name'] ?? null : $tmp);?>

						</div>
			<?php }?>
		<?php } else { ?>
						<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
							<?php echo (($tmp = $_smarty_tpl->tpl_vars['val2']->value['note'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['val2']->value['name'] ?? null : $tmp);?>

						</div>
		<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
					<!-- /.ow_sub_menu_list -->
				</div>
				<!-- /.ow_sub_menu_mid -->
				<div class="ow_sub_menu_btm ow_tac">
					<img class="ow_vat" src="img/pc/entry/sub_menu_btm.jpg" alt="">
				</div>
			</div>
			<!-- /.ow_sub_menu -->
			<div class="ow_entry_teach ow_tac">
				<img src="img/pc/top/ow_entry_teach.png" alt="算命学では生年月日を元に運命を算出致します。まずはあなたのことを教えてください。" title="算命学では生年月日を元に運命を算出致します。まずはあなたのことを教えてください。">
			</div>
			<div class="ow_entry_form">
				<form id="astrology_form" name="astrology_form" method="post" action="">
				<input type="hidden" name="nc" id="nc_flag" value="<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['nc_flag'];?>
">
				<input type="hidden" name="menu_id" value="<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];?>
">
				<input type="hidden" name="nif_menukey" value="mokuren_<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];?>
">
				<input type="text" style="display:none;">
					<div class="ow_my_form" id="my_form">
						<div class="ow_my_form_top ow_tac">
							<img class="ow_vab" src="img/pc/entry/my_form_top.jpg" alt="あなたについて" title="あなたについて">
						</div>
						<div class="ow_entry_form_mid ow_my_form_mid">
							<div class="ow_form_body">
								<div class="ow_entry_form_item">
									<div class="ow_entry_name">
										<img src="img/pc/top/entry_name.png" alt="お名前" title="お名前">
									</div>
									<div class="ow_entry_form_input_wrap">
										<input class="ow_entry_form_input" type="text" name="name1" id="name1" value="">
									</div>
								</div><!-- /.ow_entry_form_item -->

								<div class="ow_entry_form_item">
									<div class="ow_entry_date">
										<img src="img/pc/top/entry_date.png" alt="生年月日" title="生年月日">
									</div>

									<!-- ▽▽▽PC用 生年月日入力▽▽▽ -->
											<div class="ow_entry_form_select_wrap ow_pc_block">
												<div class="ow_select ow_select_year">
													<select class="ow_entry_form_select" onchange="setDay(this.form.yy1,this.form.mm1,this.form.dd1);" id="yy1" name="yy1">
														<?php
$_smarty_tpl->tpl_vars['__smarty_section_year'] = new Smarty_Variable(array());
if (true) {
for ($__section_year_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] = 1925; $__section_year_0_iteration <= 95; $__section_year_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']++){
?>
														<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] : null) == 1985) {?>
														<option value="-1" selected>----</option>
														<?php }?>
														<option value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] : null);?>
">
															<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] : null);?>
年
														</option>
														<?php
}
}
?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_month">
													<select class="ow_entry_form_select ow_entry_form_select_month" onchange="setDay(this.form.yy1,this.form.mm1,this.form.dd1);" id="mm1" name="mm1">
														<option value="-1">--</option>
														<?php
$_smarty_tpl->tpl_vars['__smarty_section_mon'] = new Smarty_Variable(array());
if (true) {
for ($__section_mon_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index'] = 1; $__section_mon_1_iteration <= 12; $__section_mon_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index']++){
?>
														<option value="<?php echo sprintf("%02d",(isset($_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index'] : null));?>
">
															<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index'] : null);?>
月
														</option>
														<?php
}
}
?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_day">
													<select class="ow_entry_form_select ow_entry_form_select_day" id="dd1" name="dd1">
														<option value="-1">--</option>
														<?php
$_smarty_tpl->tpl_vars['__smarty_section_day'] = new Smarty_Variable(array());
if (true) {
for ($__section_day_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index'] = 1; $__section_day_2_iteration <= 31; $__section_day_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index']++){
?>
														<option value="<?php echo sprintf("%02d",(isset($_smarty_tpl->tpl_vars['__smarty_section_day']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index'] : null));?>
">
															<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_day']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index'] : null);?>
日
														</option>
														<?php
}
}
?>
													</select>
												</div>
												<!-- /.ow_select -->
											</div>
										</div>
								<div class="ow_entry_form_item">
									<div class="ow_entry_seibetu">
										<img src="img/pc/top/entry_seibetu.png" alt="性別" title="性別">
									</div>
	<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['sex_flag'] == 2) {?>
									<div class="ow_entry_form_radio_wrap">
										<div class="sex_caution">このメニューは女性限定です。</div>
										<input type="radio" name="sex1" id="sex11" value="1" style="visibility:hidden">
										<input type="radio" name="sex1" id="sex12" value="2" checked="checked" style="visibility:hidden">
									</div>
	<?php } else { ?>
										<div class="ow_entry_form_radio_wrap">
											<label><input type="radio" name="sex1" id="sex12" value="2" checked="checked" class="js-sexAutoChange1"><span class="ow_radiotxt female">女性で占う</span></label><label><input type="radio" name="sex1" id="sex11" value="1"  class="js-sexAutoChange1"><span class="ow_radiotxt male">男性で占う</span></label>
										</div>
	<?php }?>
									</div><!-- /.ow_entry_form_item -->
								</div>
							</div>
							<!-- /.ow_entry_form_mid -->
							<div class="ow_form_btm ow_tac">
								<img class="ow_vat" src="img/pc/entry/my_form_btm.jpg" alt="">
							</div>
						</div>
						<!-- /.ow_my_form -->
	<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 2) {?>
						<div class="ow_target_form">
							<div class="ow_target_form_top ow_tac">
								<img class="ow_vab" src="img/pc/entry/target_form_top.jpg" alt="あの人について" title="あの人について">
							</div>
							<div class="ow_entry_form_mid ow_target_form_mid">
								<div class="ow_form_body">
										<div class="ow_entry_form_item">
											<div class="ow_entry_name">
												<img src="img/pc/top/entry_name.png" alt="お名前" title="お名前">
											</div>
											<div class="ow_entry_form_input_wrap">
												<input class="ow_entry_form_input" type="text" name="name2" id="name2" value="">
											</div>
										</div><!-- /.ow_entry_form_item -->

										<div class="ow_entry_form_item">
											<div class="ow_entry_date">
												<img src="img/pc/top/entry_date.png" alt="生年月日" title="生年月日">
											</div>

											<div class="ow_entry_form_select_wrap ow_pc_block">
												<div class="ow_select ow_select_year">
													<select class="ow_entry_form_select ow_entry_form_select_wide" onchange="setDay(this.form.yy2,this.form.mm2,this.form.dd2);" id="yy2" name="yy2">
														<?php
$_smarty_tpl->tpl_vars['__smarty_section_year'] = new Smarty_Variable(array());
if (true) {
for ($__section_year_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] = 1925; $__section_year_3_iteration <= 95; $__section_year_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']++){
?>
														<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] : null) == 1985) {?>
														<option value="-1" selected>----</option>
														<?php }?>
														<option value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] : null);?>
">
															<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_year']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_year']->value['index'] : null);?>
年
														</option>
														<?php
}
}
?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_month">
													<select class="ow_entry_form_select" onchange="setDay(this.form.yy2,this.form.mm2,this.form.dd2);" id="mm2" name="mm2">
														<option value="-1">--</option>
														<?php
$_smarty_tpl->tpl_vars['__smarty_section_mon'] = new Smarty_Variable(array());
if (true) {
for ($__section_mon_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index'] = 1; $__section_mon_4_iteration <= 12; $__section_mon_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index']++){
?>
														<option value="<?php echo sprintf("%02d",(isset($_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index'] : null));?>
">
															<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_mon']->value['index'] : null);?>
月
														</option>
														<?php
}
}
?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_day">
													<select class="ow_entry_form_select" id="dd2" name="dd2">
														<option value="-1">--</option>
														<?php
$_smarty_tpl->tpl_vars['__smarty_section_day'] = new Smarty_Variable(array());
if (true) {
for ($__section_day_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index'] = 1; $__section_day_5_iteration <= 31; $__section_day_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index']++){
?>
														<option value="<?php echo sprintf("%02d",(isset($_smarty_tpl->tpl_vars['__smarty_section_day']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index'] : null));?>
">
															<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_day']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_day']->value['index'] : null);?>
日
														</option>
														<?php
}
}
?>
													</select>
												</div>
												<!-- /.ow_select -->
											</div>
										</div>

										<div class="ow_entry_form_item">
											<div class="ow_entry_seibetu">
												<img src="img/pc/top/entry_seibetu.png" alt="性別" title="性別">
											</div>
	<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['sex_flag'] == 2) {?>
											<div class="ow_entry_form_radio_wrap">
												<div class="sex_caution">お相手は男性が自動的に選ばれます</div>
												<input type="radio" name="sex2" id="sex21" value="1" checked="checked" style="visibility:hidden">
												<input type="radio" name="sex2" id="sex22" value="2" style="visibility:hidden">
											</div>
	<?php } else { ?>

											<div class="ow_entry_form_radio_wrap">
												<label><input type="radio" name="sex2" id="sex22" value="2" checked="checked" class="js-sexAutoChange2"><span class="ow_radiotxt female">女性で占う</span></label><label><input type="radio" name="sex2" id="sex21" value="1" class="js-sexAutoChange2"><span class="ow_radiotxt male">男性で占う</span></label>
											</div>
	<?php }?>
										</div><!-- /.ow_entry_form_item -->


									</div>
									<!-- /.ow_form_body -->
								</div>
								<!-- /.ow_entry_form_mid -->
								<div class="ow_form_btm ow_tac">
									<img class="ow_vat" src="img/pc/entry/target_form_btm.jpg" alt="">
								</div>
							</div>
							<!-- /.ow_target_form -->
	<?php }?>
							<div class="ow_entry_form_mid">
								<div class="ow_entry_form_save">
									※今回入力した情報を記録しますか？　<br>
									<label><input type="checkbox" style="margin-right: 3px; vertical-align:middle;" name="default_check" value="1" id="default_check">記録する</label>
								</div>

	<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['price_notax'] > 1) {?>
								<div class="ow_entry_form_btn_wrap">
									<!-- ▼▼▼一部無料ボタン▼▼▼ -->
									<div class="ow_entry_form_btn ow_tac">
										<a class="ow_entry_form_nc" href="javascript:gtag_submit('nc','<?php echo (defined('GTAG_KEY') ? constant('GTAG_KEY') : null);
echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];?>
');form_submit(1,<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['target_count'];?>
,'astrology_form')">
											<img src="img/pc/entry/btn_nc.png" alt="一部無料で鑑定する" title="一部無料で鑑定する">
										</a>
									</div>
									<div class="ow_entry_form_btn_text">
										次の鑑定結果ページの一部を<br>
										無料でご覧いただけます
									</div>
									<!-- ▲▲▲一部無料ボタン▲▲▲ -->
								</div>
								<div class="ow_entry_form_btn_wrap">
									<!-- ▼▼▼有料ボタン▼▼▼ -->
									<div class="ow_entry_form_btn ow_tac">
										<a class="ow_entry_form_submit" href="javascript:gtag_submit('result','<?php echo (defined('GTAG_KEY') ? constant('GTAG_KEY') : null);
echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];?>
');form_submit(0,<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['target_count'];?>
,'astrology_form')">
											<img src="img/pc/entry/btn_submit.png" alt="有料で鑑定する" title="有料で鑑定する">
										</a>
									</div>
									<!-- ▲▲▲有料ボタン▲▲▲ -->
								</div>

								<div class="ow_entry_form_btn_text ow_entry_form_btn_text_border">
									こちらのメニューのご利用には
									<div class="ow_premium_price ow_nif">
										プレミアム価格　<?php echo number_format($_smarty_tpl->tpl_vars['contents_data']->value['price_off10']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>

									</div>
									<div class="ow_default_price">
										<span class="ow_nif">通常価格　</span><span class="ow_red"><?php echo number_format($_smarty_tpl->tpl_vars['contents_data']->value['price_taxin']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>
</span>
									</div>
									が必要です。
								</div>

								<div class="ow_entry_form_btn_text ow_entry_form_btn_text_2">
									ご利用前には、メニュー内容のご確認をお願いいたします。<br>
									ご購入されるとサービス・コンテンツの利用料金が<br>
									発生いたします。
								</div>
	<?php } else { ?>
								<div class="ow_entry_form_btn_wrap">
									<div class="ow_entry_form_btn">
										<a class="ow_entry_form_free" href="javascript:form_submit(2,<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['target_count'];?>
,'astrology_form')">
											<img src="img/pc/entry/btn_free.png" alt="無料で鑑定する" title="無料で鑑定する">
										</a>
									</div>
									<div class="ow_entry_form_btn_text">
										次のページは無料でご利用いただけます。<br>
										※鑑定結果の一部を無料でご覧になれます。
									</div>
								</div>
	<?php }?>

							</div>
						</form>
					</div>
					<!-- /.ow_entry_form -->

				</div>
				<!-- /.ow_entry -->
</div>
			</div>
			<!-- /.ow_main -->
			<?php $_smarty_tpl->_subTemplateRender("file:./parts/footer_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
	</div>
</body>
</html>
<?php }
}
