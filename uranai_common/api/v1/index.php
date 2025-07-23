<?php
/**
 * 中央サーバー API エントリーポイント
 * コラム機能の共通処理を外部API化
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../lib/ColumnApiHandler.php';

try {
    $handler = new ColumnApiHandler();
    $handler->handleRequest();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'error' => [
            'code' => 'SERVER_ERROR',
            'message' => $e->getMessage()
        ]
    ]);
}