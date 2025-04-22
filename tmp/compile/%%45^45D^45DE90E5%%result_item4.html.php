<?php /* Smarty version 2.6.18, created on 2023-12-13 19:25:22
         compiled from file:./parts/result_item4.html */ ?>
<?php if ($this->_tpl_vars['contents_data']['target_count'] == 1): ?>
<div class="ow_result_item ow_tentyuusatu">
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
			<div class="ow_tentyuusatu_bg">
				<img src="img/pc/result/tentyuusatu_bg.png" alt="あなたの天中殺" title="あなたの天中殺">
			</div>
			<div class="ow_tentyuusatu_result ow_area_item">
				<img src="img/pc/result/tentyuusatu/<?php echo $this->_tpl_vars['base_data']['base_list']['my_tentyukaku_yy']; ?>
.png" alt="<?php echo $this->_tpl_vars['base_data']['base_list']['my_tentyukaku_yy_text']; ?>
" title="<?php echo $this->_tpl_vars['base_data']['base_list']['my_tentyukaku_yy_text']; ?>
">
			</div>
			<?php else: ?>
				<img src="img/pc/nc/tentyuusatu_bg.png" alt="有料版ではあなたの天中殺がわかります" title="有料版ではあなたの天中殺がわかります">
			<?php endif; ?>
		</div>
		<div class="ow_comment_text">
			天中殺は身体や生き方を整える大切な時間です。<br/>
			あなたがすべきこと、身に起こること今のあなたに必要なことを見ていきましょう。
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
<div class="ow_result_item ow_tentyuusatu">
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
			<div class="ow_tentyuusatu_bg">
				<img src="img/pc/result/tentyuusatu_bg2.png" alt="あの人の天中殺" title="あの人の天中殺">
			</div>
			<div class="ow_tentyuusatu_result ow_area_item">
				<img src="img/pc/result/tentyuusatu/<?php echo $this->_tpl_vars['base_data']['base_list']['target_tentyukaku_yy']; ?>
.png" alt="<?php echo $this->_tpl_vars['base_data']['base_list']['target_tentyukaku_yy_text']; ?>
" title="<?php echo $this->_tpl_vars['base_data']['base_list']['target_tentyukaku_yy_text']; ?>
">
			</div>
			<?php else: ?>
				<img src="img/pc/nc/tentyuusatu_bg.png" alt="有料版ではあなたの天中殺がわかります" title="有料版ではあなたの天中殺がわかります">
			<?php endif; ?>
		</div>
		<div class="ow_comment_text">
			天中殺は身体や生き方を整える大切な時間です。<br/>
			あなたがすべきこと、身に起こること今のあなたに必要なことを見ていきましょう。
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