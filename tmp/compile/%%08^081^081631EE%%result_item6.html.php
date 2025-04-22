<?php /* Smarty version 2.6.18, created on 2023-12-13 19:25:22
         compiled from file:./parts/result_item6.html */ ?>
<div class="ow_result_item ow_card">
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
		<?php $this->assign('tarot_num', $this->_tpl_vars['menu_data']['result']['item_id']); ?>
		<?php if (empty ( $this->_tpl_vars['menu_data']['pickup_flag'] ) && ( $this->_tpl_vars['page_identify'] == @PAY || $this->_tpl_vars['page_identify'] == @FREE )): ?>
		<div class="ow_area ow_tac">
			<div class="ow_card_bg">
				<img src="img/pc/result/card_bg.png" alt="タロットカード" title="タロットカード">
			</div>
			<div class="ow_area_item ow_card_5">
				<img src="img/pc/result/card_5.png" alt="">
			</div>
			<div class="ow_area_item ow_card_result">
				<img src="img/pc/result/card/<?php echo $this->_tpl_vars['tarot_num']+1; ?>
.png" alt="<?php echo $this->_tpl_vars['base_data']['result_tarot'][$this->_tpl_vars['tarot_num']]; ?>
" title="<?php echo $this->_tpl_vars['base_data']['result_tarot'][$this->_tpl_vars['tarot_num']]; ?>
">
			</div>
			<div class="ow_area_item ow_card_hand">
				<img src="img/pc/result/card/hand.png" alt="">
			</div>
		</div>
		<div class="ow_comment_text">
			<?php echo $this->_tpl_vars['menu_data']['name']; ?>
について、『<?php echo $this->_tpl_vars['base_data']['result_tarot'][$this->_tpl_vars['tarot_num']]; ?>
』のカードがでました。
		</div>
		<?php else: ?>
		<div class="ow_area ow_tac">
			<img src="img/pc/nc/card_bg.png" alt="有料版ではあなたのタロット結果がわかります" title="有料版ではあなたの十大主星と十二大従星がわかります">
		</div>
		<div class="ow_comment_text">
			<?php echo $this->_tpl_vars['menu_data']['name']; ?>
について、『○○』のカードがでました。
		</div>
		<?php endif; ?>
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