<?php
/**
 * マークダウンパーサークラス
 * 既存のMarkdown処理ロジックを移植
 */

class MarkdownParser
{
    /**
     * マークダウンをHTMLに変換
     * 既存の処理ロジックを参考に実装
     */
    public function parse($markdown)
    {
        if (empty($markdown)) {
            return '';
        }
        
        // 基本的なマークダウン変換処理
        $html = $markdown;
        
        // 見出し（## タイトル）
        $html = preg_replace('/^##\s+(.+)$/m', '<h2>$1</h2>', $html);
        
        // 見出し（### タイトル）
        $html = preg_replace('/^###\s+(.+)$/m', '<h3>$1</h3>', $html);
        
        // 太字（**テキスト**）
        $html = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $html);
        
        // 斜体（*テキスト*）
        $html = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $html);
        
        // リンク（[テキスト](URL)）
        $html = preg_replace('/\[([^\]]+)\]\(([^)]+)\)/', '<a href="$2">$1</a>', $html);
        
        // リスト項目（- アイテム）
        $html = preg_replace('/^-\s+(.+)$/m', '<li>$1</li>', $html);
        
        // リストをulタグで囲む
        $html = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $html);
        
        // 改行処理
        $html = nl2br($html);
        
        // 段落処理（空行で区切られた部分を<p>タグで囲む）
        $paragraphs = preg_split('/\n\s*\n/', trim($html));
        $processedParagraphs = [];
        
        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if (!empty($paragraph)) {
                // 既にHTMLタグで始まっている場合はそのまま
                if (preg_match('/^<(h[1-6]|ul|ol|blockquote)/', $paragraph)) {
                    $processedParagraphs[] = $paragraph;
                } else {
                    $processedParagraphs[] = '<p>' . $paragraph . '</p>';
                }
            }
        }
        
        return implode("\n\n", $processedParagraphs);
    }
    
    /**
     * マークダウンからプレーンテキストを抽出
     */
    public function toPlainText($markdown)
    {
        // マークダウン記法を除去
        $text = preg_replace('/#{1,6}\s*/', '', $markdown);
        $text = preg_replace('/\*\*(.+?)\*\*/', '$1', $text);
        $text = preg_replace('/\*(.+?)\*/', '$1', $text);
        $text = preg_replace('/\[([^\]]+)\]\([^)]+\)/', '$1', $text);
        $text = preg_replace('/^-\s+/m', '', $text);
        
        return trim($text);
    }
}