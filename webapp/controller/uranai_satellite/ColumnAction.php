<?php
require_once(MODEL.'front/controller/AbstractControllerClass.php');
require_once(MODEL.'front/uranai/ApiModelClass.php');

class ColumnAction extends AbstractController{
	function __construct($controller='',$action='',&$session_data=array(),$device=''){
		$this->init($controller,$action,$session_data,$device);
	}
	
	function Execute($get_data=array(),&$session_data=array()){
		$disp_array = array();
		
		// デバッグ情報を追加
		error_log("ColumnAction::Execute called");
		
		// chiki.csvから記事データを読み込む
		$articles = $this->loadArticles();
		error_log("Loaded articles count: " . count($articles));
		
		// ページネーション処理
		$page = isset($get_data['page']) ? (int)$get_data['page'] : 1;
		$per_page = 50;
		$total_articles = count($articles);
		$total_pages = ceil($total_articles / $per_page);
		
		$offset = ($page - 1) * $per_page;
		$page_articles = array_slice($articles, $offset, $per_page);
		
		$disp_array['articles'] = $page_articles;
		$disp_array['current_page'] = $page;
		$disp_array['total_pages'] = $total_pages;
		$disp_array['total_articles'] = $total_articles;
		
		error_log("Template data prepared, calling display");
		$this->display($disp_array, 'column_list');
	}
	
	function PostExecute($get_data=array(),$post_data=array(),$file_data=array(),&$session_data=array()){
		// POST処理が必要な場合はここに実装
	}
	
	private function loadArticles(){
		$articles = array();
		$csv_file = dirname(dirname(dirname(dirname(__FILE__)))) . '/chiki.csv';
		
		if (!file_exists($csv_file)) {
			return $articles;
		}
		
		$handle = fopen($csv_file, 'r');
		if ($handle === false) {
			return $articles;
		}
		
		// ヘッダー行をスキップ
		$header = fgetcsv($handle);
		
		while (($data = fgetcsv($handle)) !== false) {
			if (count($data) >= 7) {
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
		
		// 投稿日時でソート（新しい順）
		usort($articles, function($a, $b) {
			return strcmp($b['post_date'], $a['post_date']);
		});
		
		return $articles;
	}
}