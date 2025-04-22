<?php
/* Smarty version 4.1.1, created on 2024-01-12 12:19:41
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/result_pickup.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_65a0afcd9dd637_49189767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6b949123c32e4e0f0cf621c528f790ed0c65600' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/result_pickup.html',
      1 => 1702880232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a0afcd9dd637_49189767 (Smarty_Internal_Template $_smarty_tpl) {
?>	<div class="ow_common_menu">
		<div class="ow_common_menu_top ow_tac">
			<img class="ow_vab" src="img/smp/common/common_menu_top.jpg" alt="" title=""/>
		</div>
		<div class="ow_common_menu_mid">
			<div class="ow_menu_head">
				<div class="ow_menu_icon">
					<div class="ow_menu_category"><img src="img/smp/category/<?php echo $_smarty_tpl->tpl_vars['pickup']->value['contents_data']['category'];?>
.png"alt="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['pickup']->value['contents_data']['category']]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['pickup']->value['contents_data']['target_count'] == 2) {?>二<?php } else { ?>一<?php }?>人用" title="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['pickup']->value['contents_data']['category']]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['pickup']->value['contents_data']['target_count'] == 2) {?>二<?php } else { ?>一<?php }?>人用"/></div>
				</div>
				<div class="ow_menu_title">
					<?php echo $_smarty_tpl->tpl_vars['pickup']->value['contents_data']['name'];?>

				</div>
			</div>
		</div>
		<div class="ow_common_menu_btm ow_tac">
			<img class="ow_vat" src="img/smp/common/common_menu_btm.jpg" alt=""/>
		</div>
	</div>
	<!-- /.ow_common_menu -->


	<div class="ow_sub_menu ow_sub_menu_entry">
		<div class="ow_sub_menu_top ow_tac">
			<img class="ow_vab" src="img/smp/entry/sub_menu_top_2.jpg" alt=""/>
		</div>
		<div class="ow_sub_menu_mid">
			<div class="ow_sub_title">
				<img class="ow_tac" src="img/smp/entry/sub_menu_title.png" alt="このメニューでは以下の項目が占えます" title="このメニューでは以下の項目が占えます"/>
			</div>
			<div class="ow_sub_menu_list">
	<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 1) {?>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					あなたを表す十二支
				</div>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					外向きのあなたと本来の姿
				</div>
	<?php } else { ?>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					あの人を表す十二支
				</div>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					外向きのあの人と本来の姿
				</div>
	<?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pickup']->value['menu_list'], 'pickup_menu', false, 'key', 'menu_data_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['pickup_menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['pickup_menu']->value) {
$_smarty_tpl->tpl_vars['pickup_menu']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['total'];
?>
		<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_menu_data_loop']->value['last'] : null)) {?>
			<?php if ($_smarty_tpl->tpl_vars['pickup_menu']->value['astrology_category'] == 5) {?>
				<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
					<?php echo $_smarty_tpl->tpl_vars['pickup_menu']->value['name'];?>

				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['pickup_menu']->value['astrology_category'] >= 2) {?>
				<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
					<?php echo $_smarty_tpl->tpl_vars['pickup_menu']->value['name'];?>

				</div>
			<?php } else { ?>
				<div class="ow_sub_menu_item ow_sub_menu_item ow_dot_base">
					<?php echo $_smarty_tpl->tpl_vars['pickup_menu']->value['name'];?>

				</div>
			<?php }?>
		<?php } else { ?>
					<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
						<?php echo $_smarty_tpl->tpl_vars['pickup_menu']->value['name'];?>

					</div>
		<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			</div>
			<!-- /.ow_sub_menu_list -->
			<div class="ow_conductor_caption">
				<div class="ow_conductor_btn">
					<a href="javascript:nc_submit('astrology_form<?php echo $_smarty_tpl->tpl_vars['pickup_num']->value;?>
')" class="ow_conductor_btn_link"><img src="img/smp/nc/btn_submit_2.png" alt="続きを読む(有料)" title="続きを読む(有料)"></a>
				</div>
				<div class="ow_conductor_caption_text ow_conductor_caption_text_border">
					<span class="ow_conductor_caption_text_strong">「続きを見る」を押しますと<br>
					鑑定結果の続きをご覧いただけます。</span><br>
					<br>
					<div class="ow_conductor_caption_text_1">
<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['price_taxin'] == 1) {?>
					<span class="ow_conductor_caption_text_strong">
					こちらのメニューは
					<div class="ow_yellow ow_nif">
						プレミアム価格　<?php echo number_format($_smarty_tpl->tpl_vars['pickup']->value['contents_data']['price_off10']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>

					</div>
					<div class="ow_default_price">
						<span class="ow_nif">通常価格　</span><?php echo number_format($_smarty_tpl->tpl_vars['pickup']->value['contents_data']['price_taxin']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>

					</div>
					でご利用できます。
					</span>
<?php } elseif (!empty($_smarty_tpl->tpl_vars['pickup']->value['base_contents_data'])) {?>
					<span class="ow_conductor_caption_text_strong">このメニューは通常<?php echo number_format($_smarty_tpl->tpl_vars['pickup']->value['base_contents_data']['price_taxin']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>
のところを<br>
					<span class="ow_yellow"><?php echo number_format($_smarty_tpl->tpl_vars['pickup']->value['contents_data']['price_taxin']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>
でご利用できます。</span></span><br>
<?php } else { ?>
					<span class="ow_conductor_caption_text_strong">このメニューは<?php echo number_format($_smarty_tpl->tpl_vars['pickup']->value['contents_data']['price_taxin']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>
でご利用できます。</span><br>
<?php }?>
				</div>
				</div>
				<div class="ow_conductor_caption_text_2">
					ご利用の前には、メニュー内容のご確認をお願いいたします。
					ご購入されるとサービス・コンテンツのご利用料金が発生いたします。
				</div>
			</div>
			<form id="astrology_form<?php echo $_smarty_tpl->tpl_vars['pickup_num']->value;?>
" method="POST" action="./?menu=<?php echo $_smarty_tpl->tpl_vars['pickup']->value['contents_data']['id'];?>
">
				<input type="hidden" name="qid" value="<?php echo $_smarty_tpl->tpl_vars['pickup']->value['qid'];?>
">
				<input type="hidden" name="nc" value="0">
			</form>
			<!-- /.ow_sub_menu_caption -->
		</div>
		<!-- ow_sub_menu_mid -->
		<div class="ow_sub_menu_btm ow_tac">
			<img class="ow_vat" src="img/smp/entry/sub_menu_btm.jpg" alt="">
		</div>
	</div>
	<!-- /.ow_sub_menu -->
<form id="astrology_form<?php echo $_smarty_tpl->tpl_vars['pickup_num']->value;?>
" method="POST" action="./?menu=<?php echo $_smarty_tpl->tpl_vars['pickup']->value['contents_data']['id'];?>
">
    <input type="hidden" name="qid" value="<?php echo $_smarty_tpl->tpl_vars['pickup']->value['qid'];?>
">
    <input type="hidden" name="nc" value="0">
</form><?php }
}
