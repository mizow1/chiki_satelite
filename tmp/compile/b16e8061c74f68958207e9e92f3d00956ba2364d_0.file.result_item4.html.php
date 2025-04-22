<?php
/* Smarty version 4.1.1, created on 2024-01-04 16:57:33
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/result_item4.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_659664ed006b73_99345339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b16e8061c74f68958207e9e92f3d00956ba2364d' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/result_item4.html',
      1 => 1702617128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659664ed006b73_99345339 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 1) {?>
<div class="ow_result_item ow_tentyuusatu">
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
			<div class="ow_tentyuusatu_bg">
				<img src="img/pc/result/tentyuusatu_bg.png" alt="あなたの天中殺" title="あなたの天中殺">
			</div>
			<div class="ow_tentyuusatu_result ow_area_item">
				<img src="img/pc/result/tentyuusatu/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_tentyukaku_yy'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_tentyukaku_yy_text'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_tentyukaku_yy_text'];?>
">
			</div>
			<?php } else { ?>
				<img src="img/pc/nc/tentyuusatu_bg.png" alt="有料版ではあなたの天中殺がわかります" title="有料版ではあなたの天中殺がわかります">
			<?php }?>
		</div>
		<div class="ow_comment_text">
			天中殺は身体や生き方を整える大切な時間です。<br/>
			あなたがすべきこと、身に起こること今のあなたに必要なことを見ていきましょう。
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
<div class="ow_result_item ow_tentyuusatu">
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
			<div class="ow_tentyuusatu_bg">
				<img src="img/pc/result/tentyuusatu_bg2.png" alt="あの人の天中殺" title="あの人の天中殺">
			</div>
			<div class="ow_tentyuusatu_result ow_area_item">
				<img src="img/pc/result/tentyuusatu/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_tentyukaku_yy'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_tentyukaku_yy_text'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_tentyukaku_yy_text'];?>
">
			</div>
			<?php } else { ?>
				<img src="img/pc/nc/tentyuusatu_bg.png" alt="有料版ではあなたの天中殺がわかります" title="有料版ではあなたの天中殺がわかります">
			<?php }?>
		</div>
		<div class="ow_comment_text">
			天中殺は身体や生き方を整える大切な時間です。<br/>
			あなたがすべきこと、身に起こること今のあなたに必要なことを見ていきましょう。
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
