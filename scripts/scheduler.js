/**
 * 1時間ごとにスプレッドシートの内容をHTMLファイルに反映するスケジューラー
 */

const cron = require('node-cron');
const { exec } = require('child_process');
const path = require('path');

// スクリプトのパス
const SCRIPT_PATH = path.join(__dirname, 'update_lead_content.js');

console.log('スケジューラーを開始しました。');
console.log('1時間ごとに更新スクリプトを実行します。');
console.log(`実行するスクリプト: ${SCRIPT_PATH}`);

// 現在時刻を表示
console.log(`開始時刻: ${new Date().toLocaleString()}`);

// 初回実行
runScript();

// 1時間ごとに実行するスケジュール設定（毎時0分に実行）
cron.schedule('0 * * * *', () => {
  console.log(`スケジュール実行時刻: ${new Date().toLocaleString()}`);
  runScript();
});

/**
 * スクリプトを実行する関数
 */
function runScript() {
  console.log('更新スクリプトを実行します...');
  
  exec(`node "${SCRIPT_PATH}"`, (error, stdout, stderr) => {
    if (error) {
      console.error(`実行エラー: ${error.message}`);
      return;
    }
    
    if (stderr) {
      console.error(`標準エラー: ${stderr}`);
      return;
    }
    
    console.log('スクリプト実行結果:');
    console.log(stdout);
    console.log('更新が完了しました。');
  });
}
