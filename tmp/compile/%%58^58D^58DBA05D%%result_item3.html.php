<?php /* Smarty version 2.6.18, created on 2023-12-13 19:25:22
         compiled from file:./parts/result_item3.html */ ?>
<?php if ($this->_tpl_vars['contents_data']['target_count'] == 1): ?>
<div class="ow_result_item ow_star">
	<div class="ow_result_item_top ow_tac">
		<img class="ow_vab" src="img/pc/result/result_item_top.jpg" alt=""/>
	</div>
	<div class="ow_result_item_mid">
		<div class="ow_result_title">
			<div class="ow_result_title_top ow_tac"><img class="ow_vab" src="img/pc/result/result_title_top.png" alt=""/></div>
			<div class="ow_result_title_mid"><?php echo $this->_tpl_vars['menu_data']['name']; ?>
</div>
			<div class="ow_result_title_btm ow_tac"><img class="ow_vat" src="img/pc/result/result_title_btm.png" alt=""/></div>
		</div>

		<div class="ow_area ow_tac">
		<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] ) && ( $this->_tpl_vars['page_identify'] == @PAY || $this->_tpl_vars['page_identify'] == @FREE )): ?>
			<div class="ow_star_figure">
				<div class="ow_star_bg">
					<img src="img/pc/result/star_bg.jpg" alt="十大主星/十二徒星★陽占図" title="十大主星/十二徒星★陽占図">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_2">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_2']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_3">
					<img src="img/pc/result/star/twelve/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_3']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_4">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_4']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_5">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_5']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_6">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_6']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_7">
					<img src="img/pc/result/star/twelve/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_7']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_8">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_8']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_9">
					<img src="img/pc/result/star/twelve/<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_9']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_hikari ow_star_figure_hikari_<?php echo $this->_tpl_vars['menu_data']['result_category']; ?>
">
					<img src="img/pc/result/star/star_figure_hikari.png" alt="">
				</div>
			</div>
	<?php $this->assign('star_num', $this->_tpl_vars['menu_data']['result_category']); ?>
			<div class="ow_star_figure_mid">
				<div class="ow_figure_result">
	<?php if ($this->_tpl_vars['star_num'] == 3 || $this->_tpl_vars['star_num'] == 7 || $this->_tpl_vars['star_num'] == 9): ?>
					<div class="ow_star_twelve ow_tac">
						<img src="img/pc/result/star/star_twelve.png" alt="あなたの十二大主星" title="あなたの十二大主星">
					</div>
	<?php else: ?>
					<div class="ow_star_ten ow_tac">
						<img src="img/pc/result/star/star_ten.png" alt="あなたの十大主星" title="あなたの十大主星">
					</div>
	<?php endif; ?>
					<div class="ow_area_item ow_figure_result_text">
						<?php echo $this->_tpl_vars['base_data']['base_list']['my_graph_text'][$this->_tpl_vars['star_num']]; ?>

					</div>
				</div>
			</div>
			<div class="ow_star_figure_btm ow_tac">
				<img class="ow_vat" src="img/pc/result/star/star_figure_btm.jpg" alt="" title="">
			</div>
		<?php else: ?>
			<img src="img/pc/nc/star_bg.png" alt="有料版ではあなたの十大主星と十二大従星がわかります" title="有料版ではあなたの十大主星と十二大従星がわかります">
		<?php endif; ?>

		</div>
		<!--/.ow_area-->
		<div class="ow_comment_text ow_tac">

		</div>
		<div class="ow_result_body_text">
		<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] ) && ( $this->_tpl_vars['page_identify'] == @PAY || $this->_tpl_vars['page_identify'] == @FREE )): ?>
			<?php echo $this->_tpl_vars['menu_data']['result']['body']; ?>

		<?php else: ?>
			<?php echo $this->_tpl_vars['menu_data']['result']['cut_body']; ?>
<br>
			<div class="ow_nc ow_nc_white">
				<a href="javascript:<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] )): ?>gtag_submit('result','<?php echo @GTAG_KEY; ?>
<?php echo $this->_tpl_vars['contents_data']['id']; ?>
');<?php endif; ?>nc_submit('astrology_form<?php echo $this->_tpl_vars['pickup_num']; ?>
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/pc/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

			</div>
		<?php endif; ?>
		</div>
	</div>
	<!-- /.ow_result_item_mid -->
	<div class="ow_result_item_btm ow_tac">
		<img class="ow_vat" src="img/pc/result/result_item_btm.jpg" alt=""/>
	</div>
</div>
<!-- /.ow_result_item -->
<?php else: ?>
<div class="ow_result_item ow_star">
	<div class="ow_result_item_top ow_tac">
		<img class="ow_vab" src="img/pc/result/result_item_top.jpg" alt=""/>
	</div>
	<div class="ow_result_item_mid">
		<div class="ow_result_title">
			<div class="ow_result_title_top ow_tac"><img class="ow_vab" src="img/pc/result/result_title_top.png" alt=""/></div>
			<div class="ow_result_title_mid"><?php echo $this->_tpl_vars['menu_data']['name']; ?>
