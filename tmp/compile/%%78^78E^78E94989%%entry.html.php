<?php /* Smarty version 2.6.18, created on 2023-12-13 19:23:46
         compiled from entry.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'entry.html', 8, false),array('modifier', 'string_format', 'entry.html', 211, false),array('modifier', 'number_format', 'entry.html', 377, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="ja" lang="ja" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="viewport" content="width=device-width" />
	<title><?php if (ISP == nifty): ?>@nifty:<?php endif; ?><?php echo @CONTENTS_NAME; ?>
：<?php echo ((is_array($_tmp=@$this->_tpl_vars['contents_data']['name_rakuten'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['contents_data']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['contents_data']['name'])); ?>
</title>
	<link rel="stylesheet" href="css/pc/common.css" type="text/css" />
	<script type="text/javascript" src="js/jquery1.8.js"></script>
	<script src="js/jquery.tile.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/default_form_ie.js"></script>
	<script type="text/javascript" src="js/pc/entry.js"></script>
	<script type="text/javascript" src="js/date.js"></script>
	<script type="text/javascript" src="js/sex_auto_change.js"></script>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:./parts/ga.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script type="text/javascript">
		$(window).on('load', function() {
			loadCookie(<?php echo $this->_tpl_vars['contents_data']['target_count']; ?>
);
		});
	</script>
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
			入力ページ
		</div>


	<?php if ($this->_tpl_vars['contents_data']['picup_contents_id_1'] > 500): ?>
			<div class="ow_waribiki">
				<div>
					こちらを購入頂くと、通常メニューを<strong class="ow_yellow">割引価格で2つご紹介致します。</strong><br>お好きな方を選んでご利用いただけます。
				</div>
			</div>
			<!-- /.ow_sub_menu_caption -->
	<?php endif; ?>

<div class="ow_sp_contents">
		<div class="ow_common_menu">
			<div class="ow_common_menu_top ow_tac">
				<img class="ow_vab" src="img/pc/common/common_menu_top.jpg" alt="">
			</div>
			<div class="ow_common_menu_mid">
				<div class="ow_menu_head">
					<div class="ow_menu_icon">
						<div class="ow_menu_category">
							<img src="img/pc/category/<?php echo $this->_tpl_vars['contents_data']['category']; ?>
.png" alt="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['contents_data']['category']]['name']; ?>
　<?php if ($this->_tpl_vars['contents_data']['target_count'] == 2): ?>二<?php else: ?>一<?php endif; ?>人用" title="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['contents_data']['category']]['name']; ?>
　<?php if ($this->_tpl_vars['contents_data']['target_count'] == 2): ?>二<?php else: ?>一<?php endif; ?>人用" />
						</div>
					</div>
					<div class="ow_menu_title">
						<?php echo ((is_array($_tmp=@$this->_tpl_vars['contents_data']['name_rakuten'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['contents_data']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['contents_data']['name'])); ?>

					</div>
				</div>
			</div>
			<div class="ow_common_menu_btm ow_tac">
				<img class="ow_vat" src="img/pc/common/common_menu_btm.jpg" alt="">
			</div>
		</div>
		<!-- /.ow_common_menu -->

		<div class="ow_entry">
			<div class="ow_sample_intro ow_tac">
				<div class="ow_sample_intro_canvas">
					<img src="img/pc/top/sample_intro_canvas.jpg" alt=""/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_confetti">
					<img src="img/pc/top/sample_intro_confetti.png" alt="" title=""/>
				</div>

				<div class="ow_sample_intro_item ow_sample_intro_text">
					<img src="img/pc/top/sample_intro_text.png" alt="この恋もうダメ?!　最近ツイてない…　結婚は諦めた…" title="この恋もうダメ?!　最近ツイてない…　結婚は諦めた…"/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_title_1">
					<img src="img/pc/top/sample_intro_title_1.png" alt="絶望的な状態が激変する!" title="絶望的な状態が激変する!"/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_title_2">
					<img src="img/pc/top/sample_intro_title_2.png" alt="逆転成功術" title="逆転成功術"/>
				</div>
				<div class="ow_sample_intro_item ow_sample_intro_hikari">
					<img src="img/pc/top/sample_intro_hikari.png" alt="" title=""/>
				</div>
			</div>
			<!-- /.ow_sample_intro -->

			<div class="ow_sub_menu ow_sub_menu_entry">
				<div class="ow_sub_menu_top ow_tac">
					<img class="ow_vab" src="img/pc/entry/sub_menu_top.jpg" alt="鑑定項目" title="鑑定項目">
				</div>
				<div class="ow_sub_menu_mid">
					<div class="ow_sub_menu_list">
	<?php if ($this->_tpl_vars['contents_data']['target_count'] == 1): ?>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					あなたを表す十二支
				</div>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					外向きのあなたと本来の姿
				</div>
	<?php else: ?>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					あの人を表す十二支
				</div>
				<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
					外向きのあの人と本来の姿
				</div>
	<?php endif; ?>
<?php $_from = $this->_tpl_vars['pack_contents_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pack_contents_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pack_contents_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
        $this->_foreach['pack_contents_list']['iteration']++;
?>
	<?php $_from = $this->_tpl_vars['menu_data'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menu_data_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menu_data_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['val2']):
        $this->_foreach['menu_data_loop']['iteration']++;
?>
		<?php if ($this->_tpl_vars['contents_data']['price_notax'] == 1): ?>
						<div class="ow_sub_menu_item ow_sub_menu_item ow_dot_base">
							<?php echo $this->_tpl_vars['val2']['name']; ?>

						</div>
		<?php elseif (! ($this->_foreach['menu_data_loop']['iteration'] == $this->_foreach['menu_data_loop']['total'])): ?>
			<?php if ($this->_tpl_vars['val2']['astrology_category'] == 3): ?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo $this->_tpl_vars['val2']['name']; ?>

						</div>
			<?php elseif ($this->_tpl_vars['val2']['astrology_category'] >= 5): ?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo $this->_tpl_vars['val2']['name']; ?>

						</div>
			<?php elseif ($this->_tpl_vars['val2']['astrology_category'] >= 2): ?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo $this->_tpl_vars['val2']['name']; ?>

						</div>
			<?php elseif ($this->_tpl_vars['val2']['astrology_category'] >= 4): ?>
						<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
							<?php echo $this->_tpl_vars['val2']['name']; ?>

						</div>
			<?php else: ?>
						<div class="ow_sub_menu_item ow_sub_menu_item ow_dot_base">
							<?php echo $this->_tpl_vars['val2']['name']; ?>

						</div>
			<?php endif; ?>
		<?php else: ?>
						<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
							<?php echo $this->_tpl_vars['val2']['name']; ?>

						</div>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
					</div>
					<!-- /.ow_sub_menu_list -->
				</div>
				<!-- /.ow_sub_menu_mid -->
				<div class="ow_sub_menu_btm ow_tac">
					<img class="ow_vat" src="img/pc/entry/sub_menu_btm.jpg" alt="">
				</div>
			</div>
			<!-- /.ow_sub_menu -->
			<div class="ow_entry_teach ow_tac">
				<img src="img/pc/top/ow_entry_teach.png" alt="算命学では生年月日を元に運命を算出致します。まずはあなたのことを教えてください。" title="算命学では生年月日を元に運命を算出致します。まずはあなたのことを教えてください。">
			</div>
			<div class="ow_entry_form">
				<form id="astrology_form" name="astrology_form" method="post" action="">
				<input type="hidden" name="nc" id="nc_flag" value="<?php echo $this->_tpl_vars['contents_data']['nc_flag']; ?>
">
				<input type="hidden" name="menu_id" value="<?php echo $this->_tpl_vars['contents_data']['id']; ?>
">
				<input type="hidden" name="nif_menukey" value="mokuren_<?php echo $this->_tpl_vars['contents_data']['id']; ?>
">
				<input type="text" style="display:none;">
					<div class="ow_my_form" id="my_form">
						<div class="ow_my_form_top ow_tac">
							<img class="ow_vab" src="img/pc/entry/my_form_top.jpg" alt="あなたについて" title="あなたについて">
						</div>
						<div class="ow_entry_form_mid ow_my_form_mid">
							<div class="ow_form_body">
								<div class="ow_entry_form_item">
									<div class="ow_entry_name">
										<img src="img/pc/top/entry_name.png" alt="お名前" title="お名前">
									</div>
									<div class="ow_entry_form_input_wrap">
										<input class="ow_entry_form_input" type="text" name="name1" id="name1" value="">
									</div>
								</div><!-- /.ow_entry_form_item -->

								<div class="ow_entry_form_item">
									<div class="ow_entry_date">
										<img src="img/pc/top/entry_date.png" alt="生年月日" title="生年月日">
									</div>

									<!-- ▽▽▽PC用 生年月日入力▽▽▽ -->
											<div class="ow_entry_form_select_wrap ow_pc_block">
												<div class="ow_select ow_select_year">
													<select class="ow_entry_form_select" onchange="setDay(this.form.yy1,this.form.mm1,this.form.dd1);" id="yy1" name="yy1">
														<?php unset($this->_sections['year']);
$this->_sections['year']['name'] = 'year';
$this->_sections['year']['start'] = (int)1925;
$this->_sections['year']['loop'] = is_array($_loop=2020) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['year']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['year']['show'] = true;
$this->_sections['year']['max'] = $this->_sections['year']['loop'];
if ($this->_sections['year']['start'] < 0)
    $this->_sections['year']['start'] = max($this->_sections['year']['step'] > 0 ? 0 : -1, $this->_sections['year']['loop'] + $this->_sections['year']['start']);
else
    $this->_sections['year']['start'] = min($this->_sections['year']['start'], $this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] : $this->_sections['year']['loop']-1);
if ($this->_sections['year']['show']) {
    $this->_sections['year']['total'] = min(ceil(($this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] - $this->_sections['year']['start'] : $this->_sections['year']['start']+1)/abs($this->_sections['year']['step'])), $this->_sections['year']['max']);
    if ($this->_sections['year']['total'] == 0)
        $this->_sections['year']['show'] = false;
} else
    $this->_sections['year']['total'] = 0;
if ($this->_sections['year']['show']):

            for ($this->_sections['year']['index'] = $this->_sections['year']['start'], $this->_sections['year']['iteration'] = 1;
                 $this->_sections['year']['iteration'] <= $this->_sections['year']['total'];
                 $this->_sections['year']['index'] += $this->_sections['year']['step'], $this->_sections['year']['iteration']++):
$this->_sections['year']['rownum'] = $this->_sections['year']['iteration'];
$this->_sections['year']['index_prev'] = $this->_sections['year']['index'] - $this->_sections['year']['step'];
$this->_sections['year']['index_next'] = $this->_sections['year']['index'] + $this->_sections['year']['step'];
$this->_sections['year']['first']      = ($this->_sections['year']['iteration'] == 1);
$this->_sections['year']['last']       = ($this->_sections['year']['iteration'] == $this->_sections['year']['total']);
?>
														<?php if ($this->_sections['year']['index'] == 1985): ?>
														<option value="-1" selected>----</option>
														<?php endif; ?>
														<option value="<?php echo $this->_sections['year']['index']; ?>
">
															<?php echo $this->_sections['year']['index']; ?>
年
														</option>
														<?php endfor; endif; ?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_month">
													<select class="ow_entry_form_select ow_entry_form_select_month" onchange="setDay(this.form.yy1,this.form.mm1,this.form.dd1);" id="mm1" name="mm1">
														<option value="-1">--</option>
														<?php unset($this->_sections['mon']);
$this->_sections['mon']['name'] = 'mon';
$this->_sections['mon']['start'] = (int)1;
$this->_sections['mon']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mon']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['mon']['show'] = true;
$this->_sections['mon']['max'] = $this->_sections['mon']['loop'];
if ($this->_sections['mon']['start'] < 0)
    $this->_sections['mon']['start'] = max($this->_sections['mon']['step'] > 0 ? 0 : -1, $this->_sections['mon']['loop'] + $this->_sections['mon']['start']);
else
    $this->_sections['mon']['start'] = min($this->_sections['mon']['start'], $this->_sections['mon']['step'] > 0 ? $this->_sections['mon']['loop'] : $this->_sections['mon']['loop']-1);
if ($this->_sections['mon']['show']) {
    $this->_sections['mon']['total'] = min(ceil(($this->_sections['mon']['step'] > 0 ? $this->_sections['mon']['loop'] - $this->_sections['mon']['start'] : $this->_sections['mon']['start']+1)/abs($this->_sections['mon']['step'])), $this->_sections['mon']['max']);
    if ($this->_sections['mon']['total'] == 0)
        $this->_sections['mon']['show'] = false;
} else
    $this->_sections['mon']['total'] = 0;
if ($this->_sections['mon']['show']):

            for ($this->_sections['mon']['index'] = $this->_sections['mon']['start'], $this->_sections['mon']['iteration'] = 1;
                 $this->_sections['mon']['iteration'] <= $this->_sections['mon']['total'];
                 $this->_sections['mon']['index'] += $this->_sections['mon']['step'], $this->_sections['mon']['iteration']++):
$this->_sections['mon']['rownum'] = $this->_sections['mon']['iteration'];
$this->_sections['mon']['index_prev'] = $this->_sections['mon']['index'] - $this->_sections['mon']['step'];
$this->_sections['mon']['index_next'] = $this->_sections['mon']['index'] + $this->_sections['mon']['step'];
$this->_sections['mon']['first']      = ($this->_sections['mon']['iteration'] == 1);
$this->_sections['mon']['last']       = ($this->_sections['mon']['iteration'] == $this->_sections['mon']['total']);
?>
														<option value="<?php echo ((is_array($_tmp=$this->_sections['mon']['index'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
">
															<?php echo $this->_sections['mon']['index']; ?>
月
														</option>
														<?php endfor; endif; ?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_day">
													<select class="ow_entry_form_select ow_entry_form_select_day" id="dd1" name="dd1">
														<option value="-1">--</option>
														<?php unset($this->_sections['day']);
$this->_sections['day']['name'] = 'day';
$this->_sections['day']['start'] = (int)1;
$this->_sections['day']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['day']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['day']['show'] = true;
$this->_sections['day']['max'] = $this->_sections['day']['loop'];
if ($this->_sections['day']['start'] < 0)
    $this->_sections['day']['start'] = max($this->_sections['day']['step'] > 0 ? 0 : -1, $this->_sections['day']['loop'] + $this->_sections['day']['start']);
else
    $this->_sections['day']['start'] = min($this->_sections['day']['start'], $this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] : $this->_sections['day']['loop']-1);
if ($this->_sections['day']['show']) {
    $this->_sections['day']['total'] = min(ceil(($this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] - $this->_sections['day']['start'] : $this->_sections['day']['start']+1)/abs($this->_sections['day']['step'])), $this->_sections['day']['max']);
    if ($this->_sections['day']['total'] == 0)
        $this->_sections['day']['show'] = false;
} else
    $this->_sections['day']['total'] = 0;
if ($this->_sections['day']['show']):

            for ($this->_sections['day']['index'] = $this->_sections['day']['start'], $this->_sections['day']['iteration'] = 1;
                 $this->_sections['day']['iteration'] <= $this->_sections['day']['total'];
                 $this->_sections['day']['index'] += $this->_sections['day']['step'], $this->_sections['day']['iteration']++):
$this->_sections['day']['rownum'] = $this->_sections['day']['iteration'];
$this->_sections['day']['index_prev'] = $this->_sections['day']['index'] - $this->_sections['day']['step'];
$this->_sections['day']['index_next'] = $this->_sections['day']['index'] + $this->_sections['day']['step'];
$this->_sections['day']['first']      = ($this->_sections['day']['iteration'] == 1);
$this->_sections['day']['last']       = ($this->_sections['day']['iteration'] == $this->_sections['day']['total']);
?>
														<option value="<?php echo ((is_array($_tmp=$this->_sections['day']['index'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
">
															<?php echo $this->_sections['day']['index']; ?>
日
														</option>
														<?php endfor; endif; ?>
													</select>
												</div>
												<!-- /.ow_select -->
											</div>
										</div>
								<div class="ow_entry_form_item">
									<div class="ow_entry_seibetu">
										<img src="img/pc/top/entry_seibetu.png" alt="性別" title="性別">
									</div>
	<?php if ($this->_tpl_vars['contents_data']['sex_flag'] == 2): ?>
									<div class="ow_entry_form_radio_wrap">
										<div class="sex_caution">このメニューは女性限定です。</div>
										<input type="radio" name="sex1" id="sex11" value="1" style="visibility:hidden">
										<input type="radio" name="sex1" id="sex12" value="2" checked="checked" style="visibility:hidden">
									</div>
	<?php else: ?>
										<div class="ow_entry_form_radio_wrap">
											<label><input type="radio" name="sex1" id="sex12" value="2" checked="checked" class="js-sexAutoChange1"><span class="ow_radiotxt female">女性で占う</span></label><label><input type="radio" name="sex1" id="sex11" value="1"  class="js-sexAutoChange1"><span class="ow_radiotxt male">男性で占う</span></label>
										</div>
	<?php endif; ?>
									</div><!-- /.ow_entry_form_item -->
								</div>
							</div>
							<!-- /.ow_entry_form_mid -->
							<div class="ow_form_btm ow_tac">
								<img class="ow_vat" src="img/pc/entry/my_form_btm.jpg" alt="">
							</div>
						</div>
						<!-- /.ow_my_form -->
	<?php if ($this->_tpl_vars['contents_data']['target_count'] == 2): ?>
						<div class="ow_target_form">
							<div class="ow_target_form_top ow_tac">
								<img class="ow_vab" src="img/pc/entry/target_form_top.jpg" alt="あの人について" title="あの人について">
							</div>
							<div class="ow_entry_form_mid ow_target_form_mid">
								<div class="ow_form_body">
										<div class="ow_entry_form_item">
											<div class="ow_entry_name">
												<img src="img/pc/top/entry_name.png" alt="お名前" title="お名前">
											</div>
											<div class="ow_entry_form_input_wrap">
												<input class="ow_entry_form_input" type="text" name="name2" id="name2" value="">
											</div>
										</div><!-- /.ow_entry_form_item -->

										<div class="ow_entry_form_item">
											<div class="ow_entry_date">
												<img src="img/pc/top/entry_date.png" alt="生年月日" title="生年月日">
											</div>

											<div class="ow_entry_form_select_wrap ow_pc_block">
												<div class="ow_select ow_select_year">
													<select class="ow_entry_form_select ow_entry_form_select_wide" onchange="setDay(this.form.yy2,this.form.mm2,this.form.dd2);" id="yy2" name="yy2">
														<?php unset($this->_sections['year']);
$this->_sections['year']['name'] = 'year';
$this->_sections['year']['start'] = (int)1925;
$this->_sections['year']['loop'] = is_array($_loop=2020) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['year']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['year']['show'] = true;
$this->_sections['year']['max'] = $this->_sections['year']['loop'];
if ($this->_sections['year']['start'] < 0)
    $this->_sections['year']['start'] = max($this->_sections['year']['step'] > 0 ? 0 : -1, $this->_sections['year']['loop'] + $this->_sections['year']['start']);
else
    $this->_sections['year']['start'] = min($this->_sections['year']['start'], $this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] : $this->_sections['year']['loop']-1);
if ($this->_sections['year']['show']) {
    $this->_sections['year']['total'] = min(ceil(($this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] - $this->_sections['year']['start'] : $this->_sections['year']['start']+1)/abs($this->_sections['year']['step'])), $this->_sections['year']['max']);
    if ($this->_sections['year']['total'] == 0)
        $this->_sections['year']['show'] = false;
} else
    $this->_sections['year']['total'] = 0;
if ($this->_sections['year']['show']):

            for ($this->_sections['year']['index'] = $this->_sections['year']['start'], $this->_sections['year']['iteration'] = 1;
                 $this->_sections['year']['iteration'] <= $this->_sections['year']['total'];
                 $this->_sections['year']['index'] += $this->_sections['year']['step'], $this->_sections['year']['iteration']++):
$this->_sections['year']['rownum'] = $this->_sections['year']['iteration'];
$this->_sections['year']['index_prev'] = $this->_sections['year']['index'] - $this->_sections['year']['step'];
$this->_sections['year']['index_next'] = $this->_sections['year']['index'] + $this->_sections['year']['step'];
$this->_sections['year']['first']      = ($this->_sections['year']['iteration'] == 1);
$this->_sections['year']['last']       = ($this->_sections['year']['iteration'] == $this->_sections['year']['total']);
?>
														<?php if ($this->_sections['year']['index'] == 1985): ?>
														<option value="-1" selected>----</option>
														<?php endif; ?>
														<option value="<?php echo $this->_sections['year']['index']; ?>
">
															<?php echo $this->_sections['year']['index']; ?>
年
														</option>
														<?php endfor; endif; ?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_month">
													<select class="ow_entry_form_select" onchange="setDay(this.form.yy2,this.form.mm2,this.form.dd2);" id="mm2" name="mm2">
														<option value="-1">--</option>
														<?php unset($this->_sections['mon']);
$this->_sections['mon']['name'] = 'mon';
$this->_sections['mon']['start'] = (int)1;
$this->_sections['mon']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mon']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['mon']['show'] = true;
$this->_sections['mon']['max'] = $this->_sections['mon']['loop'];
if ($this->_sections['mon']['start'] < 0)
    $this->_sections['mon']['start'] = max($this->_sections['mon']['step'] > 0 ? 0 : -1, $this->_sections['mon']['loop'] + $this->_sections['mon']['start']);
else
    $this->_sections['mon']['start'] = min($this->_sections['mon']['start'], $this->_sections['mon']['step'] > 0 ? $this->_sections['mon']['loop'] : $this->_sections['mon']['loop']-1);
if ($this->_sections['mon']['show']) {
    $this->_sections['mon']['total'] = min(ceil(($this->_sections['mon']['step'] > 0 ? $this->_sections['mon']['loop'] - $this->_sections['mon']['start'] : $this->_sections['mon']['start']+1)/abs($this->_sections['mon']['step'])), $this->_sections['mon']['max']);
    if ($this->_sections['mon']['total'] == 0)
        $this->_sections['mon']['show'] = false;
} else
    $this->_sections['mon']['total'] = 0;
if ($this->_sections['mon']['show']):

            for ($this->_sections['mon']['index'] = $this->_sections['mon']['start'], $this->_sections['mon']['iteration'] = 1;
                 $this->_sections['mon']['iteration'] <= $this->_sections['mon']['total'];
                 $this->_sections['mon']['index'] += $this->_sections['mon']['step'], $this->_sections['mon']['iteration']++):
$this->_sections['mon']['rownum'] = $this->_sections['mon']['iteration'];
$this->_sections['mon']['index_prev'] = $this->_sections['mon']['index'] - $this->_sections['mon']['step'];
$this->_sections['mon']['index_next'] = $this->_sections['mon']['index'] + $this->_sections['mon']['step'];
$this->_sections['mon']['first']      = ($this->_sections['mon']['iteration'] == 1);
$this->_sections['mon']['last']       = ($this->_sections['mon']['iteration'] == $this->_sections['mon']['total']);
?>
														<option value="<?php echo ((is_array($_tmp=$this->_sections['mon']['index'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
">
															<?php echo $this->_sections['mon']['index']; ?>
月
														</option>
														<?php endfor; endif; ?>
													</select>
												</div>
												<!-- /.ow_select -->
												<div class="ow_select ow_select_day">
													<select class="ow_entry_form_select" id="dd2" name="dd2">
														<option value="-1">--</option>
														<?php unset($this->_sections['day']);
$this->_sections['day']['name'] = 'day';
$this->_sections['day']['start'] = (int)1;
$this->_sections['day']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['day']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['day']['show'] = true;
$this->_sections['day']['max'] = $this->_sections['day']['loop'];
if ($this->_sections['day']['start'] < 0)
    $this->_sections['day']['start'] = max($this->_sections['day']['step'] > 0 ? 0 : -1, $this->_sections['day']['loop'] + $this->_sections['day']['start']);
else
    $this->_sections['day']['start'] = min($this->_sections['day']['start'], $this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] : $this->_sections['day']['loop']-1);
if ($this->_sections['day']['show']) {
    $this->_sections['day']['total'] = min(ceil(($this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] - $this->_sections['day']['start'] : $this->_sections['day']['start']+1)/abs($this->_sections['day']['step'])), $this->_sections['day']['max']);
    if ($this->_sections['day']['total'] == 0)
        $this->_sections['day']['show'] = false;
} else
    $this->_sections['day']['total'] = 0;
if ($this->_sections['day']['show']):

            for ($this->_sections['day']['index'] = $this->_sections['day']['start'], $this->_sections['day']['iteration'] = 1;
                 $this->_sections['day']['iteration'] <= $this->_sections['day']['total'];
                 $this->_sections['day']['index'] += $this->_sections['day']['step'], $this->_sections['day']['iteration']++):
$this->_sections['day']['rownum'] = $this->_sections['day']['iteration'];
$this->_sections['day']['index_prev'] = $this->_sections['day']['index'] - $this->_sections['day']['step'];
$this->_sections['day']['index_next'] = $this->_sections['day']['index'] + $this->_sections['day']['step'];
$this->_sections['day']['first']      = ($this->_sections['day']['iteration'] == 1);
$this->_sections['day']['last']       = ($this->_sections['day']['iteration'] == $this->_sections['day']['total']);
?>
														<option value="<?php echo ((is_array($_tmp=$this->_sections['day']['index'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
">
															<?php echo $this->_sections['day']['index']; ?>
日
														</option>
														<?php endfor; endif; ?>
													</select>
												</div>
												<!-- /.ow_select -->
											</div>
										</div>

										<div class="ow_entry_form_item">
											<div class="ow_entry_seibetu">
												<img src="img/pc/top/entry_seibetu.png" alt="性別" title="性別">
											</div>
	<?php if ($this->_tpl_vars['contents_data']['sex_flag'] == 2): ?>
											<div class="ow_entry_form_radio_wrap">
												<div class="sex_caution">お相手は男性が自動的に選ばれます</div>
												<input type="radio" name="sex2" id="sex21" value="1" checked="checked" style="visibility:hidden">
												<input type="radio" name="sex2" id="sex22" value="2" style="visibility:hidden">
											</div>
	<?php else: ?>

											<div class="ow_entry_form_radio_wrap">
												<label><input type="radio" name="sex2" id="sex22" value="2" checked="checked" class="js-sexAutoChange2"><span class="ow_radiotxt female">女性で占う</span></label><label><input type="radio" name="sex2" id="sex21" value="1" class="js-sexAutoChange2"><span class="ow_radiotxt male">男性で占う</span></label>
											</div>
	<?php endif; ?>
										</div><!-- /.ow_entry_form_item -->


									</div>
									<!-- /.ow_form_body -->
								</div>
								<!-- /.ow_entry_form_mid -->
								<div class="ow_form_btm ow_tac">
									<img class="ow_vat" src="img/pc/entry/target_form_btm.jpg" alt="">
								</div>
							</div>
							<!-- /.ow_target_form -->
	<?php endif; ?>
							<div class="ow_entry_form_mid">
								<div class="ow_entry_form_save">
									※今回入力した情報を記録しますか？　<br>
									<label><input type="checkbox" style="margin-right: 3px; vertical-align:middle;" name="default_check" value="1" id="default_check">記録する</label>
								</div>

	<?php if ($this->_tpl_vars['contents_data']['price_notax'] > 1): ?>
								<div class="ow_entry_form_btn_wrap">
									<!-- ▼▼▼一部無料ボタン▼▼▼ -->
									<div class="ow_entry_form_btn ow_tac">
										<a class="ow_entry_form_nc" href="javascript:gtag_submit('nc','<?php echo @GTAG_KEY; ?>
<?php echo $this->_tpl_vars['contents_data']['id']; ?>
');form_submit(1,<?php echo $this->_tpl_vars['contents_data']['target_count']; ?>
,'astrology_form')">
											<img src="img/pc/entry/btn_nc.png" alt="一部無料で鑑定する" title="一部無料で鑑定する">
										</a>
									</div>
									<div class="ow_entry_form_btn_text">
										次の鑑定結果ページの一部を<br>
										無料でご覧いただけます
									</div>
									<!-- ▲▲▲一部無料ボタン▲▲▲ -->
								</div>
								<div class="ow_entry_form_btn_wrap">
									<!-- ▼▼▼有料ボタン▼▼▼ -->
									<div class="ow_entry_form_btn ow_tac">
										<a class="ow_entry_form_submit" href="javascript:gtag_submit('result','<?php echo @GTAG_KEY; ?>
<?php echo $this->_tpl_vars['contents_data']['id']; ?>
');form_submit(0,<?php echo $this->_tpl_vars['contents_data']['target_count']; ?>
,'astrology_form')">
											<img src="img/pc/entry/btn_submit.png" alt="有料で鑑定する" title="有料で鑑定する">
										</a>
									</div>
									<!-- ▲▲▲有料ボタン▲▲▲ -->
								</div>

								<div class="ow_entry_form_btn_text ow_entry_form_btn_text_border">
									こちらのメニューのご利用には
									<div class="ow_premium_price ow_nif">
										プレミアム価格　<?php echo ((is_array($_tmp=$this->_tpl_vars['contents_data']['price_off10'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>

									</div>
									<div class="ow_default_price">
										<span class="ow_nif">通常価格　</span><span class="ow_red"><?php echo ((is_array($_tmp=$this->_tpl_vars['contents_data']['price_taxin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>
</span>
									</div>
									が必要です。
								</div>

								<div class="ow_entry_form_btn_text ow_entry_form_btn_text_2">
									ご利用前には、メニュー内容のご確認をお願いいたします。<br>
									ご購入されるとサービス・コンテンツの利用料金が<br>
									発生いたします。
								</div>
	<?php else: ?>
								<div class="ow_entry_form_btn_wrap">
									<div class="ow_entry_form_btn">
										<a class="ow_entry_form_free" href="javascript:form_submit(2,<?php echo $this->_tpl_vars['contents_data']['target_count']; ?>
,'astrology_form')">
											<img src="img/pc/entry/btn_free.png" alt="無料で鑑定する" title="無料で鑑定する">
										</a>
									</div>
									<div class="ow_entry_form_btn_text">
										次のページは無料でご利用いただけます。<br>
										※鑑定結果の一部を無料でご覧になれます。
									</div>
								</div>
	<?php endif; ?>
								<div class="ow_policy">
									<div class="ow_policy_inner">
										株式会社アウトワードは、ご入力いただいた情報を、<br>
										占いサービスを提供するためにのみ使用し,<br>
										情報の蓄積を行ったり、他の目的で使用することはありません。<br>
										ご利用の際は、当社「<a href="privacy.html">個人情報の取り扱いについて</a>」に同意の上、必要事項をご入力ください。
									</div>
								</div>
								<!-- /.ow_policy -->

							</div>
						</form>
					</div>
					<!-- /.ow_entry_form -->

				</div>
				<!-- /.ow_entry -->
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