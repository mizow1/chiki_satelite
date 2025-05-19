<?php
require_once(MODEL.'front/controller/AbstractControllerClass.php');
class MarketAction extends AbstractController{
    function __construct($controller='',$action='',&$session_data=array(),$device=''){
        $this->init($controller,$action,$session_data,$device);
    }
    function Execute($get_data=array(),&$session_data=array()){
        $disp_array = array();
        
        // Googleスプレッドシートからサテライト情報を取得
        $sheet_id = '1hUodCk9AITl7I03clawHAG2MqiJEvCYIaGsPASp0zUo';
        $api_key = 'AIzaSyDeuSuZ1ppeIkxN7dnmV2xv1Q-8A7g3KMU';
        $sheet_name = 'common';
        $range = 'A:D';
        $sheet_range = urlencode($sheet_name) . '!' . $range;
        $url = "https://sheets.googleapis.com/v4/spreadsheets/{$sheet_id}/values/{$sheet_range}?key={$api_key}";

        // ページ上部のリード文
        $lead_range = urlencode($sheet_name) . '!E2';
        $lead_url = "https://sheets.googleapis.com/v4/spreadsheets/{$sheet_id}/values/{$lead_range}?key={$api_key}";
        $lead_response = @file_get_contents($lead_url);
        $satelite_lead = '';
        if ($lead_response !== false) {
            $lead_data = json_decode($lead_response, true);
            if (isset($lead_data['values'][0][0])) {
                $satelite_lead = $lead_data['values'][0][0];
            }
        }

        $response = @file_get_contents($url);
        $satelite_items = array();
        if ($response !== false) {
            $data = json_decode($response, true);
            if (isset($data['values'])) {
                array_shift($data['values']); // 1行目（カラム名）を除外
                foreach ($data['values'] as $row) {
                    // AB,AC,AD,AE列すべてが空なら終了
                    if (
                        (!isset($row[0]) || trim($row[0]) === '') &&
                        (!isset($row[1]) || trim($row[1]) === '') &&
                        (!isset($row[2]) || trim($row[2]) === '') &&
                        (!isset($row[3]) || trim($row[3]) === '')
                    ) {
                        break;
                    }
                    $item = array(
                        'url'  => isset($row[0]) ? $row[0] : '',
                        'img'  => isset($row[1]) ? $row[1] : '',
                        'alt'  => isset($row[2]) ? $row[2] : '',
                        'text' => isset($row[3]) ? $row[3] : '',
                    );
                    // url, img, text が全て空でない場合のみ追加
                    if (trim($item['url']) !== '' && trim($item['img']) !== '' && trim($item['text']) !== '') {
                        $satelite_items[] = $item;
                    }
                }
            }
        }
        $disp_array['satelite_items'] = $satelite_items;
        $disp_array['satelite_lead'] = $satelite_lead;
        // 旧：手動配列は下記の通りコメントアウト
        /*
        $disp_array['satelite_items'] = array(
            // ... ここに手動配列 ...
        );
        */
        $this->display($disp_array, 'market');
    }
    function PostExecute($get_data=array(),$post_data=array(),$file_data=array(),&$session_data=array()){
    }
}
