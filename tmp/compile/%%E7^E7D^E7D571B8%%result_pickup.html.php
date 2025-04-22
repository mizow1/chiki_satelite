<?php /* Smarty version 2.6.18, created on 2023-12-13 19:54:11
         compiled from file:./parts/result_pickup.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'file:./parts/result_pickup.html', 83, false),)), $this); ?>
	<div class="ow_common_menu">
		<div class="ow_common_menu_top ow_tac">
			<img class="ow_vab" src="img/pc/common/common_menu_top.jpg" alt="" title=""/>
		</div>
		<div class="ow_common_menu_mid">
			<div class="ow_menu_head">
				<div class="ow_menu_icon">
					<div class="ow_menu_category"><img src="img/pc/category/<?php echo $this->_tpl_vars['pickup']['contents_data']['category']; ?>
.png"alt="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['pickup']['contents_data']['category']]['name']; ?>
　<?php if ($this->_tpl_vars['pickup']['contents_data']['target_count'] == 2): ?>二<?php else: ?>一<?php endif; ?>人用" title="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['pickup']['contents_data']['category']]['name']; ?>
　<?php if ($this->_tpl_vars['pickup']['contents_data']['target_count'] == 2): ?>二<?php else: ?>一<?php endif; ?>人用"/></div>
				</div>
				<div class="ow_menu_title">
					<?php echo $this->_tpl_vars['pickup']['contents_data']['name']; ?>

				</div>
			</div>
		</div>
		<div class="ow_common_menu_btm ow_tac">
			<img class="ow_vat" src="img/pc/common/common_menu_btm.jpg" alt=""/>
		</div>
	</div>
	<!-- /.ow_common_menu -->


	<div class="ow_sub_menu ow_sub_menu_entry">
		<div class="ow_sub_menu_top ow_tac">
			<img class="ow_vab" src="img/pc/entry/sub_menu_top_2.jpg" alt=""/>
		</div>
		<div class="ow_sub_menu_mid">
			<div class="ow_sub_title">
				<img class="ow_tac" src="img/pc/entry/sub_menu_title.png" alt="このメニューでは以下の項目が占えます" title="このメニューでは以下の項目が占えます"/>
			</div>
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
<?php $_from = $this->_tpl_vars['pickup']['menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menu_data_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menu_data_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['pickup_menu']):
        $this->_foreach['menu_data_loop']['iteration']++;
?>
		<?php if (! ($this->_foreach['menu_data_loop']['iteration'] == $this->_foreach['menu_data_loop']['total'])): ?>
			<?php if ($this->_tpl_vars['pickup_menu']['astrology_category'] == 5): ?>
				<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
					<?php echo $this->_tpl_vars['pickup_menu']['name']; ?>

				</div>
			<?php elseif ($this->_tpl_vars['pickup_menu']['astrology_category'] >= 2): ?>
				<div class="ow_sub_menu_item ow_sub_menu_item_3 ow_dot_3">
					<?php echo $this->_tpl_vars['pickup_menu']['name']; ?>

				</div>
			<?php else: ?>
				<div class="ow_sub_menu_item ow_sub_menu_item ow_dot_base">
					<?php echo $this->_tpl_vars['pickup_menu']['name']; ?>

				</div>
			<?php endif; ?>
		<?php else: ?>
					<div class="ow_sub_menu_item ow_sub_menu_item_2 ow_dot_2">
						<?php echo $this->_tpl_vars['pickup_menu']['name']; ?>

					</div>
		<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

			</div>
			<!-- /.ow_sub_menu_list -->
			<div class="ow_conductor_caption">
				<div class="ow_conductor_btn">
					<a href="javascript:nc_submit('astrology_form<?php echo $this->_tpl_vars['pickup_num']; ?>
')" class="ow_conductor_btn_link"><img src="img/pc/nc/btn_submit_2.png" alt="続きを読む(有料)" title="続きを読む(有料)"></a>
				</div>
				<div class="ow_conductor_caption_text ow_conductor_caption_text_border">
					<span class="ow_conductor_caption_text_strong">「続きを見る」を押しますと<br>
					鑑定結果の続きをご覧いただけます。</span><br>
					<br>
					<div class="ow_conductor_caption_text_1">
<?php if ($this->_tpl_vars['contents_data']['price_taxin'] == 1): ?>
					<span class="ow_conductor_caption_text_strong">
					こちらのメニューは
					<div class="ow_yellow ow_nif">
						プレミアム価格　<?php echo ((is_array($_tmp=$this->_tpl_vars['pickup']['contents_data']['price_off10'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>

					</div>
					<div class="ow_default_price">
						<span class="ow_nif">通常価格　</span><?php echo ((is_array($_tmp=$this->_tpl_vars['pickup']['contents_data']['price_taxin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>

					</div>
					でご利用できます。
					</span>
<?php elseif (! empty ( $this->_tpl_vars['pickup']['base_contents_data'] )): ?>
					<span class="ow_conductor_caption_text_strong">このメニューは通常<?php echo ((is_array($_tmp=$this->_tpl_vars['pickup']['base_contents_data']['price_taxin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>
のところを<br>
					<span class="ow_yellow"><?php echo ((is_array($_tmp=$this->_tpl_vars['pickup']['contents_data']['price_taxin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>
でご利用できます。</span></span><br>
<?php else: ?>
					<span class="ow_conductor_caption_text_strong">このメニューは<?php echo ((is_array($_tmp=$this->_tpl_vars['pickup']['contents_data']['price_taxin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>
でご利用できます。</span><br>
<?php endif; ?>
				</div>
				</div>
				<div class="ow_conductor_caption_text_2">
					ご利用の前には、メニュー内容のご確認をお願いいたします。
					ご購入されるとサービス・コンテンツのご利用料金が発生いたします。
				</div>
			</div>
			<form id="astrology_form<?php echo $this->_tpl_vars['pickup_num']; ?>
" method="POST" action="<?php echo @API_DOMAIN; ?>
web/?menu=<?php echo $this->_tpl_vars['pickup']['contents_data']['id']; ?>
">
				<input type="hidden" name="qid" value="<?php echo $this->_tpl_vars['pickup']['qid']; ?>
">
				<input type="hidden" name="nc" value="0">
			</form>
			<!-- /.ow_sub_menu_caption -->
		</div>
		<!-- ow_sub_menu_mid -->
		<div class="ow_sub_menu_btm ow_tac">
			<img class="ow_vat" src="img/pc/entry/sub_menu_btm.jpg" alt="">
		</div>
	</div>
	<!-- /.ow_sub_menu -->
</div>
<!-- /.ow_conductor -->