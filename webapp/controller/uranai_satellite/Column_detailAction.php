<?php
require_once(MODEL.'front/controller/AbstractControllerClass.php');
require_once(MODEL.'front/uranai/ApiModelClass.php');

class Column_detailAction extends AbstractController{
	function __construct($controller='',$action='',&$session_data=array(),$device=''){
		$this->init($controller,$action,$session_data,$device);
	}
	
	function Execute($get_data=array(),&$session_data=array()){
		$disp_array = array();
		
		// 記事IDを取得
		$article_id = isset($get_data['id']) ? $get_data['id'] : '';
		
		if (empty($article_id)) {
			throw new Exception('404');
		}
		
		// column.csvから記事データを読み込む
		$articles = $this->loadArticles();
		$article = $this->findArticleById($articles, $article_id);
		
		if (!$article) {
			throw new Exception('404');
		}
		
		// マークダウンをHTMLに変換
		$article['content_html'] = $this->markdownToHtml($article['content']);
		
		// 公開日をフォーマット
		$article['formatted_post_date'] = $this->formatPostDate($article['post_date']);
		
		// 他の記事（関連記事）を取得
		$related_articles = $this->getRelatedArticles($articles, $article_id);
		
		$disp_array['article'] = $article;
		$disp_array['related_articles'] = $related_articles;
		
		$this->display($disp_array, 'column_detail');
	}
	
	function PostExecute($get_data=array(),$post_data=array(),$file_data=array(),&$session_data=array()){
		// POST処理が必要な場合はここに実装
	}
	
	private function loadArticles(){
		$articles = array();
		$csv_file = dirname(dirname(dirname(dirname(__FILE__)))) . '/column.csv';
		
		if (!file_exists($csv_file)) {
			return $articles;
		}
		
		$handle = fopen($csv_file, 'r');
		if ($handle === false) {
			return $articles;
		}
		
		// ヘッダー行をスキップ
		$header = fgetcsv($handle);
		
		$now = date('Y-m-d H:i:s');
		
		while (($data = fgetcsv($handle)) !== false) {
			if (count($data) >= 7) {
				$post_date = $data[5];
				
				// 公開日が空欄または未来の記事は除外
				if (empty($post_date) || $post_date > $now) {
					continue;
				}
				
				$articles[] = array(
					'id' => $data[0],
					'title' => $data[1],
					'seo_keywords' => $data[2],
					'summary' => $data[3],
					'content' => $data[4],
					'post_date' => $data[5],
					'created_date' => $data[6]
				);
			}
		}
		
		fclose($handle);
		
		return $articles;
	}
	
	private function findArticleById($articles, $article_id){
		foreach ($articles as $article) {
			if ($article['id'] == $article_id) {
				return $article;
			}
		}
		return null;
	}
	
	private function markdownToHtml($markdown){
		// マークダウン記法をHTMLに変換する改良版
		$html = $markdown;
		
		// markdownブロックを削除
		$html = preg_replace('/^```markdown\s*\n?/', '', $html);
		$html = preg_replace('/\n?```\s*$/', '', $html);
		
		// 行を配列に分割
		$lines = explode("\n", $html);
		$output = array();
		$in_paragraph = false;
		
		foreach ($lines as $line) {
			$line = trim($line);
			
			// 空行の処理
			if (empty($line)) {
				if ($in_paragraph) {
					$output[] = '</p>';
					$in_paragraph = false;
				}
				continue;
			}
			
			// 見出しの処理
			if (preg_match('/^### (.+)$/', $line, $matches)) {
				if ($in_paragraph) {
					$output[] = '</p>';
					$in_paragraph = false;
				}
				$output[] = '<h3>' . $matches[1] . '</h3>';
			} elseif (preg_match('/^## (.+)$/', $line, $matches)) {
				if ($in_paragraph) {
					$output[] = '</p>';
					$in_paragraph = false;
				}
				$output[] = '<h2>' . $matches[1] . '</h2>';
			} elseif (preg_match('/^# (.+)$/', $line, $matches)) {
				if ($in_paragraph) {
					$output[] = '</p>';
					$in_paragraph = false;
				}
				$output[] = '<h1>' . $matches[1] . '</h1>';
			} else {
				// 通常のテキスト行
				if (!$in_paragraph) {
					$output[] = '<p>';
					$in_paragraph = true;
				}
				$output[] = $line . '<br>';
			}
		}
		
		// 最後の段落を閉じる
		if ($in_paragraph) {
			$output[] = '</p>';
		}
		
		$html = implode("\n", $output);
		
		// 連続する<br>タグを整理
		$html = preg_replace('/<br>\s*<\/p>/', '</p>', $html);
		
		return $html;
	}
	
	private function getRelatedArticles($articles, $current_id, $limit = 5){
		$related = array();
		
		foreach ($articles as $article) {
			if ($article['id'] != $current_id) {
				$related[] = $article;
			}
		}
		
		// 投稿日時でソート（新しい順）
		usort($related, function($a, $b) {
			return strcmp($b['post_date'], $a['post_date']);
		});
		
		return array_slice($related, 0, $limit);
	}
	
	private function formatPostDate($post_date){
		if (empty($post_date)) {
			return '';
		}
		
		$timestamp = strtotime($post_date);
		if ($timestamp === false) {
			return '';
		}
		
		return date('Y年n月j日', $timestamp);
	}
}