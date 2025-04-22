<?php
/* Smarty version 4.1.1, created on 2024-01-04 16:57:32
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/result_item3.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_659664ecf37cc7_78404058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3449f97abf6002cf3b264f8f8b4b82f26d8b6f49' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/result_item3.html',
      1 => 1702617128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659664ecf37cc7_78404058 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 1) {?>
<div class="ow_result_item ow_star">
	<div class="ow_result_item_top ow_tac">
		<img class="ow_vab" src="img/pc/result/result_item_top.jpg" alt=""/>
	</div>
	<div class="ow_result_item_mid">
		<div class="ow_result_title">
			<div class="ow_result_title_top ow_tac"><img class="ow_vab" src="img/pc/result/result_title_top.png" alt=""/></div>
			<div class="ow_result_title_mid"><?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
</div>
			<div class="ow_result_title_btm ow_tac"><img class="ow_vat" src="img/pc/result/result_title_btm.png" alt=""/></div>
		</div>

		<div class="ow_area ow_tac">
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<div class="ow_star_figure">
				<div class="ow_star_bg">
					<img src="img/pc/result/star_bg.jpg" alt="十大主星/十二徒星★陽占図" title="十大主星/十二徒星★陽占図">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_2">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_2']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_3">
					<img src="img/pc/result/star/twelve/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_3'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_4">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_4']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_5">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_5']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_6">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_6']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_7">
					<img src="img/pc/result/star/twelve/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_7'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_8">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_8']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_9">
					<img src="img/pc/result/star/twelve/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_9'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_hikari ow_star_figure_hikari_<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['result_category'];?>
">
					<img src="img/pc/result/star/star_figure_hikari.png" alt="">
				</div>
			</div>
	<?php $_smarty_tpl->_assignInScope('star_num', $_smarty_tpl->tpl_vars['menu_data']->value['result_category']);?>
			<div class="ow_star_figure_mid">
				<div class="ow_figure_result">
	<?php if ($_smarty_tpl->tpl_vars['star_num']->value == 3 || $_smarty_tpl->tpl_vars['star_num']->value == 7 || $_smarty_tpl->tpl_vars['star_num']->value == 9) {?>
					<div class="ow_star_twelve ow_tac">
						<img src="img/pc/result/star/star_twelve.png" alt="あなたの十二大主星" title="あなたの十二大主星">
					</div>
	<?php } else { ?>
					<div class="ow_star_ten ow_tac">
						<img src="img/pc/result/star/star_ten.png" alt="あなたの十大主星" title="あなたの十大主星">
					</div>
	<?php }?>
					<div class="ow_area_item ow_figure_result_text">
						<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_graph_text'][$_smarty_tpl->tpl_vars['star_num']->value];?>

					</div>
				</div>
			</div>
			<div class="ow_star_figure_btm ow_tac">
				<img class="ow_vat" src="img/pc/result/star/star_figure_btm.jpg" alt="" title="">
			</div>
		<?php } else { ?>
			<img src="img/pc/nc/star_bg.png" alt="有料版ではあなたの十大主星と十二大従星がわかります" title="有料版ではあなたの十大主星と十二大従星がわかります">
		<?php }?>

		</div>
		<!--/.ow_area-->
		<div class="ow_comment_text ow_tac">

		</div>
		<div class="ow_result_body_text">
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['result']['body'];?>

		<?php } else { ?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['result']['cut_body'];?>
<br>
			<div class="ow_nc ow_nc_white">
				<a href="javascript:<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag'])) {?>gtag_submit('result','<?php echo (defined('GTAG_KEY') ? constant('GTAG_KEY') : null);
echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];?>
');<?php }?>nc_submit('astrology_form<?php echo $_smarty_tpl->tpl_vars['pickup_num']->value;?>
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/pc/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

			</div>
		<?php }?>
		</div>
	</div>
	<!-- /.ow_result_item_mid -->
	<div class="ow_result_item_btm ow_tac">
		<img class="ow_vat" src="img/pc/result/result_item_btm.jpg" alt=""/>
	</div>
</div>
<!-- /.ow_result_item -->
<?php } else { ?>
<div class="ow_result_item ow_star">
	<div class="ow_result_item_top ow_tac">
		<img class="ow_vab" src="img/pc/result/result_item_top.jpg" alt=""/>
	</div>
	<div class="ow_result_item_mid">
		<div class="ow_result_title">
			<div class="ow_result_title_top ow_tac"><img class="ow_vab" src="img/pc/result/result_title_top.png" alt=""/></div>
			<div class="ow_result_title_mid"><?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
</div>
			<div class="ow_result_title_btm ow_tac"><img class="ow_vat" src="img/pc/result/result_title_btm.png" alt=""/></div>
		</div>

		<div class="ow_area ow_tac">
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<div class="ow_star_figure">
				<div class="ow_star_bg">
					<img src="img/pc/result/star_bg.jpg" alt="十大主星/十二徒星★陽占図" title="十大主星/十二徒星★陽占図">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_2">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_2']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_3">
					<img src="img/pc/result/star/twelve/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_3'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_4">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_4']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_5">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_5']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_6">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_6']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_7">
					<img src="img/pc/result/star/twelve/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_7'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_8">
					<img src="img/pc/result/star/ten/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_8']['star_num'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_9">
					<img src="img/pc/result/star/twelve/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_9'];?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_hikari ow_star_figure_hikari_<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['result_category'];?>
">
					<img src="img/pc/result/star/star_figure_hikari.png" alt="">
				</div>
			</div>
	<?php $_smarty_tpl->_assignInScope('star_num', $_smarty_tpl->tpl_vars['menu_data']->value['result_category']);?>
			<div class="ow_star_figure_mid">
				<div class="ow_figure_result">
	<?php if ($_smarty_tpl->tpl_vars['star_num']->value == 3 || $_smarty_tpl->tpl_vars['star_num']->value == 7 || $_smarty_tpl->tpl_vars['star_num']->value == 9) {?>
					<div class="ow_star_twelve ow_tac">
						<img src="img/pc/result/star/star_twelve2.png" alt="あの人の十二大主星" title="あなたの十二大主星">
					</div>
	<?php } else { ?>
					<div class="ow_star_ten ow_tac">
						<img src="img/pc/result/star/star_ten2.png" alt="あの人の十大主星" title="あなたの十大主星">
					</div>
	<?php }?>
					<div class="ow_area_item ow_figure_result_text">
						<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_text'][$_smarty_tpl->tpl_vars['star_num']->value];?>

					</div>
				</div>
			</div>
			<div class="ow_star_figure_btm ow_tac">
				<img class="ow_vat" src="img/pc/result/star/star_figure_btm.jpg" alt="" title="">
			</div>
		<?php } else { ?>
			<img src="img/pc/nc/star_bg.png" alt="有料版ではあなたの十大主星と十二大従星がわかります" title="有料版ではあなたの十大主星と十二大従星がわかります">
		<?php }?>
		</div>
		<!--/.ow_area-->
		<div class="ow_comment_text ow_tac">
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			あなたの<?php echo $_smarty_tpl->tpl_vars['base_data']->value['result_category'];?>
運についてのお悩みは<br/><?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_graph_text'][$_smarty_tpl->tpl_vars['star_num']->value];?>
が答えを導きます
		<?php } else { ?>
			あなたの<?php echo $_smarty_tpl->tpl_vars['base_data']->value['result_category'];?>
運についてのお悩みは<br/>○○星が答えを導きます
		<?php }?>
		</div>
		<div class="ow_result_body_text">
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['result']['body'];?>

		<?php } else { ?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['result']['cut_body'];?>
<br>
			<div class="ow_nc ow_nc_white">
				<a href="javascript:<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag'])) {?>gtag_submit('result','<?php echo (defined('GTAG_KEY') ? constant('GTAG_KEY') : null);
echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];?>
');<?php }?>nc_submit('astrology_form<?php echo $_smarty_tpl->tpl_vars['pickup_num']->value;?>
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/pc/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

			</div>
		<?php }?>
		</div>
	</div>
	<!-- /.ow_result_item_mid -->
	<div class="ow_result_item_btm ow_tac">
		<img class="ow_vat" src="img/pc/result/result_item_btm.jpg" alt=""/>
	</div>
</div>
<!-- /.ow_result_item -->
<?php }
}
}
