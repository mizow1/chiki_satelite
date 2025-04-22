<?php /* Smarty version 2.6.18, created on 2023-12-13 19:41:55
         compiled from file:./parts/recommend.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'file:./parts/recommend.html', 21, false),array('modifier', 'number_format', 'file:./parts/recommend.html', 25, false),)), $this); ?>
	<!-- ▼▼▼TOPページおすすめメニュー移植▼▼▼ -->
	<!-- ow_rec -->
	<div class="ow_rec">
		<div class="ow_rec_top ow_tac">
			<img class="ow_vab" src="img/pc/top/rec_top.png" alt="おすすめ鑑定" title="おすすめ鑑定"/>
		</div>
		<div class="ow_rec_mid">
<?php $_from = $this->_tpl_vars['recommend_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recommend_data'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recommend_data']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['val']):
        $this->_foreach['recommend_data']['iteration']++;
?>
    <?php if ($this->_foreach['recommend_data']['iteration'] < 6): ?>
        <?php if (! in_array ( $this->_tpl_vars['val']['pickup_menu'] , $this->_tpl_vars['ignore_recommend_id'] )): ?>

        <?php $this->assign('pickup_contents_data', $this->_tpl_vars['contents_list'][$this->_tpl_vars['val']['pickup_menu']]); ?>
        <?php $this->assign('pickup_category', $this->_tpl_vars['contents_list'][$this->_tpl_vars['val']['pickup_menu']]['category']); ?>
        <?php $this->assign('pickup_category_group', $this->_tpl_vars['contents_list'][$this->_tpl_vars['val']['pickup_menu']]['category_group']); ?>
        <?php $this->assign('pickup_target_count', $this->_tpl_vars['contents_list'][$this->_tpl_vars['val']['pickup_menu']]['target_count']); ?>

            <div class="ow_menu">
              <div class="ow_menu_head">
                <div class="ow_menu_icon"><img src="img/pc/category/<?php echo $this->_tpl_vars['pickup_category']; ?>
.png" alt="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['pickup_category']]['name']; ?>
　<?php if ($this->_tpl_vars['pickup_target_count'] == 1): ?>一人用<?php else: ?>二人用<?php endif; ?>" title="<?php echo $this->_tpl_vars['category_data'][$this->_tpl_vars['pickup_category']]['name']; ?>
　<?php if ($this->_tpl_vars['pickup_target_count'] == 1): ?>一人用<?php else: ?>二人用<?php endif; ?>" /></div>
                <div class="ow_menu_title">
                    <a href="<?php echo @ISP_BASE_URL; ?>
web/?menu=<?php echo $this->_tpl_vars['pickup_contents_data']['id']; ?>
" class="ow_menu_link"><?php echo ((is_array($_tmp=@$this->_tpl_vars['pickup_contents_data']['name_rakuten'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['pickup_contents_data']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['pickup_contents_data']['name'])); ?>
</a>
                </div>
              </div>
              <div class="ow_menu_tail">
                <span class="ow_menu_price ow_premium_price"><span class="ow_nif">プレミアム価格　<?php echo ((is_array($_tmp=$this->_tpl_vars['pickup_contents_data']['price_off10'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>
</span></span>
                <span class="ow_menu_price ow_default_price"><span class="ow_nif">通常価格　</span><?php echo ((is_array($_tmp=$this->_tpl_vars['pickup_contents_data']['price_taxin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php echo @PRICE_UNIT; ?>
</span>
              </div>
            </div>

        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
		</div>
		<!-- /.ow_rec_mid -->
		<div class="ow_rec_btm ow_tac">
			<img class="ow_vat" src="img/pc/top/rec_btm.jpg" alt="" />
		</div>
	</div>
	<!-- /.ow_rec -->
<!-- ▲▲▲TOPページおすすめメニュー移植▲▲▲ -->