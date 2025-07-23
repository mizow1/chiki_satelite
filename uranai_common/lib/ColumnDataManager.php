<?php
/**
 * コラムデータ管理クラス
 * CSVからのデータ読み込みと処理を担当
 */

require_once __DIR__ . '/MarkdownParser.php';

class ColumnDataManager
{
    private $csvPath;
    private $markdownParser;
    
    public function __construct()
    {
        $this->csvPath = COLUMN_CSV_PATH;
        $this->markdownParser = new MarkdownParser();
    }
    
    /**
     * コラム一覧を取得
     */
    public function getColumnsList($page, $limit, $sort, $siteId)
    {
        $columns = $this->loadColumnsFromCsv();
        
        // 公開日フィルタリング（未来の記事は非表示）
        $columns = $this->filterPublishedColumns($columns);
        
        // ソート処理
        $columns = $this->sortColumns($columns, $sort);
        
        // 総件数
        $total = count($columns);
        
        // ページネーション
        $offset = ($page - 1) * $limit;
        $pagedColumns = array_slice($columns, $offset, $limit);
        
        // レスポンス用にフォーマット
        $formattedColumns = [];
        foreach ($pagedColumns as $column) {
            $formattedColumns[] = [
                'id' => $column['id'],
                'title' => $column['title'],
                'seo_keywords' => $column['seo_keywords'],
                'summary' => $column['summary'],
                'post_date' => $column['post_date'],
                'url' => "/column/{$column['id']}/"
            ];
        }
        
        return [
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'columns' => $formattedColumns
        ];
    }
    
    /**
     * コラム詳細を取得
     */
    public function getColumnDetail($columnId, $siteId)
    {
        $columns = $this->loadColumnsFromCsv();
        
        // 指定されたIDの記事を検索
        $targetColumn = null;
        foreach ($columns as $column) {
            if ($column['id'] == $columnId) {
                $targetColumn = $column;
                break;
            }
        }
        
        if (!$targetColumn) {
            return null;
        }
        
        // 公開日チェック
        if (!$this->isPublished($targetColumn)) {
            return null;
        }
        
        // マークダウンからHTMLに変換
        $htmlContent = $this->markdownParser->parse($targetColumn['content']);
        
        // 関連記事を取得
        $relatedColumns = $this->getRelatedColumns($columnId, 5);
        
        return [
            'id' => $targetColumn['id'],
            'title' => $targetColumn['title'],
            'seo_keywords' => $targetColumn['seo_keywords'],
            'summary' => $targetColumn['summary'],
            'content' => $htmlContent,
            'post_date' => $targetColumn['post_date'],
            'related_columns' => $relatedColumns
        ];
    }
    
    /**
     * 最新コラムを取得
     */
    public function getLatestColumns($limit, $siteId)
    {
        $columns = $this->loadColumnsFromCsv();
        
        // 公開日フィルタリング
        $columns = $this->filterPublishedColumns($columns);
        
        // 投稿日時でソート（新しい順）
        $columns = $this->sortColumns($columns, 'post_date_desc');
        
        // 指定件数で制限
        $latestColumns = array_slice($columns, 0, $limit);
        
        // レスポンス用にフォーマット
        $formattedColumns = [];
        foreach ($latestColumns as $column) {
            $formattedColumns[] = [
                'id' => $column['id'],
                'title' => $column['title'],
                'summary' => $column['summary'],
                'post_date' => $column['post_date'],
                'url' => "/column/{$column['id']}/"
            ];
        }
        
        return [
            'columns' => $formattedColumns
        ];
    }
    
    /**
     * CSVファイルからコラムデータを読み込み
     */
    private function loadColumnsFromCsv()
    {
        if (!file_exists($this->csvPath)) {
            throw new Exception('Column CSV file not found');
        }
        
        $columns = [];
        $handle = fopen($this->csvPath, 'r');
        
        if ($handle !== false) {
            // ヘッダー行をスキップ
            fgetcsv($handle);
            
            while (($data = fgetcsv($handle)) !== false) {
                if (count($data) >= 7) {
                    $columns[] = [
                        'id' => $data[0],
                        'title' => $data[1],
                        'seo_keywords' => $data[2],
                        'summary' => $data[3],
                        'content' => $data[4],
                        'post_date' => $data[5],
                        'created_date' => $data[6]
                    ];
                }
            }
            fclose($handle);
        }
        
        return $columns;
    }
    
    /**
     * 公開済み記事のフィルタリング
     */
    private function filterPublishedColumns($columns)
    {
        $now = new DateTime();
        $publishedColumns = [];
        
        foreach ($columns as $column) {
            if ($this->isPublished($column)) {
                $publishedColumns[] = $column;
            }
        }
        
        return $publishedColumns;
    }
    
    /**
     * 記事が公開されているかチェック
     */
    private function isPublished($column)
    {
        $now = new DateTime();
        $postDate = new DateTime($column['post_date']);
        return $postDate <= $now;
    }
    
    /**
     * コラムのソート処理
     */
    private function sortColumns($columns, $sort)
    {
        switch ($sort) {
            case 'post_date_desc':
            default:
                usort($columns, function($a, $b) {
                    return strtotime($b['post_date']) - strtotime($a['post_date']);
                });
                break;
            case 'post_date_asc':
                usort($columns, function($a, $b) {
                    return strtotime($a['post_date']) - strtotime($b['post_date']);
                });
                break;
            case 'title_asc':
                usort($columns, function($a, $b) {
                    return strcmp($a['title'], $b['title']);
                });
                break;
        }
        
        return $columns;
    }
    
    /**
     * 関連記事を取得
     */
    private function getRelatedColumns($excludeId, $limit)
    {
        $columns = $this->loadColumnsFromCsv();
        $columns = $this->filterPublishedColumns($columns);
        $columns = $this->sortColumns($columns, 'post_date_desc');
        
        // 指定されたIDの記事を除外
        $relatedColumns = [];
        foreach ($columns as $column) {
            if ($column['id'] != $excludeId) {
                $relatedColumns[] = [
                    'id' => $column['id'],
                    'title' => $column['title'],
                    'url' => "/column/{$column['id']}/"
                ];
                
                if (count($relatedColumns) >= $limit) {
                    break;
                }
            }
        }
        
        return $relatedColumns;
    }
}