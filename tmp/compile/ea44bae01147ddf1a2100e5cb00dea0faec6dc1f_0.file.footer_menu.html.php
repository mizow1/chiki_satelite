<?php
/* Smarty version 4.1.1, created on 2024-02-20 11:33:59
  from '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/footer_menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_65d40f97471dd4_29229888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea44bae01147ddf1a2100e5cb00dea0faec6dc1f' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/chiki/webapp/view/index/default_pc/parts/footer_menu.html',
      1 => 1708396337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./footer_isp.html' => 1,
  ),
),false)) {
function content_65d40f97471dd4_29229888 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ow_footer">
	<div class="ow_footer_menu">
		<a href="<?php echo (defined('CONTENTS_URL') ? constant('CONTENTS_URL') : null);?>
">トップページ</a>
		<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/profile/#profile">監修者紹介</a>
		<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/profile/#about">占術紹介</a>
		<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/link/">おすすめ</a><br class="dispSP" />
		<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/company/">販売責任者（運営者情報）</a>
		<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/policy/">プライバシーポリシー</a>
		<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/law/">特定商取引法に基づく表記</a><br class="dispSP" />
		<a href="http://contents.outward.jp/contact/" target="_blank">お問合わせ</a>
		<a href="<?php echo (defined('ISP_BASE_URL') ? constant('ISP_BASE_URL') : null);?>
web/sitemap/">サイトマップ</a>


	</div>
	<div class="footer_subInfo">
		当ホームページ記載の記事、写真、イラスト等の無断掲載を禁じます。<br>
		<a target="_blank" href="http://www.outward.jp">(C)OUTWARD Co.,LTD.</a><br>
	</div>
	<!-- ▲▲▲240126_追加ここまで▲▲▲ -->
	<div class="footer_link">
		<div class="footer_link_head">[&nbsp;人気の無料占いサイト&nbsp;]</div>
		<a href="https://www.goodfortune.jp/" target="_blank">さちこい無料占い</a>｜
		<a href="https://www.goodfortune.jp/uranai/uranai_aishou" target="_blank">相性占い</a>｜
		<a href="https://www.goodfortune.jp/fortune/today" target="_blank">今日の運勢</a>｜
		<a href="https://www.goodfortune.jp/tarot" target="_blank">タロット占い</a>｜
		<a href="https://xn--100-gl4bpc8b3oocv753by8dr6skr7a.com/" target="_blank">姓名判断</a>
	</div>
<!-- ▼▼▼240126_追加ここから▼▼▼ -->
<?php $_smarty_tpl->_subTemplateRender("file:./footer_isp.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php }
}
