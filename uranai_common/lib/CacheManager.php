<?php
/**
 * キャッシュ管理クラス
 * ファイルベースのキャッシュシステム
 */

class CacheManager
{
    private $cacheDir;
    
    public function __construct()
    {
        $this->cacheDir = CACHE_DIR;
        
        // キャッシュディレクトリが存在しない場合は作成
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0755, true);
        }
    }
    
    /**
     * キャッシュからデータを取得
     */
    public function get($key)
    {
        $filePath = $this->getCacheFilePath($key);
        
        if (!file_exists($filePath)) {
            return null;
        }
        
        $cacheData = file_get_contents($filePath);
        $data = unserialize($cacheData);
        
        // 有効期限チェック
        if ($data['expires'] < time()) {
            $this->delete($key);
            return null;
        }
        
        return $data['content'];
    }
    
    /**
     * データをキャッシュに保存
     */
    public function set($key, $data, $expiry = 3600)
    {
        $filePath = $this->getCacheFilePath($key);
        
        $cacheData = [
            'content' => $data,
            'expires' => time() + $expiry,
            'created' => time()
        ];
        
        file_put_contents($filePath, serialize($cacheData), LOCK_EX);
    }
    
    /**
     * キャッシュからデータを削除
     */
    public function delete($key)
    {
        $filePath = $this->getCacheFilePath($key);
        
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
    
    /**
     * 全キャッシュをクリア
     */
    public function clear()
    {
        $files = glob($this->cacheDir . '*.cache');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
    
    /**
     * 期限切れキャッシュをクリア
     */
    public function clearExpired()
    {
        $files = glob($this->cacheDir . '*.cache');
        $now = time();
        
        foreach ($files as $file) {
            if (is_file($file)) {
                $cacheData = file_get_contents($file);
                $data = unserialize($cacheData);
                
                if ($data['expires'] < $now) {
                    unlink($file);
                }
            }
        }
    }
    
    /**
     * キャッシュファイルパスを生成
     */
    private function getCacheFilePath($key)
    {
        $hashedKey = md5($key);
        return $this->cacheDir . $hashedKey . '.cache';
    }
    
    /**
     * キャッシュ統計を取得
     */
    public function getStats()
    {
        $files = glob($this->cacheDir . '*.cache');
        $totalFiles = count($files);
        $totalSize = 0;
        $expiredCount = 0;
        $now = time();
        
        foreach ($files as $file) {
            if (is_file($file)) {
                $totalSize += filesize($file);
                
                $cacheData = file_get_contents($file);
                $data = unserialize($cacheData);
                
                if ($data['expires'] < $now) {
                    $expiredCount++;
                }
            }
        }
        
        return [
            'total_files' => $totalFiles,
            'total_size' => $totalSize,
            'expired_count' => $expiredCount
        ];
    }
}