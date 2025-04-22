<?php
/**
 * サービスアカウントを使用してスプレッドシートからデータを読み取るクラス
 */
class ServiceAccountSpreadsheetReader {
    // スプレッドシートのID
    private $spreadsheetId;
    // シート名
    private $sheetName;
    // サービスアカウントのキーファイルパス
    private $keyFilePath;
    // キャッシュファイルのパス
    private $cacheFilePath;
    // キャッシュの有効期限（秒）
    private $cacheExpiration;

    /**
     * コンストラクタ
     * 
     * @param string $spreadsheetId スプレッドシートのID
     * @param string $sheetName シート名
     * @param string $keyFilePath サービスアカウントのキーファイルパス
     * @param string $cacheFilePath キャッシュファイルのパス
     * @param int $cacheExpiration キャッシュの有効期限（秒）
     */
    public function __construct($spreadsheetId, $sheetName, $keyFilePath, $cacheFilePath = null, $cacheExpiration = 3600) {
        $this->spreadsheetId = $spreadsheetId;
        $this->sheetName = $sheetName;
        $this->keyFilePath = $keyFilePath;
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

        // サービスアカウントの認証情報を読み込む
        $keyFileContents = file_get_contents($this->keyFilePath);
        if ($keyFileContents === false) {
            error_log("サービスアカウントのキーファイルを読み込めませんでした: " . $this->keyFilePath);
            return array();
        }

        $keyData = json_decode($keyFileContents, true);
        if (!$keyData) {
            error_log("サービスアカウントのキーファイルのJSONが無効です");
            return array();
        }

        // JWT（JSON Web Token）を作成
        $jwt = $this->createJWT($keyData);
        
        // アクセストークンを取得
        $accessToken = $this->getAccessToken($jwt, $keyData['client_email']);
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
     * JWT（JSON Web Token）を作成する
     * 
     * @param array $keyData サービスアカウントのキーデータ
     * @return string JWT
     */
    private function createJWT($keyData) {
        $now = time();
        
        // ヘッダー
        $header = array(
            "alg" => "RS256",
            "typ" => "JWT"
        );
        
        // クレーム
        $claim = array(
            "iss" => $keyData['client_email'],
            "scope" => "https://www.googleapis.com/auth/spreadsheets.readonly",
            "aud" => "https://oauth2.googleapis.com/token",
            "exp" => $now + 3600,
            "iat" => $now
        );
        
        // Base64エンコード
        $base64Header = $this->base64UrlEncode(json_encode($header));
        $base64Claim = $this->base64UrlEncode(json_encode($claim));
        
        // 署名
        $signatureInput = $base64Header . "." . $base64Claim;
        $privateKey = openssl_pkey_get_private($keyData['private_key']);
        openssl_sign($signatureInput, $signature, $privateKey, "SHA256");
        $base64Signature = $this->base64UrlEncode($signature);
        
        // JWTの組み立て
        $jwt = $signatureInput . "." . $base64Signature;
        
        return $jwt;
    }
    
    /**
     * Base64 URL エンコード
     * 
     * @param string $data エンコードするデータ
     * @return string エンコードされたデータ
     */
    private function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    
    /**
     * アクセストークンを取得する
     * 
     * @param string $jwt JWT
     * @param string $clientEmail クライアントメール
     * @return string|false アクセストークン、または失敗時はfalse
     */
    private function getAccessToken($jwt, $clientEmail) {
        $url = 'https://oauth2.googleapis.com/token';
        $data = array(
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
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
            error_log("アクセストークンの取得に失敗しました");
            return false;
        }

        $response = json_decode($result, true);
        
        if (!isset($response['access_token'])) {
            error_log("アクセストークンが応答に含まれていません: " . print_r($response, true));
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
            error_log("スプレッドシートデータの取得に失敗しました");
            return array();
        }

        $response = json_decode($result, true);
        
        if (!isset($response['values'])) {
            error_log("スプレッドシートデータが応答に含まれていません: " . print_r($response, true));
            return array();
        }

        return $response['values'];
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
