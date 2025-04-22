<?php
/* Smarty version 4.1.1, created on 2024-01-04 16:57:32
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/result_item6.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_659664ecf1dec8_08202658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5db1b24e16b8c67ddeaabd4466f081d3195d01f5' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/result_item6.html',
      1 => 1702617127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659664ecf1dec8_08202658 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ow_result_item ow_card">
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
		<?php $_smarty_tpl->_assignInScope('tarot_num', $_smarty_tpl->tpl_vars['menu_data']->value['result']['item_id']);?>
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
		<div class="ow_area ow_tac">
			<div class="ow_card_bg">
				<img src="img/pc/result/card_bg.png" alt="タロットカード" title="タロットカード">
			</div>
			<div class="ow_area_item ow_card_5">
				<img src="img/pc/result/card_5.png" alt="">
			</div>
			<div class="ow_area_item ow_card_result">
				<img src="img/pc/result/card/<?php echo $_smarty_tpl->tpl_vars['tarot_num']->value+1;?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['base_data']->value['result_tarot'][$_smarty_tpl->tpl_vars['tarot_num']->value];?>
" title="<?php echo $_smarty_tpl->tpl_vars['base_data']->value['result_tarot'][$_smarty_tpl->tpl_vars['tarot_num']->value];?>
">
			</div>
			<div class="ow_area_item ow_card_hand">
				<img src="img/pc/result/card/hand.png" alt="">
			</div>
		</div>
		<div class="ow_comment_text">
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
について、『<?php echo $_smarty_tpl->tpl_vars['base_data']->value['result_tarot'][$_smarty_tpl->tpl_vars['tarot_num']->value];?>
』のカードがでました。
		</div>
		<?php } else { ?>
		<div class="ow_area ow_tac">
			<img src="img/pc/nc/card_bg.png" alt="有料版ではあなたのタロット結果がわかります" title="有料版ではあなたの十大主星と十二大従星がわかります">
		</div>
		<div class="ow_comment_text">
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
について、『○○』のカードがでました。
		</div>
		<?php }?>
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
<!-- /.ow_result_item --><?php }
}
