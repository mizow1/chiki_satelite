<?php
/* Smarty version 4.1.1, created on 2024-01-04 16:57:22
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/base.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_659664e2baa042_04167804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1eeeab09bf31bc14e0f3546347bea9725b9b1771' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/base.html',
      1 => 1702617127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659664e2baa042_04167804 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- ▽▽▽結果 基本性格▽▽▽ -->
<!-- BASE -->
<?php if ($_smarty_tpl->tpl_vars['contents_data']->value['target_count'] == 1) {?>
<div class="ow_base ow_base_1">
	<div class="ow_base_main ow_tac">
		<div class="ow_anata">
			<div class="ow_anata_bg ow_tac">
				<img src="img/pc/result/anata_date.png" alt="あなた" title="あなた">
			</div>
			<div class="ow_base_date ow_anata_item">
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['yy1'];?>
年<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['mm1'];?>
月<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['dd1'];?>
日
			</div>
			<div class="ow_base_seibetu ow_anata_item">
					<?php if ($_smarty_tpl->tpl_vars['base_data']->value['entry_data']['sex1'] == 1) {?>男性
					<?php } else { ?>女性
					<?php }?>
			</div>
		</div>
		<div class="ow_result_body_top ow_tac"><img class="ow_vab" src="img/pc/result/result_body_top_kansi.jpg" alt="" title="冬月式　真実と運命を見抜く―　運命干支算術" title="冬月式　真実と運命を見抜く―　運命干支算術"></div>
		<div class="ow_base_jutu">
			<div class="ow_jutu_text">
				<img class="ow_vat" src="img/pc/result/kansi_text.png" alt="出生日から干支を割り出します60種類の、干支図の組み合わせで詳しい本質が視えてきます。" title="出生日から干支を割り出します60種類の、干支図の組み合わせで詳しい本質が視えてきます。">
			</div>
			<div class="ow_jutu_result">
				<div class="ow_jutu_graph ow_tac">
					<img class="ow_vat" src="img/pc/result/base/jutu_graph.png" alt="">
				</div>
				<!-- ow_nisshi -->
				<div class="ow_jutu_nisshi ow_base_jutu_item">
					<img src="img/pc/result/nisshi/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_time_num_dd'];?>
.png" alt="">
				</div>
				<!-- ow_nesshi -->
				<div class="ow_jutu_gesshi ow_base_jutu_item">
					<img src="img/pc/result/gesshi/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_time_num_mm'];?>
.png" alt="">
				</div>
				<!-- ow_nesshi -->
				<div class="ow_jutu_nesshi ow_jutu_result_item ow_base_jutu_<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_etonum_yy'];?>
">
					<img src="img/pc/result/nenshi/1.png" alt="">
				</div>
			</div>
		</div>
		<div class="ow_result_body_btm ow_tac"><img class="ow_vat" src="img/pc/result/result_body_btm_kansi.jpg" alt=""></div>

		<!-- ▼▼▼十二支パート▼▼▼ -->
		<div class="ow_result_item ow_jixtukan">
			<div class="ow_base_result">
				<div class="ow_base_result_top ow_tac"><img class="ow_vab" src="img/pc/result/base_result/base_result_top_anata.jpg" alt="あなたを表す十二支" title="あなたを表す十二支"></div>
				<div class="ow_base_result_mid">
					<div class="ow_zodiac">
						<div class="ow_zodiac_bg ow_tac"><img src="img/pc/result/base_result/base_result_zodiac.png" alt=""></div>
						<div class="ow_zodiac_nisshi ow_zodiac_item"><img src="img/pc/result/base_result/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_time_num_dd'];?>
.png" alt=""></div>
						<div class="ow_zodiac_gesshi ow_zodiac_item"><img src="img/pc/result/base_result/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_time_num_mm'];?>
.png" alt=""></div>
						<div class="ow_zodiac_nenshi ow_zodiac_item"><img src="img/pc/result/base_result/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_time_num_yy'];?>
.png" alt=""></div>
						<div class="ow_zodiac_shadow_1 ow_zodiac_item"><img src="img/pc/result/base_result/shadow.png" alt=""></div>
						<div class="ow_zodiac_shadow_2 ow_zodiac_item"><img src="img/pc/result/base_result/shadow.png" alt=""></div>
						<div class="ow_zodiac_shadow_3 ow_zodiac_item"><img src="img/pc/result/base_result/shadow.png" alt=""></div>
					</div>
					<!-- /.ow_zodiac -->
					<div class="ow_show">
						<div class="ow_show_title">
							<img src="img/pc/result/show/anata/show_title.png" alt="外向きのあなたと本来の姿" title="外向きのあなたと本来の姿">
						</div>
						<div class="ow_show_bg">
							<img src="img/pc/result/show/show_bg.png" alt="">
						</div>
						<div class="ow_show_human ow_show_item">
							<img src="img/pc/result/show/human.png" alt="">
						</div>
						<div class="ow_show_heart ow_show_item">
							<img src="img/pc/result/show/anata/heart.png" alt="あなたの核(心)にある姿" title="あなたの核(心)にある姿">
						</div>
						<div class="ow_show_heart_text ow_show_item">
							<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null))) {?>
								<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_base_text_mm'];?>

							<?php } else { ?>
								<img src="img/pc/result/show/blur_2.png" alt="">
							<?php }?>
						</div>
						<div class="ow_show_work ow_show_item">
							<img src="img/pc/result/show/anata/work.png" alt="社会(仕事・学校)でのあなたの姿" title="社会(仕事・学校)でのあなたの姿">
						</div>
						<div class="ow_show_work_text ow_show_item">
							<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_base_text_yy'];?>

						</div>

						<div class="ow_show_originally ow_show_item">
							<img src="img/pc/result/show/anata/originally.png" alt="本来のあなたに一番近い姿" title="本来のあなたに一番近い姿">
						</div>
						<div class="ow_show_originally_text ow_show_item">
							<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null))) {?>
								<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['my_base_text_yy'];?>

							<?php } else { ?>
								<img src="img/pc/result/show/blur_2.png" alt="">
							<?php }?>
						</div>
					</div>
					<!-- /.ow_show -->
				</div>
			</div>
		</div>
		<div class="ow_jixtukan_show">
			<div class="ow_jixtukan_show_confetti">
				<img src="img/pc/result/jixtukan_show_confetti.png" alt="">
			</div>
			<div class="ow_jixtukan_show_text ow_jixtukan_show_item">
				<img src="img/pc/result/anata_text.png" alt="日はあなた自身を表し月はあなたの精神や核を示し年はあなたの周囲の環境を表します。自分は日々変わっていきますが、日の積み重ねが月となり、それが年に変わっていくのです。" title="日はあなた自身を表し月はあなたの精神や核を示し年はあなたの周囲の環境を表します。自分は日々変わっていきますが、日の積み重ねが月となり、それが年に変わっていくのです。">
			</div>
		</div>
	</div>
	<!-- /.ow_base_main -->
</div>
<!-- /.ow_base -->
<?php } else { ?>
<div class="ow_base ow_base_2">
	<div class="ow_base_main ow_tac">
		<div class="ow_anohito">
			<div class="ow_anohito_bg ow_tac">
				<img src="img/pc/result/anohito_date.png" alt="あなた　あの人" title="あなた　あの人">
			</div>
			<div class="ow_base_date_anata ow_anohito_item">
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['yy1'];?>
年<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['mm1'];?>
月<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['dd1'];?>
日
			</div>
			<div class="ow_base_seibetu_anata ow_anohito_item">
					<?php if ($_smarty_tpl->tpl_vars['base_data']->value['entry_data']['sex1'] == 1) {?>男性
					<?php } else { ?>女性
					<?php }?>
			</div>
			<div class="ow_base_date_anohito ow_anohito_item">
				<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['yy2'];?>
年<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['mm2'];?>
月<?php echo $_smarty_tpl->tpl_vars['base_data']->value['entry_data']['dd2'];?>
日
			</div>
			<div class="ow_base_seibetu_anohito ow_anohito_item">
					<?php if ($_smarty_tpl->tpl_vars['base_data']->value['entry_data']['sex2'] == 1) {?>男性
					<?php } else { ?>女性
					<?php }?>
			</div>
		</div>
		<div class="ow_result_body_top ow_tac"><img class="ow_vab" src="img/pc/result/result_body_top_kansi.jpg" alt="" title="冬月式　真実と運命を見抜く―　運命干支算術" title="冬月式　真実と運命を見抜く―　運命干支算術"></div>
		<div class="ow_base_jutu">
			<div class="ow_jutu_text">
				<img class="ow_vat" src="img/pc/result/kansi_text.png" alt="出生日から干支を割り出します60種類の、干支図の組み合わせで詳しい本質が視えてきます。" title="出生日から干支を割り出します60種類の、干支図の組み合わせで詳しい本質が視えてきます。">
			</div>
			<div class="ow_jutu_result">
				<div class="ow_jutu_graph ow_tac">
					<img class="ow_vat" src="img/pc/result/base/jutu_graph.png" alt="">
				</div>
				<!-- ow_nisshi -->
				<div class="ow_jutu_nisshi ow_base_jutu_item">
					<img src="img/pc/result/nisshi/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_time_num_dd'];?>
.png" alt="">
				</div>
				<!-- ow_nesshi -->
				<div class="ow_jutu_gesshi ow_base_jutu_item">
					<img src="img/pc/result/gesshi/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_time_num_mm'];?>
.png" alt="">
				</div>
				<!-- ow_nesshi -->
				<div class="ow_jutu_nesshi ow_jutu_result_item ow_base_jutu_<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_etonum_yy'];?>
">
					<img src="img/pc/result/nenshi/1.png" alt="">
				</div>
			</div>
		</div>
		<div class="ow_result_body_btm ow_tac"><img class="ow_vat" src="img/pc/result/result_body_btm_kansi.jpg" alt=""></div>

		<!-- ▼▼▼十二支パート▼▼▼ -->
		<div class="ow_result_item ow_jixtukan">
			<div class="ow_base_result">
				<div class="ow_base_result_top ow_tac"><img class="ow_vab" src="img/pc/result/base_result/base_result_top_anohito.png" alt="あの人を表す十二支" title="あの人を表す十二支">
				</div>
				<div class="ow_base_result_mid">
						<div class="ow_zodiac">
							<div class="ow_zodiac_bg ow_tac"><img src="img/pc/result/base_result/base_result_zodiac.png" alt=""></div>
							<div class="ow_zodiac_nisshi ow_zodiac_item"><img src="img/pc/result/base_result/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_time_num_dd'];?>
.png" alt=""></div>
							<div class="ow_zodiac_gesshi ow_zodiac_item"><img src="img/pc/result/base_result/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_time_num_mm'];?>
.png" alt=""></div>
							<div class="ow_zodiac_nenshi ow_zodiac_item"><img src="img/pc/result/base_result/<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_time_num_yy'];?>
.png" alt=""></div>
							<div class="ow_zodiac_shadow_1 ow_zodiac_item"><img src="img/pc/result/base_result/shadow.png" alt=""></div>
							<div class="ow_zodiac_shadow_2 ow_zodiac_item"><img src="img/pc/result/base_result/shadow.png" alt=""></div>
							<div class="ow_zodiac_shadow_3 ow_zodiac_item"><img src="img/pc/result/base_result/shadow.png" alt=""></div>
						</div>
						<!-- /.ow_zodiac -->
						<div class="ow_show">
							<div class="ow_show_title">
								<img src="img/pc/result/show/anohito/show_title.png" alt="外向きのあの人と本来の姿" title="外向きのあの人と本来の姿">
							</div>
							<div class="ow_show_bg">
								<img src="img/pc/result/show/show_bg.png" alt="">
							</div>
							<div class="ow_show_human ow_show_item">
								<img src="img/pc/result/show/human.png" alt="">
							</div>
							<div class="ow_show_heart ow_show_item">
								<img src="img/pc/result/show/anohito/heart.png" alt="あの人の核(心)にある姿" title="あの人の核(心)にある姿">
							</div>
							<div class="ow_show_heart_text ow_show_item">
							<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null))) {?>
								<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_base_text_mm'];?>

							<?php } else { ?>
								<img src="img/pc/result/show/blur_1.png" alt="">
							<?php }?>
							</div>
							<div class="ow_show_work ow_show_item">
								<img src="img/pc/result/show/anohito/work.png" alt="社会(仕事・学校)でのあの人の姿" title="社会(仕事・学校)でのあの人の姿">
							</div>
							<div class="ow_show_work_text ow_show_item">
								<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_base_text_yy'];?>

							</div>
							<div class="ow_show_originally ow_show_item">
								<img src="img/pc/result/show/anohito/originally.png" alt="本来のあの人に一番近い姿" title="本来のあの人に一番近い姿">
							</div>
							<div class="ow_show_originally_text ow_show_item">
							<?php if (empty($_smarty_tpl->tpl_vars['menu_data']->value['pickup_flag']) && ($_smarty_tpl->tpl_vars['page_identify']->value == (defined('PAY') ? constant('PAY') : null))) {?>
								<?php echo $_smarty_tpl->tpl_vars['base_data']->value['base_list']['target_base_text_dd'];?>

							<?php } else { ?>
								<img src="img/pc/result/show/blur_2.png" alt="">
							<?php }?>
							</div>
						</div>
						<!-- /.ow_show -->
					</div>
			</div>
		</div>

		<div class="ow_jixtukan_show">
			<div class="ow_jixtukan_show_confetti">
				<img src="img/pc/result/jixtukan_show_confetti.png" alt="">
			</div>
			<div class="ow_jixtukan_show_text ow_jixtukan_show_item">
				<img src="img/pc/result/anohito_text.png" alt="日はあの人自身を表し月はあの人の精神や核を示し年はあの人の周囲の環境を表します。自分は日々変わっていきますが、日の積み重ねが月となり、それが年に変わっていくのです。" title="日はあなた自身を表し月はあなたの精神や核を示し年はあなたの周囲の環境を表します。自分は日々変わっていきますが、日の積み重ねが月となり、それが年に変わっていくのです。">
			</div>
		</div>
	</div>
	<!-- /.ow_base_main -->
</div>
<!-- /.ow_base -->
<?php }
}
}
