/**
 * スプレッドシートのデータを読み取り、指定されたURLのHTMLファイルの.lead要素に内容を反映するスクリプト
 * Node.jsで実行するためのコード
 */

const fs = require('fs');
const { google } = require('googleapis');
const path = require('path');

// 設定
const CONFIG = {
  // スプレッドシートのID - 実際のスプレッドシートIDに置き換えてください
  spreadsheetId: '実際のスプレッドシートIDをここに入力',
  // シート名 - 実際のシート名に置き換えてください
  sheetName: 'Sheet1',
  // サイトのルートパス
  siteRootPath: 'c:/Users/OW/Dropbox/disk2とローカルの同期/溝口/miz/chiki/satelite',
  // Google APIの認証情報ファイルパス
  credentialsPath: path.join(__dirname, 'credentials.json'),
  // トークンファイルパス
  tokenPath: path.join(__dirname, 'token.json')
};

/**
 * Google Sheetsから認証とデータ取得を行う
 */
async function getSpreadsheetData() {
  try {
    // 認証情報を読み込む
    const credentials = JSON.parse(fs.readFileSync(CONFIG.credentialsPath, 'utf8'));
    const { client_secret, client_id, redirect_uris } = credentials.installed;
    
    const oAuth2Client = new google.auth.OAuth2(client_id, client_secret, redirect_uris[0]);
    
    // トークンを読み込む
    const token = JSON.parse(fs.readFileSync(CONFIG.tokenPath, 'utf8'));
    oAuth2Client.setCredentials(token);
    
    // スプレッドシートからデータを取得
    const sheets = google.sheets({ version: 'v4', auth: oAuth2Client });
    const response = await sheets.spreadsheets.values.get({
      spreadsheetId: CONFIG.spreadsheetId,
      range: `${CONFIG.sheetName}!B2:K`
    });
    
    return response.data.values || [];
  } catch (error) {
    console.error('スプレッドシートデータの取得中にエラーが発生しました:', error);
    throw error;
  }
}

/**
 * HTMLファイルを更新する関数
 * @param {string} url - 更新対象のURL
 * @param {string} leadContent - .lead要素に設定する内容
 */
function updateHtmlFile(url, leadContent) {
  try {
    // HTMLファイルのパスを構築
    const htmlFilePath = path.join(CONFIG.siteRootPath, 'webapp', 'view', 'index', 'default_pc', 'entry.html');
    
    // ファイルからHTMLを読み込む
    let htmlContent = fs.readFileSync(htmlFilePath, 'utf8');
    
    // .lead要素の内容を更新
    const leadRegex = /(<div class="lead">)[\s\S]*?(<\/div>)/;
    const updatedHtml = htmlContent.replace(leadRegex, `$1\n\t\t\t${leadContent}\n\t\t$2`);
    
    // 更新したHTMLをファイルに書き込む
    fs.writeFileSync(htmlFilePath, updatedHtml, 'utf8');
    
    console.log(`${url} の.lead要素を更新しました。`);
    return true;
  } catch (error) {
    console.error(`HTMLファイルの更新中にエラーが発生しました: ${error.message}`);
    return false;
  }
}

/**
 * メイン関数 - スプレッドシートからデータを読み取り、HTMLファイルを更新する
 */
async function main() {
  try {
    console.log('スプレッドシートからデータを取得しています...');
    const data = await getSpreadsheetData();
    
    console.log(`${data.length}行のデータを取得しました。処理を開始します...`);
    
    // 各行のデータを処理
    for (const row of data) {
      const url = row[0]; // B列のURL
      const leadContent = row[9]; // K列の内容
      
      // URLが指定のパターンを含むか確認
      if (url && url.includes('https://fuyutsukichiki-sanmei.com/web/?menu=')) {
        console.log(`処理中: ${url}`);
        // HTMLファイルを更新
        updateHtmlFile(url, leadContent);
      }
    }
    
    console.log('すべての更新が完了しました。');
  } catch (error) {
    console.error('エラーが発生しました:', error);
  }
}

// スクリプト実行
main();
