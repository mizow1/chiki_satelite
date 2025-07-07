<?php
/**
 * スプレッドシートからデータを読み取るクラス
 */
class SpreadsheetReader {
    // スプレッドシートのID
    private $spreadsheetId;
    // シート名
    private $sheetName;
    // Google APIのクライアントID
    private $clientId;
    // Google APIのクライアントシークレット
    private $clientSecret;
    // Google APIのリフレッシュトークン
    private $refreshToken;
    // キャッシュファイルのパス
    private $cacheFilePath;
    // キャッシュの有効期限（秒）
    private $cacheExpiration;

    /**
     * コンストラクタ
     * 
     * @param string $spreadsheetId スプレッドシートのID
     * @param string $sheetName シート名
     * @param string $clientId Google APIのクライアントID
     * @param string $clientSecret Google APIのクライアントシークレット
     * @param string $refreshToken Google APIのリフレッシュトークン
     * @param string $cacheFilePath キャッシュファイルのパス
     * @param int $cacheExpiration キャッシュの有効期限（秒）
     */
    public function __construct($spreadsheetId, $sheetName, $clientId, $clientSecret, $refreshToken, $cacheFilePath = null, $cacheExpiration = 3600) {
        $this->spreadsheetId = $spreadsheetId;
        $this->sheetName = $sheetName;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->refreshToken = $refreshToken;
        $this->cacheFilePath = $cacheFilePath ?: sys_get_temp_dir() . '/spreadsheet_cache_' . md5($spreadsheetId . $sheetName) . '.json';
        $this->cacheExpiration = $cacheExpiration;
    }

    /**
     * スプレッドシートからデータを取得する
     * 
     * @return array スプレッドシートのデータ
     */
    public function getData() {
        // キャッシュがあれば使用
        $cachedData = $this->getCachedData();
        if ($cachedData !== false) {
            return $cachedData;
        }

        // アクセストークンを取得
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return array();
        }

        // スプレッドシートからデータを取得
        $data = $this->fetchSpreadsheetData($accessToken);
        
        // データをキャッシュに保存
        $this->cacheData($data);
        
        return $data;
    }

    /**
     * キャッシュからデータを取得する
     * 
     * @return array|false キャッシュデータ、または失敗時はfalse
     */
    private function getCachedData() {
        if (!file_exists($this->cacheFilePath)) {
            return false;
        }

        $cacheData = json_decode(file_get_contents($this->cacheFilePath), true);
        
        // キャッシュの有効期限をチェック
        if (!isset($cacheData['timestamp']) || (time() - $cacheData['timestamp']) > $this->cacheExpiration) {
            return false;
        }

        return $cacheData['data'];
    }

    /**
     * データをキャッシュに保存する
     * 
     * @param array $data 保存するデータ
     */
    private function cacheData($data) {
        $cacheData = array(
            'timestamp' => time(),
            'data' => $data
        );
        
        file_put_contents($this->cacheFilePath, json_encode($cacheData));
    }

    /**
     * アクセストークンを取得する
     * 
     * @return string|false アクセストークン、または失敗時はfalse
     */
    private function getAccessToken() {
        $url = 'https://oauth2.googleapis.com/token';
        $data = array(
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $this->refreshToken,
            'grant_type' => 'refresh_token'
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);
        
        if (!isset($response['access_token'])) {
            return false;
        }

        return $response['access_token'];
    }

    /**
     * スプレッドシートからデータを取得する
     * 
     * @param string $accessToken アクセストークン
     * @return array スプレッドシートのデータ
     */
    private function fetchSpreadsheetData($accessToken) {
        $url = "https://sheets.googleapis.com/v4/spreadsheets/{$this->spreadsheetId}/values/{$this->sheetName}!B2:K";
        
        $options = array(
            'http' => array(
                'header' => "Authorization: Bearer {$accessToken}\r\n",
                'method' => 'GET'
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return array();
        }

        $response = json_decode($result, true);
        
        if (!isset($response['values'])) {
            return array();
        }

        return $response['values'];
    }

    /**
     * URLに基づいてリードコンテンツを取得する
     * 
     * @param string $targetUrl 対象のURL
     * @return string|null リードコンテンツ、または見つからない場合はnull
     */
    public function getLeadContentByUrl($targetUrl) {
        $data = $this->getData();
        
        foreach ($data as $row) {
            if (count($row) < 10) {
                continue;
            }
            
            $url = $row[0]; // B列のURL
            $leadContent = $row[9]; // K列の内容
            
            if ($url == $targetUrl) {
                return $leadContent;
            }
        }
        
        return null;
    }

    /**
     * メニューIDに基づいてリードコンテンツを取得する
     * 
     * @param string $menuId メニューID
     * @return string|null リードコンテンツ、または見つからない場合はnull
     */
    public function getLeadContentByMenuId($menuId) {
        $targetUrl = "https://fuyutsukichiki-sanmei.com/web/?menu=" . $menuId;
        return $this->getLeadContentByUrl($targetUrl);
    }
}
