<?php
/****************************************
*	定数定義
****************************************/
//API接続先の設定
define('API_DOMAIN','https://contents.goodfortune.jp/chiki/');
define('API_TOP',API_DOMAIN.'api/?api=ON');
define('API_MENU',API_DOMAIN.'web/?api=ON&menu=');
define('API_PROFILE',API_DOMAIN.'web/profile?api=ON');
define('API_RESULT_NC',API_DOMAIN.'web/?api=ON&menu=');

define('ISP_BASE_URL','https://fuyutsukichiki-sanmei.com/');
define('CONTENTS_URL','https://fuyutsukichiki-sanmei.com/');

define('CONTENTS_NAME','核心見抜く掟破りの的中率！　冬月式【極】算命学');
define('PRICE_UNIT','円（税込）');
define('TAX_RATE',0.1);


/****************************************
*	ページ判別用定数  2020/01/07追加
****************************************/
//有料
define('PAY','pay');
//一部無料
define('PART_FREE','part_free');
//完全無料
define('FREE','free');


/****************************************
*	[デザイン管理] テンプレートデバイスタイプ (TEMPLATE_DEVICE_TYPE_)
****************************************/
define('TEMPLATE_DEVICE_TYPE_PC',1);
define('TEMPLATE_DEVICE_TYPE_SP',2);

/****************************************
*	[フロント] PC,SPどちらのテンプレートを表示するか
*	COOKIEに1か2を埋め込む
****************************************/
define('TEMPLATE_DEVICE_TYPE','template_device_type');