</div>
			<div class="ow_result_title_btm ow_tac"><img class="ow_vat" src="img/pc/result/result_title_btm.png" alt=""/></div>
		</div>

		<div class="ow_area ow_tac">
		<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] ) && ( $this->_tpl_vars['page_identify'] == @PAY || $this->_tpl_vars['page_identify'] == @FREE )): ?>
			<div class="ow_star_figure">
				<div class="ow_star_bg">
					<img src="img/pc/result/star_bg.jpg" alt="十大主星/十二徒星★陽占図" title="十大主星/十二徒星★陽占図">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_2">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_2']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_3">
					<img src="img/pc/result/star/twelve/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_3']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_4">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_4']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_5">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_5']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_6">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_6']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_7">
					<img src="img/pc/result/star/twelve/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_7']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_ten ow_star_figure_ten_8">
					<img src="img/pc/result/star/ten/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_8']['star_num']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_twelve ow_star_figure_twelve_9">
					<img src="img/pc/result/star/twelve/<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_9']; ?>
.png" alt="">
				</div>
				<div class="ow_area_item ow_star_figure_hikari ow_star_figure_hikari_<?php echo $this->_tpl_vars['menu_data']['result_category']; ?>
">
					<img src="img/pc/result/star/star_figure_hikari.png" alt="">
				</div>
			</div>
	<?php $this->assign('star_num', $this->_tpl_vars['menu_data']['result_category']); ?>
			<div class="ow_star_figure_mid">
				<div class="ow_figure_result">
	<?php if ($this->_tpl_vars['star_num'] == 3 || $this->_tpl_vars['star_num'] == 7 || $this->_tpl_vars['star_num'] == 9): ?>
					<div class="ow_star_twelve ow_tac">
						<img src="img/pc/result/star/star_twelve2.png" alt="あの人の十二大主星" title="あなたの十二大主星">
					</div>
	<?php else: ?>
					<div class="ow_star_ten ow_tac">
						<img src="img/pc/result/star/star_ten2.png" alt="あの人の十大主星" title="あなたの十大主星">
					</div>
	<?php endif; ?>
					<div class="ow_area_item ow_figure_result_text">
						<?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_text'][$this->_tpl_vars['star_num']]; ?>

					</div>
				</div>
			</div>
			<div class="ow_star_figure_btm ow_tac">
				<img class="ow_vat" src="img/pc/result/star/star_figure_btm.jpg" alt="" title="">
			</div>
		<?php else: ?>
			<img src="img/pc/nc/star_bg.png" alt="有料版ではあなたの十大主星と十二大従星がわかります" title="有料版ではあなたの十大主星と十二大従星がわかります">
		<?php endif; ?>
		</div>
		<!--/.ow_area-->
		<div class="ow_comment_text ow_tac">
		<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] ) && ( $this->_tpl_vars['page_identify'] == @PAY || $this->_tpl_vars['page_identify'] == @FREE )): ?>
			あなたの<?php echo $this->_tpl_vars['base_data']['result_category']; ?>
運についてのお悩みは<br/><?php echo $this->_tpl_vars['base_data']['base_list']['target_graph_text'][$this->_tpl_vars['star_num']]; ?>
が答えを導きます
		<?php else: ?>
			あなたの<?php echo $this->_tpl_vars['base_data']['result_category']; ?>
運についてのお悩みは<br/>○○星が答えを導きます
		<?php endif; ?>
		</div>
		<div class="ow_result_body_text">
		<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] ) && ( $this->_tpl_vars['page_identify'] == @PAY || $this->_tpl_vars['page_identify'] == @FREE )): ?>
			<?php echo $this->_tpl_vars['menu_data']['result']['body']; ?>

		<?php else: ?>
			<?php echo $this->_tpl_vars['menu_data']['result']['cut_body']; ?>
<br>
			<div class="ow_nc ow_nc_white">
				<a href="javascript:<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] )): ?>gtag_submit('result','<?php echo @GTAG_KEY; ?>
<?php echo $this->_tpl_vars['contents_data']['id']; ?>
');<?php endif; ?>nc_submit('astrology_form<?php echo $this->_tpl_vars['pickup_num']; ?>
')" class="ow_nc_btn ow_nc_btn_default"><img src="img/pc/nc/btn_nc.png" alt="続きを見る(有料)" title="続きを見る(有料)"></a>

			</div>
		<?php endif; ?>
		</div>
	</div>
	<!-- /.ow_result_item_mid -->
	<div class="ow_result_item_btm ow_tac">
		<img class="ow_vat" src="img/pc/result/result_item_btm.jpg" alt=""/>
	</div>
</div>
<!-- /.ow_result_item -->
<?php endif; ?>