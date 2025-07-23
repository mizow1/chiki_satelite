<?php
/**
 * API レスポンス処理クラス
 * 統一されたレスポンス形式を提供
 */

class ApiResponse
{
    /**
     * 成功レスポンスを出力
     */
    public static function success($data)
    {
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'data' => $data
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    /**
     * エラーレスポンスを出力
     */
    public static function error($code, $message, $httpStatus = 400)
    {
        http_response_code($httpStatus);
        echo json_encode([
            'status' => 'error',
            'error' => [
                'code' => $code,
                'message' => $message
            ]
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    /**
     * バリデーションエラーレスポンスを出力
     */
    public static function validationError($errors)
    {
        http_response_code(422);
        echo json_encode([
            'status' => 'error',
            'error' => [
                'code' => 'VALIDATION_ERROR',
                'message' => 'Validation failed',
                'details' => $errors
            ]
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    /**
     * レート制限エラーレスポンスを出力
     */
    public static function rateLimitError($retryAfter = 60)
    {
        http_response_code(429);
        header("Retry-After: $retryAfter");
        echo json_encode([
            'status' => 'error',
            'error' => [
                'code' => 'RATE_LIMIT_EXCEEDED',
                'message' => 'API request limit exceeded',
                'retry_after' => $retryAfter
            ]
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
}