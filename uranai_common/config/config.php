<?php
/**
 * 中央サーバー設定ファイル
 */

// データベース設定（将来の拡張用）
define('DB_HOST', 'localhost');
define('DB_NAME', 'column_central');
define('DB_USER', 'column_api');
define('DB_PASS', 'password');

// API設定
define('API_VERSION', 'v1');
define('DEFAULT_PAGE_LIMIT', 10);
define('MAX_PAGE_LIMIT', 100);
define('CACHE_EXPIRY', 3600); // 1時間

// サイト認証用のAPIキー（セキュリティ対策）
$allowed_sites = [
    'site1' => [
        'api_key' => 'sk_test_site1_12345',
        'name' => 'サテライトサイト1',
        'domain' => 'example1.com'
    ],
    'site2' => [
        'api_key' => 'sk_test_site2_67890',
        'name' => 'サテライトサイト2', 
        'domain' => 'example2.com'
    ]
];

// CSVファイルパス（現在のデータソース）
define('COLUMN_CSV_PATH', __DIR__ . '/../../column.csv');

// キャッシュディレクトリ
define('CACHE_DIR', __DIR__ . '/../cache/');

// ログディレクトリ
define('LOG_DIR', __DIR__ . '/../logs/');

// エラーログ設定
ini_set('log_errors', 1);
ini_set('error_log', LOG_DIR . 'api_error.log');

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');