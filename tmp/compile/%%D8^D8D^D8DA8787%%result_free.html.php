<?php /* Smarty version 2.6.18, created on 2023-12-13 19:41:55
         compiled from result_free.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'result_free.html', 8, false),)), $this); ?>
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
	<link rel="stylesheet" href="css/pc/common.css" type="text/css" />
	<link rel="stylesheet" href="css/pc/animation.css" type="text/css" />
	<script type="text/javascript" src="js/jquery1.8.js"></script>
	<script type="text/javascript" src="js/form_submit.js"></script>
	<script type="text/javascript" src="js/default_form_ie.js"></script>
	<script type="text/javascript" src="js/pc/animation.js"></script>
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
			有料鑑定結果
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
				<img class="ow_vat ow_pc_inline" src="img/pc/common/common_menu_btm.jpg" alt=""/>
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

<form id="astrology_form" name="astrology_form" method="post">
		<input type="hidden" name="qid" value="<?php echo $this->_tpl_vars['query_string']; ?>
">
</form>
<?php $_from = $this->_tpl_vars['pickup_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pickup_num'] => $this->_tpl_vars['pickup']):
?>
	<?php if ($this->_tpl_vars['pickup_num'] == 1): ?>
		<?php if ($this->_tpl_vars['contents_data']['id'] == 13): ?>
		<div class="ow_joint_bg">
			<img class="ow_tac" src="img/pc/result/joint_text_1.jpg" alt="タロットで近々のあなたの運命を見ました。次の鑑定では結婚の運気から、出会い結婚後の未来やあなたに訪れる障害などを「十大主星」や「天中殺」など算命学を用いて鑑定します。" title="タロットで近々のあなたの運命を見ました。次の鑑定では結婚の運気から、出会い結婚後の未来やあなたに訪れる障害などを「十大主星」や「天中殺」など算命学を用いて鑑定します。">
		</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['contents_data']['id'] == 14): ?>
		<div class="ow_joint_bg">
			<img class="ow_tac" src="img/pc/result/joint_text_3.jpg" alt="" title="">
		</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['contents_data']['id'] == 15): ?>
		<div class="ow_joint_bg">
			<img class="ow_tac" src="img/pc/result/joint_text_5.jpg" alt="" title="">
		</div>
		<?php endif; ?>
	
	<?php elseif ($this->_tpl_vars['pickup_num'] == 2): ?>
		<?php if ($this->_tpl_vars['contents_data']['id'] == 13): ?>
		<div class="ow_joint_bg">
			<img class="ow_tac" src="img/pc/result/joint_text_2.jpg" alt="" title="">
		</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['contents_data']['id'] == 14): ?>
		<div class="ow_joint_bg">
			<img class="ow_tac" src="img/pc/result/joint_text_4.jpg" alt="" title="">
		</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['contents_data']['id'] == 15): ?>

		<?php endif; ?>
	<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/result_pickup.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>
		  <!-- △△△本題ここまで△△△ -->
<!-- ▼▼▼TOPページおすすめメニュー移植▼▼▼ -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/recommend.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- ▲▲▲TOPページおすすめメニュー移植▲▲▲ -->
		</div>
		<!-- /.ow_result_wrap -->
			</div>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/footer_menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			<!-- /.ow_main -->

		</div>
	</div>
</body>
</html>