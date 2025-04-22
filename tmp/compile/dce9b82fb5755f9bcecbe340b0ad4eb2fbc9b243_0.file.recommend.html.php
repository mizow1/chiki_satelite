<?php
/* Smarty version 4.1.1, created on 2023-12-18 15:35:36
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/recommend.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_657fe8387e0d56_79466039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dce9b82fb5755f9bcecbe340b0ad4eb2fbc9b243' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/recommend.html',
      1 => 1702880232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657fe8387e0d56_79466039 (Smarty_Internal_Template $_smarty_tpl) {
?>	<!-- ▼▼▼TOPページおすすめメニュー移植▼▼▼ -->
	<!-- ow_rec -->
	<div class="ow_rec">
		<div class="ow_rec_top ow_tac">
			<img class="ow_vab" src="img/smp/top/rec_top.png" alt="おすすめ鑑定" title="おすすめ鑑定"/>
		</div>
		<div class="ow_rec_mid">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recommend_list']->value, 'val', false, NULL, 'recommend_data', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['val']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_recommend_data']->value['iteration']++;
?>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_recommend_data']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_recommend_data']->value['iteration'] : null) < 6) {?>
        <?php if (!in_array($_smarty_tpl->tpl_vars['val']->value['pickup_menu'],$_smarty_tpl->tpl_vars['ignore_recommend_id']->value)) {?>

        <?php $_smarty_tpl->_assignInScope('pickup_contents_data', $_smarty_tpl->tpl_vars['contents_list']->value[$_smarty_tpl->tpl_vars['val']->value['pickup_menu']]);?>
        <?php $_smarty_tpl->_assignInScope('pickup_category', $_smarty_tpl->tpl_vars['contents_list']->value[$_smarty_tpl->tpl_vars['val']->value['pickup_menu']]['category']);?>
        <?php $_smarty_tpl->_assignInScope('pickup_category_group', $_smarty_tpl->tpl_vars['contents_list']->value[$_smarty_tpl->tpl_vars['val']->value['pickup_menu']]['category_group']);?>
        <?php $_smarty_tpl->_assignInScope('pickup_target_count', $_smarty_tpl->tpl_vars['contents_list']->value[$_smarty_tpl->tpl_vars['val']->value['pickup_menu']]['target_count']);?>

            <div class="ow_menu">
              <div class="ow_menu_head">
                <div class="ow_menu_icon"><img src="img/smp/category/<?php echo $_smarty_tpl->tpl_vars['pickup_category']->value;?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['pickup_category']->value]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['pickup_target_count']->value == 1) {?>一人用<?php } else { ?>二人用<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['pickup_category']->value]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['pickup_target_count']->value == 1) {?>一人用<?php } else { ?>二人用<?php }?>" /></div>
                <div class="ow_menu_title">
                    <a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/?menu=<?php echo $_smarty_tpl->tpl_vars['pickup_contents_data']->value['id'];?>
" class="ow_menu_link"><?php echo (($tmp = $_smarty_tpl->tpl_vars['pickup_contents_data']->value['name_rakuten'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['pickup_contents_data']->value['name'] ?? null : $tmp);?>
</a>
                </div>
              </div>
              <div class="ow_menu_tail">
                <span class="ow_menu_price ow_premium_price"><span class="ow_nif">プレミアム価格　<?php echo number_format($_smarty_tpl->tpl_vars['pickup_contents_data']->value['price_off10']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>
</span></span>
                <span class="ow_menu_price ow_default_price"><span class="ow_nif">通常価格　</span><?php echo number_format($_smarty_tpl->tpl_vars['pickup_contents_data']->value['price_taxin']);
echo (defined('PRICE_UNIT') ? constant('PRICE_UNIT') : null);?>
</span>
              </div>
            </div>

        <?php }?>
    <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		<!-- /.ow_rec_mid -->
		<div class="ow_rec_btm ow_tac">
			<img class="ow_vat" src="img/smp/top/rec_btm.jpg" alt="" />
		</div>
	</div>
	<!-- /.ow_rec -->
<!-- ▲▲▲TOPページおすすめメニュー移植▲▲▲ -->
<?php }
}
