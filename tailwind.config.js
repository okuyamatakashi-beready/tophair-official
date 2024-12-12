/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",             // テーマのルートにある PHP ファイル
    "./**/*.php",          // サブフォルダ内の PHP ファイル
    "./scss/**/*.css",     // SCSS フォルダ内の CSS ファイル
    "./js/**/*.js",        // 必要なら JavaScript ファイルも含める
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

