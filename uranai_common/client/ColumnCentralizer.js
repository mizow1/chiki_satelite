/**
 * ColumnCentralizer - コラム機能中央化クライアントライブラリ
 * 外部APIとの通信を管理し、サイト固有の表示を処理
 */

class ColumnCentralizer {
    constructor() {
        this.config = {
            apiEndpoint: '',
            siteId: '',
            cacheExpiry: 3600,
            templates: {},
            errorTemplate: null,
            fallbackData: null
        };
        this.cache = new Map();
    }

    /**
     * ライブラリを初期化
     * @param {Object} config 設定オブジェクト
     */
    init(config) {
        this.config = Object.assign(this.config, config);
        
        // 必須設定の確認
        if (!this.config.apiEndpoint || !this.config.siteId) {
            throw new Error('apiEndpoint and siteId are required');
        }
        
        // キャッシュクリーンアップの設定
        this.setupCacheCleanup();
    }

    /**
     * コラム一覧を表示
     * @param {Object} options 表示オプション
     */
    async renderList(options = {}) {
        const defaultOptions = {
            container: '#column_list_container',
            page: 1,
            limit: 10,
            onSuccess: null,
            onError: null
        };
        
        const opts = Object.assign(defaultOptions, options);
        
        try {
            const data = await this.fetchColumnsList(opts.page, opts.limit);
            
            if (data) {
                this.renderTemplate(opts.container, this.config.templates.list, data);
                
                if (opts.onSuccess) {
                    opts.onSuccess(data);
                }
            }
        } catch (error) {
            this.handleError(error, opts.container, opts.onError);
        }
    }

    /**
     * コラム詳細を表示
     * @param {Object} options 表示オプション
     */
    async renderDetail(options = {}) {
        const defaultOptions = {
            container: '#column_detail_container',
            columnId: null,
            onSuccess: null,
            onError: null
        };
        
        const opts = Object.assign(defaultOptions, options);
        
        if (!opts.columnId) {
            this.handleError(new Error('Column ID is required'), opts.container, opts.onError);
            return;
        }
        
        try {
            const data = await this.fetchColumnDetail(opts.columnId);
            
            if (data) {
                this.renderTemplate(opts.container, this.config.templates.detail, data);
                
                if (opts.onSuccess) {
                    opts.onSuccess(data);
                }
            }
        } catch (error) {
            this.handleError(error, opts.container, opts.onError);
        }
    }

    /**
     * 最新コラムを表示
     * @param {Object} options 表示オプション
     */
    async renderLatest(options = {}) {
        const defaultOptions = {
            container: '#column_latest_container',
            limit: 4,
            onSuccess: null,
            onError: null
        };
        
        const opts = Object.assign(defaultOptions, options);
        
        try {
            const data = await this.fetchLatestColumns(opts.limit);
            
            if (data) {
                this.renderTemplate(opts.container, this.config.templates.latest, data);
                
                if (opts.onSuccess) {
                    opts.onSuccess(data);
                }
            }
        } catch (error) {
            this.handleError(error, opts.container, opts.onError);
        }
    }

    /**
     * コラム一覧データを取得
     * @param {number} page ページ番号
     * @param {number} limit 1ページあたりの件数
     * @param {string} sort ソート順
     * @returns {Promise<Object>} コラムデータ
     */
    async fetchColumnsList(page = 1, limit = 10, sort = 'post_date_desc') {
        const cacheKey = `columns_list_${page}_${limit}_${sort}`;
        
        // キャッシュから取得を試行
        const cachedData = this.getFromCache(cacheKey);
        if (cachedData) {
            return cachedData;
        }
        
        const url = `${this.config.apiEndpoint}/columns?site_id=${this.config.siteId}&page=${page}&limit=${limit}&sort=${sort}`;
        
        try {
            const response = await this.makeRequest(url);
            
            if (response.status === 'success') {
                this.setCache(cacheKey, response.data);
                return response.data;
            } else {
                throw new Error(response.error?.message || 'API request failed');
            }
        } catch (error) {
            // フォールバック処理
            return this.handleApiFallback('list', error);
        }
    }

    /**
     * コラム詳細データを取得
     * @param {string|number} columnId コラムID
     * @returns {Promise<Object>} コラムデータ
     */
    async fetchColumnDetail(columnId) {
        const cacheKey = `column_detail_${columnId}`;
        
        // キャッシュから取得を試行
        const cachedData = this.getFromCache(cacheKey);
        if (cachedData) {
            return cachedData;
        }
        
        const url = `${this.config.apiEndpoint}/columns/${columnId}?site_id=${this.config.siteId}`;
        
        try {
            const response = await this.makeRequest(url);
            
            if (response.status === 'success') {
                this.setCache(cacheKey, response.data);
                return response.data;
            } else {
                throw new Error(response.error?.message || 'API request failed');
            }
        } catch (error) {
            // フォールバック処理
            return this.handleApiFallback('detail', error, columnId);
        }
    }

