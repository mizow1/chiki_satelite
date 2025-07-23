# コラム機能 実装ドキュメント

## 概要
算命学サテライトサイトにコラム記事の表示機能を実装。コラム一覧、詳細表示、およびトップページでの最新記事表示機能を提供。

## ファイル構成

### 1. コントローラー（PHP）

#### `webapp/controller/uranai_satellite/ColumnAction.php`
- **役割**: コラム一覧ページの処理
- **主要機能**:
  - column.csvからコラム記事データを読み込み
  - ページネーション処理（1ページ50件）
  - 公開日が未来の記事は除外
  - 投稿日時順でソート（新しい順）
  - テンプレート: `column_list`

#### `webapp/controller/uranai_satellite/Column_detailAction.php`
- **役割**: コラム詳細ページの処理
- **主要機能**:
  - 記事IDで特定記事を取得
  - マークダウンをHTMLに変換
  - 関連記事を5件取得
  - テンプレート: `column_detail`

#### `webapp/controller/uranai_satellite/TopAction.php`
- **役割**: トップページでのコラム最新4件表示
- **追加機能**:
  - `getLatestColumns()`: 最新4件取得メソッド
  - `formatPostDate()`: 日付フォーマット処理
  - `$disp_array['latest_columns']`: テンプレート変数に設定

### 2. ビューファイル（HTML/Smarty）

#### `webapp/view/index/default_pc/column_list.html`
- **役割**: コラム一覧ページのテンプレート
- **表示内容**:
  - ページタイトル
  - 記事総数表示
  - 記事一覧（タイトル、公開日、概要、キーワード）
  - ページネーション
  - CSS付き

#### `webapp/view/index/default_pc/column_detail.html`
- **役割**: コラム詳細ページのテンプレート
- **表示内容**:
  - 記事タイトル
  - 公開日
  - 記事本文（マークダウン→HTML変換済み）
  - 関連記事リンク

#### `webapp/view/index/default_pc/preview_rakuten.html`
- **役割**: トップページテンプレート（コラム表示機能追加）
- **追加箇所**: class="ow_new"とclass="ow_special"の間
- **表示内容**:
  - 最新コラム4件
  - 各記事の公開日、タイトル、概要、キーワード
  - コラム一覧へのリンク
  - 専用CSS付き

### 3. データファイル

#### `column.csv`
- **場所**: プロジェクトルート
- **構造**:
  ```
  id,title,seo_keywords,summary,content,post_date,created_date
  1,記事タイトル,キーワード1,記事概要,マークダウン本文,2024-01-01 10:00:00,2024-01-01 09:00:00
  ```
- **フィールド説明**:
  - `id`: 記事ID（ユニーク）
  - `title`: 記事タイトル
  - `seo_keywords`: SEOキーワード
  - `summary`: 記事概要
  - `content`: 記事本文（マークダウン形式）
  - `post_date`: 公開日時（空欄または未来日時は非表示）
  - `created_date`: 作成日時

## URL構造

### コラム関連URL
- **コラム一覧**: `/column/` または `/column/?page=2`
- **コラム詳細**: `/column/記事ID/` （例: `/column/1/`）
- **トップページ**: `/` （最新4件表示）

## 主要処理フロー

### 1. コラム一覧表示
1. `ColumnAction::Execute()` 実行
2. `loadArticles()` でCSVデータ読み込み
3. 公開日チェック（未来日は除外）
4. ページネーション処理
5. テンプレートに渡してHTML出力

### 2. コラム詳細表示
1. `Column_detailAction::Execute()` 実行
2. URLパラメータから記事ID取得
3. `findArticleById()` で該当記事検索
4. `markdownToHtml()` でマークダウン変換
5. `getRelatedArticles()` で関連記事取得
6. テンプレートに渡してHTML出力

### 3. トップページでの最新記事表示
1. `TopAction::Execute()` 実行
2. `getLatestColumns(4)` で最新4件取得
3. `$disp_array['latest_columns']` に設定
4. テンプレートで条件分岐表示

## CSS設計

### スタイル定義場所
- **コラム一覧ページ**: `column_list.html` 内の `<style>` タグ
- **トップページ**: `preview_rakuten.html` 内の `<style>` タグ

### 主要CSSクラス
- `.ow_column_list`: コラムセクション全体
- `.ow_column_list_title`: セクションタイトル
- `.ow_column_articles`: 記事リスト container
- `.ow_column_article_item`: 個別記事アイテム
- `.ow_column_article_title`: 記事タイトル
- `.ow_column_article_meta`: メタ情報（公開日）
- `.ow_column_article_summary`: 記事概要
- `.ow_column_article_keywords`: キーワード表示
- `.ow_column_read_more`: 続きを読むボタン
- `.ow_column_more_link_btn`: 一覧を見るボタン

## 機能仕様

### 公開制御
- `post_date` が空欄または未来日時の記事は非表示
- `date('Y-m-d H:i:s')` と比較して判定

### ソート順
- 投稿日時の降順（新しい記事が上）
- `usort()` で `post_date` フィールドを比較

### ページネーション
- 1ページあたり50件表示
- 総ページ数、現在ページ、記事総数を表示

### マークダウン変換
- 見出し（#, ##, ###）→ HTML の h1, h2, h3
- 段落の自動生成
- 改行の `<br>` 変換
- ```markdown ブロックの除去

### URL形式統一
- コラム詳細: `/column/ID/` 形式で統一
- 相対パス使用でベースURL非依存

## 開発・運用注意点

### CSVファイル管理
- 文字エンコーディング: UTF-8
- 改行コード: LF推奨
- カンマを含む場合はダブルクォートで囲む
- 記事ID の重複禁止

### セキュリティ
- CSVデータの入力値検証
- HTMLエスケープ処理
- ファイルの存在確認とエラーハンドリング

### パフォーマンス
- CSVファイルサイズが大きくなった場合の対策検討
- キャッシュ機能の実装検討
- データベース化の検討

## 今後の拡張可能性

### 機能拡張案
- カテゴリ別表示
- タグ機能
- 検索機能
- RSS/Atom フィード
- コメント機能
- いいね機能

### 技術的改善案
- データベース化（MySQL等）
- 管理画面の実装
- 画像アップロード機能
- リッチテキストエディタ対応
- API化（JSON出力）