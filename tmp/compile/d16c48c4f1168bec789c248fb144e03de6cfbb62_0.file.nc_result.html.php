<?php
/* Smarty version 4.1.1, created on 2024-04-15 09:22:25
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/nc_result.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_661c7341e04a97_92431544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd16c48c4f1168bec789c248fb144e03de6cfbb62' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/nc_result.html',
      1 => 1710999145,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./parts/ga.html' => 1,
    'file:../../../../../common/header_isp.html' => 1,
    'file:./parts/header_menu.html' => 1,
    'file:parts/base.html' => 1,
    'file:parts/result_item1.html' => 1,
    'file:parts/result_item2.html' => 1,
    'file:parts/result_item3.html' => 1,
    'file:parts/result_item4.html' => 1,
    'file:parts/result_item5.html' => 1,
    'file:parts/result_item6.html' => 1,
    'file:./parts/sample.html' => 1,
    'file:./parts/footer_menu.html' => 1,
  ),
),false)) {
function content_661c7341e04a97_92431544 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="ja" lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="viewport" content="width=device-width" />
	<title><?php if ('ISP' == 'nifty') {?>@nifty:<?php }
echo (defined('CONTENTS_NAME') ? constant('CONTENTS_NAME') : null);?>
：<?php echo (($tmp = (($tmp = $_smarty_tpl->tpl_vars['contents_data']->value['name_biglobe'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name_rakuten'] ?? null : $tmp) ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name'] ?? null : $tmp);?>
</title>
	<link rel="stylesheet" href="css/smp/sp.css" type="text/css" />
	<link rel="stylesheet" href="css/smp/animation.css" type="text/css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery1.8.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/default_form_ie.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/form_submit.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/jquery.tile.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/smp/result.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/smp/profile.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/smp/pagetop.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/smp/animation.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/rakuten_logo.js"><?php echo '</script'; ?>
>
	<?php $_smarty_tpl->_subTemplateRender("file:./parts/ga.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body class="ow_body">

<?php $_smarty_tpl->_subTemplateRender("file:../../../../../common/header_isp.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:./parts/header_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="ow_main">

		<div class="ow_bread">
			<a href="<?php echo (defined('CONTENTS_URL') ? constant('CONTENTS_URL') : null);?>
">TOP</a> &gt;
			<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/?menu=<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['id'] > 500 && $_smarty_tpl->tpl_vars['contents_data']->value['id'] < 900) {
echo $_smarty_tpl->tpl_vars['contents_data']->value['id']-500;
} else {
echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];
}?>">入力画面</a> &gt;
<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['price_taxin'] > 1) {?>
			一部無料鑑定結果
<?php } else { ?>
			無料鑑定結果
<?php }?>
		</div>

		<div class="ow_common_menu">
			<div class="ow_common_menu_top ow_tac">
				<img class="ow_vab" src="img/smp/common/common_menu_top.jpg" alt=""/>
			</div>
			<div class="ow_common_menu_mid">
				<div class="ow_menu_head">
					<div class="ow_menu_icon">
						<div class="ow_menu_category"><img src="img/smp/category/<?php echo $_smarty_tpl->tpl_vars['contents_data']->value['category'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['contents_data']->value['category']]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 2) {?>二<?php } else { ?>一<?php }?>人用" title="<?php echo $_smarty_tpl->tpl_vars['category_data']->value[$_smarty_tpl->tpl_vars['contents_data']->value['category']]['name'];?>
　<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 2) {?>二<?php } else { ?>一<?php }?>人用" /></div>
					</div>
					<div class="ow_menu_title">
						<?php echo (($tmp = (($tmp = $_smarty_tpl->tpl_vars['contents_data']->value['name_biglobe'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name_rakuten'] ?? null : $tmp) ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contents_data']->value['name'] ?? null : $tmp);?>

					</div>
				</div>
			</div>
			<div class="ow_common_menu_btm ow_tac">
				<img class="ow_vat ow_smp_inline" src="img/smp/common/common_menu_btm.jpg" alt="">
			</div>
		</div>
		<!-- /.ow_common_menu -->

		<!-- ウェルカムメッセージ -->
		<div class="ow_welcome">
			<div class="ow_welcome_inr">
				<div class="ow_welcome_bg">
					<img class="ow_tac" src="img/smp/result/welcome_bg.jpg" alt=""/>
				</div>
				<div class="ow_welcome_text ow_welcome_item">
					<img class="ow_tac" src="img/smp/result/welcome_text.png" alt="ようこそいらっしゃいました。 まず最初に生年月日から 算命学表を見てみましょう。" title="ようこそいらっしゃいました。 まず最初に生年月日から 算命学表を見てみましょう。"/>
				</div>
			</div>
			<!-- /.ow_welcome_inr -->
		</div>
		<!-- /.ow_welcome -->
		<div class="ow_result_wrap">
<?php $_smarty_tpl->_subTemplateRender("file:parts/base.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<!-- ▽▽▽本題ここから▽▽▽ -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result_item_data']->value['menu_list'], 'menu_data', false, 'menu_id');
$_smarty_tpl->tpl_vars['menu_data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu_id']->value => $_smarty_tpl->tpl_vars['menu_data']->value) {
$_smarty_tpl->tpl_vars['menu_data']->do_else = false;
?>
	<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['astrology_category'] == 1) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:parts/result_item1.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['astrology_category'] == 2) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:parts/result_item2.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['astrology_category'] == 3) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:parts/result_item3.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['astrology_category'] == 4) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:parts/result_item4.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['astrology_category'] == 5) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:parts/result_item5.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['menu_data']->value['astrology_category'] == 6) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:parts/result_item6.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<div class="ow_result_item ow_message">
			<div class="ow_result_item_top ow_tac">
				<img class="ow_vab" src="img/smp/result/message_top.jpg" alt="冬月からあなたへ" title="冬月からあなたへ"/>
			</div>
			<div class="ow_result_item_mid">
				<div class="ow_result_last_title">
					<?php echo $_smarty_tpl->tpl_vars['result_item_data']->value['last_result']['name'];?>

				</div>
				<div class="ow_result_body_text">
					<div class="ow_nc ow_nc_white">
						<a href="javascript:<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag'])) {?>gtag_submit('result','<?php echo (defined('GTAG_KEY') ? constant('GTAG_KEY') : null);
echo $_smarty_tpl->tpl_vars['contents_data']->value['id'];?>
');<?php }?>nc_submit('astrology_form<?php echo $_smarty_tpl->tpl_vars['pickup_num']->value;?>
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/smp/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

					</div>
				</div>
			</div>
			<div class="ow_result_item_btm ow_tac">
				<img class="ow_vat" src="img/smp/result/message_btm.jpg" alt=""/>
			</div>
		</div>

		<form id="astrology_form" name="astrology_form" method="post">
			<input type="hidden" name="qid" value="<?php echo $_smarty_tpl->tpl_vars['query_string']->value;?>
">
		</form>


<!-- ▽▽▽占者紹介ページパーツ移植▽▽▽ -->
<?php $_smarty_tpl->_subTemplateRender("file:./parts/sample.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- △△△占者紹介ページパーツ移植△△△ -->

		</div>
		<!-- /.ow_result_wrap -->
			</div>
			<!-- /.ow_main -->
			<?php $_smarty_tpl->_subTemplateRender("file:./parts/footer_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
