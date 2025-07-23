<?php
/**
 * コラムAPI ハンドラークラス
 * 各エンドポイントのリクエストを処理
 */

require_once __DIR__ . '/ColumnDataManager.php';
require_once __DIR__ . '/ApiResponse.php';
require_once __DIR__ . '/CacheManager.php';

class ColumnApiHandler
{
    private $dataManager;
    private $cacheManager;
    
    public function __construct()
    {
        $this->dataManager = new ColumnDataManager();
        $this->cacheManager = new CacheManager();
    }
    
    public function handleRequest()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        // URLからパスを抽出
        $path = parse_url($requestUri, PHP_URL_PATH);
        $pathParts = explode('/', trim($path, '/'));
        
        // /uranai_common/api/v1/ 以降のパスを取得
        $apiIndex = array_search('v1', $pathParts);
        if ($apiIndex === false) {
            ApiResponse::error('INVALID_ENDPOINT', 'Invalid API endpoint');
            return;
        }
        
        $endpoint = array_slice($pathParts, $apiIndex + 1);
        
        if ($method !== 'GET') {
            ApiResponse::error('METHOD_NOT_ALLOWED', 'Only GET requests are allowed');
            return;
        }
        
        // サイトID認証
        $siteId = $_GET['site_id'] ?? null;
        if (!$this->validateSiteId($siteId)) {
            ApiResponse::error('INVALID_SITE_ID', 'Invalid or missing site_id');
            return;
        }
        
        // エンドポイントによる分岐
        if (empty($endpoint[0])) {
            ApiResponse::error('INVALID_ENDPOINT', 'Endpoint not specified');
            return;
        }
        
        switch ($endpoint[0]) {
            case 'columns':
                $this->handleColumnsEndpoint($endpoint, $_GET);
                break;
            default:
                ApiResponse::error('ENDPOINT_NOT_FOUND', 'Endpoint not found');
        }
    }
    
    private function validateSiteId($siteId)
    {
        global $allowed_sites;
        return $siteId && isset($allowed_sites[$siteId]);
    }
    
    private function handleColumnsEndpoint($endpoint, $params)
    {
        if (count($endpoint) === 1) {
            // /api/v1/columns - コラム一覧取得
            $this->getColumnsList($params);
        } elseif (count($endpoint) === 2) {
            if ($endpoint[1] === 'latest') {
                // /api/v1/columns/latest - 最新コラム取得
                $this->getLatestColumns($params);
            } elseif (is_numeric($endpoint[1])) {
                // /api/v1/columns/{id} - コラム詳細取得
                $this->getColumnDetail($endpoint[1], $params);
            } else {
                ApiResponse::error('INVALID_ENDPOINT', 'Invalid column endpoint');
            }
        } else {
            ApiResponse::error('INVALID_ENDPOINT', 'Invalid column endpoint');
        }
    }
    
    private function getColumnsList($params)
    {
        $page = intval($params['page'] ?? 1);
        $limit = intval($params['limit'] ?? DEFAULT_PAGE_LIMIT);
        $sort = $params['sort'] ?? 'post_date_desc';
        $siteId = $params['site_id'];
        
        // パラメータバリデーション
        if ($page < 1) $page = 1;
        if ($limit < 1 || $limit > MAX_PAGE_LIMIT) $limit = DEFAULT_PAGE_LIMIT;
        
        // キャッシュキーを生成
        $cacheKey = "columns_list_{$siteId}_{$page}_{$limit}_{$sort}";
        
        // キャッシュから取得を試行
        $cachedData = $this->cacheManager->get($cacheKey);
        if ($cachedData !== null) {
            ApiResponse::success($cachedData);
            return;
        }
        
        // データ取得
        $result = $this->dataManager->getColumnsList($page, $limit, $sort, $siteId);
        
        // キャッシュに保存
        $this->cacheManager->set($cacheKey, $result, CACHE_EXPIRY);
        
        ApiResponse::success($result);
    }
    
    private function getColumnDetail($columnId, $params)
    {
        $siteId = $params['site_id'];
        
        // キャッシュキーを生成
        $cacheKey = "column_detail_{$columnId}_{$siteId}";
        
        // キャッシュから取得を試行
        $cachedData = $this->cacheManager->get($cacheKey);
        if ($cachedData !== null) {
            ApiResponse::success($cachedData);
            return;
        }
        
        // データ取得
        $result = $this->dataManager->getColumnDetail($columnId, $siteId);
        
        if ($result === null) {
            ApiResponse::error('COLUMN_NOT_FOUND', 'Column not found');
            return;
        }
        
        // キャッシュに保存
        $this->cacheManager->set($cacheKey, $result, CACHE_EXPIRY);
        
        ApiResponse::success($result);
    }
    
    private function getLatestColumns($params)
    {
        $limit = intval($params['limit'] ?? 4);
        $siteId = $params['site_id'];
        
        // パラメータバリデーション
        if ($limit < 1 || $limit > 20) $limit = 4;
        
        // キャッシュキーを生成
        $cacheKey = "columns_latest_{$siteId}_{$limit}";
        
        // キャッシュから取得を試行
        $cachedData = $this->cacheManager->get($cacheKey);
        if ($cachedData !== null) {
            ApiResponse::success($cachedData);
            return;
        }
        
        // データ取得
        $result = $this->dataManager->getLatestColumns($limit, $siteId);
        
        // キャッシュに保存
        $this->cacheManager->set($cacheKey, $result, CACHE_EXPIRY);
        
        ApiResponse::success($result);
    }
}