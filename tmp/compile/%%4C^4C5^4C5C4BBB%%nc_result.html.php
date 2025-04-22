<?php /* Smarty version 2.6.18, created on 2023-12-13 19:29:22
         compiled from nc_result.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'nc_result.html', 8, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="ja" lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo @ISP_BASE_URL; ?>
web/">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="viewport" content="width=device-width" />
	<title><?php if (ISP == nifty): ?>@nifty:<?php endif; ?><?php echo @CONTENTS_NAME; ?>
：<?php echo ((is_array($_tmp=@$this->_tpl_vars['contents_data']['name_rakuten'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['contents_data']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['contents_data']['name'])); ?>
</title>
	<link rel="stylesheet" href="css/pc/common.css" type="text/css">
	<link rel="stylesheet" href="css/pc/animation.css" type="text/css">
	<script type="text/javascript" src="js/jquery1.8.js"></script>
	<script type="text/javascript" src="js/default_form_ie.js"></script>
	<script type="text/javascript" src="js/pc/animation.js"></script>
	<script type="text/javascript" src="js/pc/profile.js"></script>
	<script src="js/jquery.tile.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/pc/result.js"></script>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/ga.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body class="ow_body">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/header_isp.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="ow_body_bg_01">
<div class="ow_body_bg_02">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/header_menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


	<div class="ow_main">

		<div class="ow_bread">
			<a href="<?php echo @CONTENTS_URL; ?>
">TOP</a> &gt;
			<a href="<?php echo @ISP_BASE_URL; ?>
web/?menu=<?php if ($this->_tpl_vars['contents_data']['id'] > 500 && $this->_tpl_vars['contents_data']['id'] < 900): ?><?php echo $this->_tpl_vars['contents_data']['id']-500; ?>
<?php else: ?><?php echo $this->_tpl_vars['contents_data']['id']; ?>
<?php endif; ?>">入力画面</a> &gt;
<?php if ($this->_tpl_vars['contents_data']['price_taxin'] > 1): ?>
			一部無料鑑定結果
<?php else: ?>
			無料鑑定結果
<?php endif; ?>
		</div>
		<div class="ow_sp_contents">
		<div class="ow_common_menu">
			<div class="ow_common_menu_top ow_tac">
				<img class="ow_vab" src="img/pc/common/common_menu_top.jpg" alt=""/>
			</div>
			<div class="ow_common_menu_mid">
				<div class="ow_menu_head">
					<div class="ow_menu_icon">
						<div class="ow_menu_category"><img src="img/pc/category/<?php echo $this->_tpl_vars['contents_data']['category']; ?>
.png" alt="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['contents_data']['category']]['name']; ?>
　<?php if ($this->_tpl_vars['contents_data']['target_count'] == 2): ?>二<?php else: ?>一<?php endif; ?>人用" title="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['contents_data']['category']]['name']; ?>
　<?php if ($this->_tpl_vars['contents_data']['target_count'] == 2): ?>二<?php else: ?>一<?php endif; ?>人用" /></div>
					</div>
					<div class="ow_menu_title">
						<?php echo ((is_array($_tmp=@$this->_tpl_vars['contents_data']['name_rakuten'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['contents_data']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['contents_data']['name'])); ?>

					</div>
				</div>
			</div>
			<div class="ow_common_menu_btm ow_tac">
				<img class="ow_vat ow_pc_inline" src="img/pc/common/common_menu_btm.jpg" alt="">
			</div>
		</div>
		<!-- /.ow_common_menu -->

		<!-- ウェルカムメッセージ -->
		<div class="ow_welcome">
			<div class="ow_welcome_inr">
				<div class="ow_welcome_bg">
					<img class="ow_tac" src="img/pc/result/welcome_bg.jpg" alt=""/>
				</div>
				<div class="ow_welcome_text ow_welcome_item">
					<img class="ow_tac" src="img/pc/result/welcome_text.png" alt="ようこそいらっしゃいました。 まず最初に生年月日から 算命学表を見てみましょう。" title="ようこそいらっしゃいました。 まず最初に生年月日から 算命学表を見てみましょう。"/>
				</div>
			</div>
			<!-- /.ow_welcome_inr -->
		</div>
		<!-- /.ow_welcome -->
		<div class="ow_result_wrap">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/base.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- ▽▽▽本題ここから▽▽▽ -->
<?php $_from = $this->_tpl_vars['result_item_data']['menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu_id'] => $this->_tpl_vars['menu_data']):
?>
	<?php if ($this->_tpl_vars['menu_data']['astrology_category'] == 1): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/result_item1.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['menu_data']['astrology_category'] == 2): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/result_item2.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['menu_data']['astrology_category'] == 3): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/result_item3.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['menu_data']['astrology_category'] == 4): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/result_item4.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['menu_data']['astrology_category'] == 5): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/result_item5.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['menu_data']['astrology_category'] == 6): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/result_item6.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
		<div class="ow_result_item ow_message">
			<div class="ow_result_item_top ow_tac">
				<img class="ow_vab" src="img/pc/result/message_top.jpg" alt="冬月からあなたへ" title="冬月からあなたへ"/>
			</div>
			<div class="ow_result_item_mid">
				<div class="ow_result_last_title">
					<?php echo $this->_tpl_vars['result_item_data']['last_result']['name']; ?>

				</div>
				<div class="ow_result_body_text">
					<div class="ow_nc ow_nc_white">
						<a href="javascript:<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] )): ?>gtag_submit('result','<?php echo @GTAG_KEY; ?>
<?php echo $this->_tpl_vars['contents_data']['id']; ?>
');<?php endif; ?>nc_submit('astrology_form<?php echo $this->_tpl_vars['pickup_num']; ?>
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/pc/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

					</div>
				</div>
			</div>
			<div class="ow_result_item_btm ow_tac">
				<img class="ow_vat" src="img/pc/result/message_btm.jpg" alt=""/>
			</div>
		</div>

		<form id="astrology_form" name="astrology_form" method="post" action="<?php echo @API_DOMAIN; ?>
web/?menu=<?php echo $this->_tpl_vars['contents_data']['id']; ?>
">
			<input type="hidden" name="qid" value="<?php echo $this->_tpl_vars['query_string']; ?>
">
		</form>


<!-- ▽▽▽占者紹介ページパーツ移植▽▽▽ -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/sample.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- △△△占者紹介ページパーツ移植△△△ -->

		</div>
		<!-- /.ow_result_wrap -->
			</div>
			</div>
			<!-- /.ow_main -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/footer_menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
</body>
</html>