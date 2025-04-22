<?php
/* Smarty version 4.1.1, created on 2024-08-22 22:58:43
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/daily.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_66c7441391eae3_71054104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd22fa66054d1edcdc5cde0c216a8c5876023ec5e' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_smp/daily.html',
      1 => 1724215652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./parts/ga.html' => 1,
    'file:../../../../../common/header_isp.html' => 1,
    'file:./parts/header_menu.html' => 1,
    'file:./parts/footer_menu.html' => 1,
  ),
),false)) {
function content_66c7441391eae3_71054104 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/users/0/flier.jp-uranai/web/uranai/chiki/libs/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="ja" lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="viewport" content="width=device-width" />
	<title><?php if ('ISP' == 'nifty') {?>@nifty:<?php }?>今日の運勢◇当たる無料占い12星座ランキング｜<?php echo (defined('CONTENTS_NAME') ? constant('CONTENTS_NAME') : null);?>
</title>
	<link rel="stylesheet" href="css/smp/sp.css" type="text/css" />
	<link rel="stylesheet" href="css/font-awesome.css?ver4.5" type="text/css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery1.8.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/default_form_ie.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/date.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/jquery.tile.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/smp/profile.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/smp/pagetop.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/rakuten_logo.js"><?php echo '</script'; ?>
>
	<meta name="description" content="完全無料の星座占いで今日の運勢を占います。当たると評判の人気のラッキー星座占いランキングを毎日更新！今日の運勢ではあなたの星座（生年月日・誕生日）でわかる「恋愛運、出会い運、金運、仕事・勉強運、求職・転職運、対人運」を無料で占います。今日気を付けておくと良いことや、今日のラッキーファッション、運気が上がるラッキーアクション＆ラッキーカラーでチャンスをゲット！通勤中やリラックスタイムにぜひチェックしてみてください。">
	<?php $_smarty_tpl->_subTemplateRender("file:./parts/ga.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body class="ow_body">

<?php $_smarty_tpl->_subTemplateRender("file:../../../../../common/header_isp.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:./parts/header_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="ow_main">

		<div class="block block_fortune_ranking" id="fortune_rank_part">
			<div class="fortune_rank_head">
				<h2 class="fortune_rank_head_catch">
					<div class="fortune_rank_head_title">今日の運勢</div>
					<div class="fortune_rank_head_icon"><img src="//static-n.goodfortune.jp/files/img/horoscope/rank_icon_tomorrow.svg" alt="今日の運勢12星座ランキング"></div>
					<div class="fortune_rank_head_title">ランキング</div>
				</h2>
				<div class="fortune_rank_head_lead"><?php echo smarty_modifier_date_format(time(),'%Y');?>
年<?php echo smarty_modifier_date_format(time(),'%m');?>
月<?php echo smarty_modifier_date_format(time(),'%d');?>
日はどうなる？</div>
			</div>
			<ul class="tab">
				<li class="tab_btn active"><a href="">総合運</a></li>
				<li class="tab_btn tab_renaiun"><a href="https://www.goodfortune.jp/fortune/today/renai#fortune_rank_part">恋愛運</a></li>
				<li class="tab_btn tab_kinun"><a href="https://www.goodfortune.jp/fortune/today/kinun#fortune_rank_part">金運</a></li>
				<li class="tab_btn tab_shigotoun"><a href="https://www.goodfortune.jp/fortune/today/sigoto#fortune_rank_part">仕事運</a></li>
				<li class="tab_btn tab_taijinun"><a href="https://www.goodfortune.jp/fortune/today/taijin#fortune_rank_part">対人運</a></li>

			</ul>
			<div class="wrapper tab_panel_wrap">
				<div class="tab_panel tab_panel_show">
					<ul class="holoscope_rank">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['api_data']->value, 'data');
$_smarty_tpl->tpl_vars['data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->do_else = false;
?>
												<?php if ($_smarty_tpl->tpl_vars['data']->value['ranking'] <= 3) {?>
						<li class="holoscope_rank_item">
							<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/daily_detail?tgt=<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_e_name'];?>
">
								<div class="holoscope_rank_head">
									<div class="holoscope_rank_thm">
										<img src="//static-n.goodfortune.jp/files/img/horoscope/icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_e_name'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_name'];?>
座（<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_kana'];?>
座）の今日の運勢">
									</div>
									<div class="holoscope_rank_contents">
										<div class="holoscope_rank_info">
											<h3 class="holoscope_rank_name"><?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_name'];?>
座</h3>
											<div class="holoscope_rank_date"><?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_period'];?>
</div>
										</div>
										<ul class="holoscope_rank_lucky">
											<li>ラッキーナンバー ｜ <?php echo implode("または",$_smarty_tpl->tpl_vars['data']->value['lucky_number']);?>
</li>
											<li>ラッキーカラー<br><span style="color: <?php echo $_smarty_tpl->tpl_vars['data']->value['color_code'];?>
">●</span> <?php echo $_smarty_tpl->tpl_vars['data']->value['color_name'];?>
</li>
										</ul>
									</div>
								</div>
								<div class="holoscope_rank_foot">
									<div class="holoscope_rank_text">
									<?php echo $_smarty_tpl->tpl_vars['data']->value['sougou_body'];?>
<br>
									<span class="more"><?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_name'];?>
座の今日の運勢の詳細を見る</span>
									</div>
								</div>
							</a>
						</li><!-- /.holoscope_rank_item -->
						<?php } else { ?>
						<li class="holoscope_rank_item">
							<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/daily_detail?tgt=<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_e_name'];?>
">
								<div class="holoscope_rank_head">
									<div class="holoscope_rank_thm">
										<img src="//static-n.goodfortune.jp/files/img/horoscope/icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_e_name'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_name'];?>
座（<?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_kana'];?>
座）の今日の運勢">
									</div>
									<div class="holoscope_rank_contents">
										<div class="holoscope_rank_info">
											<h3 class="holoscope_rank_name"><?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_name'];?>
座</h3>
											<div class="holoscope_rank_date"><?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_period'];?>
</div>
										</div>
										<div class="holoscope_rank_text">
										<?php echo $_smarty_tpl->tpl_vars['data']->value['sougou_body'];?>
<br>
										<span class="more"><?php echo $_smarty_tpl->tpl_vars['data']->value['seiza_name'];?>
座の今日の運勢の詳細を見る</span>
										</div>
										<ul class="holoscope_rank_lucky">
											<li>ラッキーカラー <span style="color: <?php echo $_smarty_tpl->tpl_vars['data']->value['color_code'];?>
">●</span> <?php echo $_smarty_tpl->tpl_vars['data']->value['color_name'];?>
</li>
										</ul>
									</div>
								</div>
							</a>
						</li><!-- /.holoscope_rank_item -->
						<?php }?>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					</ul>
				</div>
				<ul class="link_button_wrap">
					<li class="link_button link_button_01"><a href="//www.goodfortune.jp/fortune/tomorrow">明日の運勢</a></li>
					<li class="link_button link_button_01"><a href="//www.goodfortune.jp/fortune/week">今週の運勢</a></li>
				</ul>

			</div>
			<!-- /.wrapper -->
		</div>
		<!-- /.block -->

	</div>
	<!-- /.ow_main -->

<?php $_smarty_tpl->_subTemplateRender("file:./parts/footer_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>
<?php }
}
