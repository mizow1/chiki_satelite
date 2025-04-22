<?php
/* Smarty version 4.1.1, created on 2023-12-18 16:39:24
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/result_item5.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_657ff72c65fad2_80104735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a53b129645528bfcbdd50a91cdeff7ffa8d5c0ae' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/result_item5.html',
      1 => 1702880232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657ff72c65fad2_80104735 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 1) {?>
<div class="ow_result_item ow_tentyuusatu">
	<div class="ow_result_item_top ow_tac">
		<img class="ow_vab" src="img/smp/result/result_item_top.jpg" alt=""/>
	</div>
	<div class="ow_result_item_mid">
		<div class="ow_result_title">
			<div class="ow_result_title_top ow_tac"><img class="ow_vab" src="img/smp/result/result_title_top.png" alt=""/></div>
			<div class="ow_result_title_mid"><?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
</div>
			<div class="ow_result_title_btm ow_tac"><img class="ow_vat" src="img/smp/result/result_title_btm.png" alt=""/></div>
		</div>

		<div class="ow_area ow_tac">
			<div class="ow_tentyuusatu_bg">
				<img src="img/smp/result/zyukkan/zyukkan_bg.png" alt="あなたの十干" title="あなたの十干">
			</div>
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<div class="ow_tentyuusatu_result ow_area_item ow_zyukkan_result">
<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 0) {?>
				<img src="img/smp/result/zyukkan/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_mental_num_yy'];?>
.png" alt="" title="">
<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 1) {?>
				<img src="img/smp/result/zyukkan/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_mental_num_mm'];?>
.png" alt="" title="">
<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 2) {?>
				<img src="img/smp/result/zyukkan/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_mental_num_dd'];?>
.png" alt="" title="">
<?php }?>
			</div>
		<?php } else { ?>
			<div class="ow_tentyuusatu_result ow_area_item ow_zyukkan_result">
				<img src="img/smp/result/zyukkan/nc.png" alt="" title="">
			</div>
		<?php }?>
		</div>
		<div class="ow_comment_text ow_tac">
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
は<br/>
<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 0) {?>
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_mental_yy'];?>

<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 1) {?>
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_mental_mm'];?>

<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 2) {?>
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_mental_dd'];?>

<?php }?>
の十干から答えを導きます
		<?php } else { ?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
は○の十干から答えを導きます
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
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/smp/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

			</div>
		<?php }?>
	</div>
	<!-- /.ow_result_item_mid -->
</div>
	<div class="ow_result_item_btm ow_tac">
		<img class="ow_vat" src="img/smp/result/result_item_btm.jpg" alt=""/>
	</div>
<!-- /.ow_result_item -->
<?php } else { ?>
<div class="ow_result_item ow_tentyuusatu">
	<div class="ow_result_item_top ow_tac">
		<img class="ow_vab" src="img/smp/result/result_item_top.jpg" alt=""/>
	</div>
	<div class="ow_result_item_mid">
		<div class="ow_result_title">
			<div class="ow_result_title_top ow_tac"><img class="ow_vab" src="img/smp/result/result_title_top.png" alt=""/></div>
			<div class="ow_result_title_mid"><?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
</div>
			<div class="ow_result_title_btm ow_tac"><img class="ow_vat" src="img/smp/result/result_title_btm.png" alt=""/></div>
		</div>

		<div class="ow_area ow_tac">
			<div class="ow_tentyuusatu_bg">
				<img src="img/smp/result/zyukkan/zyukkan_bg2.png" alt="あの人の十干" title="あの人の十干">
			</div>
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<div class="ow_tentyuusatu_result ow_area_item ow_zyukkan_result">
<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 0) {?>
				<img src="img/smp/result/zyukkan/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_mental_num_yy'];?>
.png" alt="" title="">
<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 1) {?>
				<img src="img/smp/result/zyukkan/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_mental_num_mm'];?>
.png" alt="" title="">
<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 2) {?>
				<img src="img/smp/result/zyukkan/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_mental_num_dd'];?>
.png" alt="" title="">
<?php }?>
			</div>
		<?php } else { ?>
			<div class="ow_tentyuusatu_result ow_area_item ow_zyukkan_result">
				<img src="img/smp/result/zyukkan/nc.png" alt="" title="">
			</div>
		<?php }?>
		</div>
		<div class="ow_comment_text ow_tac">
		<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null) || $_smarty_tpl->tpl_vars['page_identify']->value == (defined('FREE') ? constant('FREE') : null))) {?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
は<br/>
<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 0) {?>
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_mental_yy'];?>

<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 1) {?>
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_mental_mm'];?>

<?php } elseif ($_smarty_tpl->tpl_vars['menu_data']->value['result_category_sub'] == 2) {?>
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_mental_dd'];?>

<?php }?>
の十干から答えを導きます
		<?php } else { ?>
			<?php echo $_smarty_tpl->tpl_vars['menu_data']->value['name'];?>
は○の十干から答えを導きます
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
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/smp/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

			</div>
		<?php }?>
		</div>
	</div>
	<!-- /.ow_result_item_mid -->
</div>
	<div class="ow_result_item_btm ow_tac">
		<img class="ow_vat" src="img/smp/result/result_item_btm.jpg" alt=""/>
	</div>
<!-- /.ow_result_item -->
<?php }
}
}
