<?php
/**
 * サービスアカウントの設定ファイル
 */

// スプレッドシートのID
define('SPREADSHEET_ID', '1DzNC4U38TT1LFKralDwsAh4BNPHlOfHqc34cSuLJJXg');

// シート名
define('SPREADSHEET_SHEET_NAME', 'fuyutsukichiki-sanmei.com');

// サービスアカウントのキーファイルパス
define('SERVICE_ACCOUNT_KEY_FILE', __DIR__ . '/../credentials/uranai-genkou-generate-e8315e54527b.json');

// キャッシュファイルのパス
define('SPREADSHEET_CACHE_PATH', sys_get_temp_dir() . '/spreadsheet_cache.json');

// キャッシュの有効期限（秒）- 1時間
define('SPREADSHEET_CACHE_EXPIRATION', 3600);
