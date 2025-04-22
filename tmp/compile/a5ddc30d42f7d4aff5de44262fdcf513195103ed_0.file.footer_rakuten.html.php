<?php
/* Smarty version 4.1.1, created on 2023-12-18 15:35:03
  from '/home/users/0/flier.jp-uranai/web/uranai/common/rule/footer_rakuten.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_657fe817b0ddf6_89525139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5ddc30d42f7d4aff5de44262fdcf513195103ed' => 
    array (
      0 => '/home/users/0/flier.jp-uranai/web/uranai/common/rule/footer_rakuten.html',
      1 => 1702866965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657fe817b0ddf6_89525139 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- rakutenFooterNav -->
<div class="c-rakutenFooter">
<link rel="stylesheet" type="text/css" href="//checkout.rakuten.co.jp/fortune/merchant/css/merchant_footer.css">
<div id="rakutenFooterNav" style="margin-top:0px !important; color:#000;"><a href="http://uranai.rakuten.co.jp/"><img src="//checkout.rakuten.co.jp//fortune/merchant/img/PCfoot_logo.png" alt="楽天占い" width="140" height="40" class="serviceLogo"></a></div>
</div>
<!-- /rakutenFooterNav -->


<?php echo '<script'; ?>
 type="text/javascript">
  var _sf_async_config = { uid: 64639, domain: 'rakuten.goodfortune.jp', useCanonical: true };
  (function() {
    function loadChartbeat() {
      window._sf_endpt = (new Date()).getTime();
      var e = document.createElement('script');
      e.setAttribute('language', 'javascript');
      e.setAttribute('type', 'text/javascript');
      e.setAttribute('src','//static.chartbeat.com/js/chartbeat.js');
      document.body.appendChild(e);
    };
    var oldonload = window.onload;
    window.onload = (typeof window.onload != 'function') ?
      loadChartbeat : function() { oldonload(); loadChartbeat(); };
  })();
<?php echo '</script'; ?>
>
<?php }
}