    /**
     * 最新コラムデータを取得
     * @param {number} limit 取得件数
     * @returns {Promise<Object>} コラムデータ
     */
    async fetchLatestColumns(limit = 4) {
        const cacheKey = `columns_latest_${limit}`;
        
        // キャッシュから取得を試行
        const cachedData = this.getFromCache(cacheKey);
        if (cachedData) {
            return cachedData;
        }
        
        const url = `${this.config.apiEndpoint}/columns/latest?site_id=${this.config.siteId}&limit=${limit}`;
        
        try {
            const response = await this.makeRequest(url);
            
            if (response.status === 'success') {
                this.setCache(cacheKey, response.data);
                return response.data;
            } else {
                throw new Error(response.error?.message || 'API request failed');
            }
        } catch (error) {
            // フォールバック処理
            return this.handleApiFallback('latest', error, limit);
        }
    }

    /**
     * HTTP リクエストを実行
     * @param {string} url リクエストURL
     * @returns {Promise<Object>} レスポンスデータ
     */
    async makeRequest(url) {
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }
        
        return await response.json();
    }

    /**
     * テンプレートを使用してHTMLをレンダリング
     * @param {string} container コンテナセレクタ
     * @param {string} templateId テンプレートID
     * @param {Object} data テンプレートデータ
     */
    renderTemplate(container, templateId, data) {
        const containerElement = document.querySelector(container);
        if (!containerElement) {
            console.error(`Container not found: ${container}`);
            return;
        }
        
        // テンプレート要素を取得
        const templateElement = document.getElementById(templateId);
        if (!templateElement) {
            console.error(`Template not found: ${templateId}`);
            containerElement.innerHTML = '<p>テンプレートが見つかりません</p>';
            return;
        }
        
        let html = templateElement.innerHTML;
        
        // テンプレート変数を置換
        html = this.processTemplate(html, data);
        
        containerElement.innerHTML = html;
    }

    /**
     * テンプレート変数を処理
     * @param {string} template テンプレート文字列
     * @param {Object} data データオブジェクト
     * @returns {string} 処理済みHTML
     */
    processTemplate(template, data) {
        // 単純な変数置換
        let processed = template.replace(/\{\{(\w+)\}\}/g, (match, key) => {
            return data[key] || '';
        });
        
        // ループ処理 {{#each items}}...{{/each}}
        processed = processed.replace(/\{\{#each\s+(\w+)\}\}([\s\S]*?)\{\{\/each\}\}/g, (match, arrayKey, itemTemplate) => {
            const items = data[arrayKey];
            if (!Array.isArray(items)) {
                return '';
            }
            
            return items.map(item => {
                return itemTemplate.replace(/\{\{(\w+)\}\}/g, (itemMatch, itemKey) => {
                    return item[itemKey] || '';
                });
            }).join('');
        });
        
        return processed;
    }

    /**
     * エラーハンドリング
     * @param {Error} error エラーオブジェクト
     * @param {string} container コンテナセレクタ
     * @param {Function} onError エラーコールバック
     */
    handleError(error, container, onError) {
        console.error('ColumnCentralizer Error:', error);
        
        // エラーテンプレートを表示
        if (this.config.errorTemplate) {
            const containerElement = document.querySelector(container);
            if (containerElement) {
                const errorTemplate = document.getElementById(this.config.errorTemplate);
                if (errorTemplate) {
                    containerElement.innerHTML = errorTemplate.innerHTML;
                } else {
                    containerElement.innerHTML = '<p>エラーが発生しました</p>';
                }
            }
        }
        
        if (onError) {
            onError(error);
        }
    }

    /**
     * API障害時のフォールバック処理
     * @param {string} type リクエストタイプ
     * @param {Error} error エラーオブジェクト
     * @param {any} param 追加パラメータ
     * @returns {Object|null} フォールバックデータ
     */
    handleApiFallback(type, error, param = null) {
        console.warn(`API fallback activated for ${type}:`, error.message);
        
        // フォールバックデータがある場合は使用
        if (this.config.fallbackData && this.config.fallbackData[type]) {
            return this.config.fallbackData[type];
        }
        
        return null;
    }

    /**
     * キャッシュからデータを取得
     * @param {string} key キャッシュキー
     * @returns {Object|null} キャッシュデータ
     */
    getFromCache(key) {
        const cached = this.cache.get(key);
        if (!cached) {
            return null;
        }
        
        if (Date.now() > cached.expires) {
            this.cache.delete(key);
            return null;
        }
        
        return cached.data;
    }

    /**
     * データをキャッシュに保存
     * @param {string} key キャッシュキー
     * @param {Object} data データ
     */
    setCache(key, data) {
        this.cache.set(key, {
            data: data,
            expires: Date.now() + (this.config.cacheExpiry * 1000)
        });
    }

    /**
     * キャッシュクリーンアップの設定
     */
    setupCacheCleanup() {
        // 1時間ごとに期限切れキャッシュをクリア
        setInterval(() => {
            this.cleanExpiredCache();
        }, 3600000);
    }

    /**
     * 期限切れキャッシュをクリア
     */
    cleanExpiredCache() {
        const now = Date.now();
        for (const [key, value] of this.cache.entries()) {
            if (now > value.expires) {
                this.cache.delete(key);
            }
        }
    }

    /**
     * 全キャッシュをクリア
     */
    clearCache() {
        this.cache.clear();
    }
}

// グローバルインスタンスを作成
window.ColumnCentralizer = new ColumnCentralizer();