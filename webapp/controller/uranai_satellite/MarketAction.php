<?php
require_once(MODEL.'front/controller/AbstractControllerClass.php');
class MarketAction extends AbstractController{
    function __construct($controller='',$action='',&$session_data=array(),$device=''){
        $this->init($controller,$action,$session_data,$device);
    }
    function Execute($get_data=array(),&$session_data=array()){
        $disp_array = array();
        
        $disp_array['satelite_items'] = array(
            [
                'url' => 'https://fuyutsukichiki-sanmei.com',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/chiki_240.jpg',
                'alt' => '冬月式極算命学',
                'text' => '無料で体験！高的中率算命学──生年月日から三つの干支を数理化し、恋愛占い・仕事運・結婚相性など60種以上の無料占い＆プレミアム鑑定で驚異の的中率。'
            ],
            // [
            //     'url' => 'https://sashat-parallel.com/',
            //     'img' => 'https://contents.outward.jp/common/img/satelite_bnr/sashat_240.jpg',
            //     'alt' => '',
            //     'text' => '大阪・心斎橋の当たる恋愛占い【SASHA.t】本格無料占いでは、タロットで片想いや復縁の本音を並行世界から透視。深層心理を暴き、口コミで話題の的中率。初回無料・即日結果！'
            // ],
            // [
            //     'url'  => 'https://daiyoung-tarot.com/',
            //     'img' => 'https://contents.outward.jp/common/img/satelite_bnr/daiyoung_240.jpg',
            //     'alt'  => '',
            //     'text' => '大阪の当たるタロット占い【ダイヤング・タロット】YouTuber占い師が並行世界×水晶で恋愛や仕事運・人生を霊視。無料診断＆プレミアム鑑定で運命を完全読み解く！'
            // ],
            // [
            //     'url'  => 'https://mian-tarot.com/',
            //     'img' => 'https://contents.outward.jp/common/img/satelite_bnr/mian_240.jpg',
            //     'alt'  => '',
            //     'text' => '心揺さぶる琉球イーチンタロット【美杏】──並行世界×水晶で片想い・復縁・結婚運まで鮮明霊視。無料占いですぐ当たる口コミ高評価！'
            // ],
            [
                'url'  => 'https://mimoemaril-geomancy.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/maril_240.jpg',
                'alt'  => '',
                'text' => '【無料診断あり】大地の龍脈から恋愛・仕事運を高的中率で霊視米子発 水萌マリルの龍脈ジオマンシー占い──'
            ],
            // [
            //     'url'  => 'https://kasya-parallel-reading.com/',
            //     'img' => 'https://contents.outward.jp/common/img/satelite_bnr/kasya_240.jpg',
            //     'alt'  => '',
            //     'text' => '過去の分かれ道を遡り運命を再創造【ミセス・カーシャ パラレルリーディング】無料占いで正解ルートを霊視！'
            // ],
            [
                'url'  => 'https://nomorikeit-irish-harp.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/keit_240.jpg',
                'alt'  => '',
                'text' => '恋愛・結婚運をハープで霊視――野森ケイトのカルマ音階占いが無料診断で“当たる”と口コミ急増'
            ],
            // [
            //     'url'  => 'https://niutoko-vibration.com/',
            //     'img' => 'https://contents.outward.jp/common/img/satelite_bnr/niu_240.jpg',
            //     'alt'  => '',
            //     'text' => '【当たる占い】丹生灯香の星辰波動占術 無料鑑定で恋愛片想い・復縁の本音を透視'
            // ],
            // [
            //     'url'  => 'https://hayukisakura-dream.com/',
            //     'img' => 'https://contents.outward.jp/common/img/satelite_bnr/hayuki_240.jpg',
            //     'alt'  => '',
            //     'text' => '無料夢占い【はゆき咲くら】予知夢×透視で恋愛・復縁・人生をズバリ言い当てる'
            // ],
            [
                'url'  => 'https://mikomaria-spiritual.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/mikomaria_240.jpg',
                'alt'  => '巫女マリアの“スピリチュアルインナーサイン”～内在するカルマの識別信号',
                'text' => '無料占いで体感！神秘の巫女マリアが声と水晶で深層心理を霊視＆的中率◎'
            ],
            [
                'url'  => 'http://aron-vibration.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/aron_240.jpg',
                'alt'  => '波動恋愛占い｜波動気学で悩めるあなたを救う！　“帝劇ビル地下の運命支配人”アロン',
                'text' => '無料波動気学占いで本命の気持ちを透視！並行世界リーディングが片思い・復縁の悩みをズバリ解決。'
            ],
            [
                'url'  => 'http://midorikawarenri-astrology.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/renri_240.jpg',
                'alt'  => '麻布にこの人あり！　お忍び芸能人&財界からも口コミ伝搬【麻布十番の母】',
                'text' => '当たる恋愛占い｜ドイツ占星術×タロットダイスで片思いの本音と転機を並行世界から透視'
            ],
            [
                'url'  => 'https://hakuryu-spiritual.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/hakuryu_240.jpg',
                'alt'  => '神をも恐れぬ台湾随一の的中占！　台湾の諸葛孔明“白龍”の【八龍霊視占】',
                'text' => '無料八龍霊視占いで人生の転機を暴く！深層心理から運命の伴侶やモテ期を即日透視。'
            ],
            [
                'url'  => 'https://hoshikaze-exorcism.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/hoshikaze_240.jpg',
                'alt'  => '真髄解決!!　門外不出のマジナヒ祈祷　星風の“形代禁厭霊術”',
                'text' => '門外不出の形代霊術で悪縁断ち切り、幸運招来！災い除けと運気上昇を同時に叶える祈祷占術。'
            ],
            [
                'url'  => 'https://kamisakaasuru-tarot.com/',
                'img' => 'https://contents.outward.jp/common/img/satelite_bnr/asuru_240.jpg',
                'alt'  => '怖い程当たる！小さなおじさんからの不思議託宣〜オールドマンオラクル',
                'text' => '無料恋愛占いで当たる！30枚の宿命霊視カードが片思い・復縁・結婚運をズバリ透視'
            ],
        );
        $this->display($disp_array, 'market');
    }
    function PostExecute($get_data=array(),$post_data=array(),$file_data=array(),&$session_data=array()){
    }
}
