<?php
/* Smarty version 4.1.1, created on 2024-07-04 16:18:07
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/head_title.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_66864cafa02209_86955449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '552377ccef490e944945a3ac787474528595ba69' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/parts/head_title.html',
      1 => 1720077048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66864cafa02209_86955449 (Smarty_Internal_Template $_smarty_tpl) {
?><title><?php if ($_smarty_tpl->tpl_vars['contents_data']->value['category'] == "kataomoi") {?>片思い<?php } else {
echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['contents_data']->value['category']]['name'];
}?>占い│<?php echo (($tmp = (($tmp = $_smarty_tpl->tpl_vars['contents_data']->value['name_biglobe'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name_rakuten'] ?? null : $tmp) ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name'] ?? null : $tmp);?>
│算命学相性占い</title>
<?php }
}
