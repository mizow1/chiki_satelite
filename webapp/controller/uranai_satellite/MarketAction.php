<?php
require_once(MODEL.'front/controller/AbstractControllerClass.php');
class MarketAction extends AbstractController{
    function __construct($controller='',$action='',&$session_data=array(),$device=''){
        $this->init($controller,$action,$session_data,$device);
    }
    function Execute($get_data=array(),&$session_data=array()){
        $disp_array = array();
        // サテライトアイテム配列を作成
        $disp_array['satelite_items'] = array(
            [
                'url' => 'https://fuyutsukichiki-sanmei.com',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/chiki_240.jpg',
                'alt' => '冬月式極算命学',
                'text' => '無料で体験！高的中率算命学──生年月日から三つの干支を数理化し、恋愛占い・仕事運・結婚相性など60種以上の無料占い＆プレミアム鑑定で驚異の的中率。'
            ],
            [
                'url' => 'https://sashat-parallel.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/sashat_240.jpg',
                'alt' => '',
                'text' => '大阪・心斎橋の当たる恋愛占い【SASHA.t】本格無料占いでは、タロットで片想いや復縁の本音を並行世界から透視。深層心理を暴き、口コミで話題の的中率。初回無料・即日結果！'
            ],
            [
                'url'  => 'https://daiyoung-tarot.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/daiyoung_240.jpg',
                'alt'  => '',
                'text' => '大阪の当たるタロット占い【ダイヤング・タロット】YouTuber占い師が並行世界×水晶で恋愛や仕事運・人生を霊視。無料診断＆プレミアム鑑定で運命を完全読み解く！'
            ],
            [
                'url'  => 'https://mian-tarot.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/mian_240.jpg',
                'alt'  => '',
                'text' => '心揺さぶる琉球イーチンタロット【美杏】──並行世界×水晶で片想い・復縁・結婚運まで鮮明霊視。無料占いですぐ当たる口コミ高評価！'
            ],
            [
                'url'  => 'https://mimoemaril-geomancy.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/maril_240.jpg',
                'alt'  => '',
                'text' => '米子発 水萌マリルの龍脈ジオマンシー占い──大地の龍脈から恋愛・仕事運を高的中率で霊視【無料診断あり】'
            ],
            [
                'url'  => 'https://kasya-parallel-reading.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/kasya_240.jpg',
                'alt'  => '',
                'text' => '過去の分かれ道を遡り運命を再創造【ミセス・カーシャ パラレルリーディング】無料占いで正解ルートを霊視！'
            ],
            [
                'url'  => 'https://nomorikeit-irish-harp.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/keit_240.jpg',
                'alt'  => '',
                'text' => 'どんな悩みも即解消！野森ケイトのアイリッシュハープ神秘術で“カルマ音階”を無料占いで体験してみよう'
            ],
            [
                'url'  => 'https://niutoko-vibration.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/niu_240.jpg',
                'alt'  => '',
                'text' => '衝撃鑑定！霊性チャネラー丹生灯香の星辰波動占術【無料占い】深層心理を透視し当たると話題'
            ],
            [
                'url'  => 'https://hayukisakura-dream.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/hayuki_240.jpg',
                'alt'  => '',
                'text' => '予知夢×クレアボヤンス【はゆき咲くらの夢霊術占い】無料で核心を突く当たる夢占い体験'
            ],        
        );
        $this->display($disp_array, 'market');
    }
    function PostExecute($get_data=array(),$post_data=array(),$file_data=array(),&$session_data=array()){
    }
}
