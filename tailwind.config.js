/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./templates/**/*.php",
    "./assets/js/**/*.js",      // 必要なら JavaScript ファイルも含める
  ],
  theme: {
    extend: {
      fontSize: {
        10: "10px",
        11: "11px",
        12: "12px",
        13: "13px",
        14: "14px",
        15: "15px",
        16: "16px",
        18: "18px",
        20: "20px",
        22: "22px",
        24: "24px",
        26: "26px",
        32: "32px",
        36: "36px",
        40: "40px",
      },
    },
    screens: {
      sm: '640px', // 既存のもの
      md: '768px', // 既存のもの
      max768: { max: '768px' }, // max-width: 768px のカスタムブレークポイント
    },
  },
  plugins: [],
}

