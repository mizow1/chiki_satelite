/**
 * Google APIの認証情報をセットアップするスクリプト
 */

const fs = require('fs');
const readline = require('readline');
const { google } = require('googleapis');
const path = require('path');

// 必要なスコープ
const SCOPES = ['https://www.googleapis.com/auth/spreadsheets.readonly'];
// 認証情報ファイルのパス
const CREDENTIALS_PATH = path.join(__dirname, 'credentials.json');
// トークンファイルのパス
const TOKEN_PATH = path.join(__dirname, 'token.json');

/**
 * 認証情報を取得し、トークンを生成する
 */
async function authorize() {
  try {
    // 認証情報ファイルが存在するか確認
    if (!fs.existsSync(CREDENTIALS_PATH)) {
      console.error('認証情報ファイルが見つかりません。Google Cloud Consoleから認証情報をダウンロードして、credentials.jsonとして保存してください。');
      console.error('手順: https://developers.google.com/sheets/api/quickstart/nodejs#set_up_your_environment');
      process.exit(1);
    }

    // 認証情報を読み込む
    const content = fs.readFileSync(CREDENTIALS_PATH, 'utf8');
    const credentials = JSON.parse(content);
    const { client_secret, client_id, redirect_uris } = credentials.installed;
    const oAuth2Client = new google.auth.OAuth2(client_id, client_secret, redirect_uris[0]);

    // トークンファイルが存在するか確認
    if (fs.existsSync(TOKEN_PATH)) {
      const token = fs.readFileSync(TOKEN_PATH, 'utf8');
      oAuth2Client.setCredentials(JSON.parse(token));
      console.log('既存のトークンを読み込みました。');
      return oAuth2Client;
    }

    // 新しいトークンを取得
    return getNewToken(oAuth2Client);
  } catch (error) {
    console.error('認証処理中にエラーが発生しました:', error);
    process.exit(1);
  }
}

/**
 * 新しいトークンを取得し、保存する
 * @param {google.auth.OAuth2} oAuth2Client - OAuth2クライアント
 */
async function getNewToken(oAuth2Client) {
  const authUrl = oAuth2Client.generateAuthUrl({
    access_type: 'offline',
    scope: SCOPES,
  });

  console.log('以下のURLにアクセスして認証を行ってください:');
  console.log(authUrl);

  const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
  });

  return new Promise((resolve, reject) => {
    rl.question('認証コードを入力してください: ', async (code) => {
      rl.close();
      try {
        const { tokens } = await oAuth2Client.getToken(code);
        oAuth2Client.setCredentials(tokens);
        
        // トークンをファイルに保存
        fs.writeFileSync(TOKEN_PATH, JSON.stringify(tokens));
        console.log('トークンを保存しました:', TOKEN_PATH);
        
        resolve(oAuth2Client);
      } catch (error) {
        console.error('トークンの取得中にエラーが発生しました:', error);
        reject(error);
      }
    });
  });
}

/**
 * スプレッドシートにアクセスできるか確認する
 * @param {google.auth.OAuth2} auth - 認証済みのOAuth2クライアント
 */
async function testAccess(auth) {
  try {
    const sheets = google.sheets({ version: 'v4', auth });
    
    // スプレッドシートIDの入力を求める
    const rl = readline.createInterface({
      input: process.stdin,
      output: process.stdout,
    });

    return new Promise((resolve, reject) => {
      rl.question('テスト用のスプレッドシートIDを入力してください: ', async (spreadsheetId) => {
        rl.close();
        try {
          // スプレッドシートのプロパティを取得
          const response = await sheets.spreadsheets.get({
            spreadsheetId,
          });
          
          console.log('スプレッドシートへのアクセスに成功しました:');
          console.log(`タイトル: ${response.data.properties.title}`);
          console.log(`シート数: ${response.data.sheets.length}`);
          
          // シート名を表示
          console.log('シート名:');
          response.data.sheets.forEach((sheet, index) => {
            console.log(`${index + 1}. ${sheet.properties.title}`);
          });
          
          resolve(true);
        } catch (error) {
          console.error('スプレッドシートへのアクセスに失敗しました:', error);
          reject(error);
        }
      });
    });
  } catch (error) {
    console.error('テスト中にエラーが発生しました:', error);
    return false;
  }
}

/**
 * メイン関数
 */
async function main() {
  try {
    console.log('Google API認証のセットアップを開始します...');
    
    // 認証
    const auth = await authorize();
    
    // アクセステスト
    await testAccess(auth);
    
    console.log('セットアップが完了しました。update_lead_content.jsを実行できます。');
  } catch (error) {
    console.error('セットアップ中にエラーが発生しました:', error);
  }
}

// スクリプト実行
main();
