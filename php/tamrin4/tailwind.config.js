module.exports = {
  content: [
    "./*.php",
    "./*.html",
    "./*.js"
  ],

  theme: {
    extend: {
      fontFamily: {
        baloo: ['"Baloo 2"', 'cursive'],
        quick: ['Quicksand', 'sans-serif']
      },

      colors: {
        navy: '#241b4d',

        brand: {
          50: '#f6f2ff',
          100: '#ece0ff',
          200: '#d9c4ff',
          300: '#bd97ff',
          400: '#a06bff',
          500: '#8438f5',
          600: '#7226dd',
          700: '#5f1cb8',
          800: '#4e1a93',
          900: '#3c1670'
        },

        sun: {
          50: '#fff9eb',
          100: '#ffefc3',
          300: '#ffd866',
          400: '#ffc531',
          500: '#f7a712',
          600: '#dc8a08'
        },

        coral: {
          300: '#ffb3c0',
          400: '#ff8fa3',
          500: '#ff6b88',
          600: '#ef4463'
        },

        mint: {
          300: '#9ee8c8',
          400: '#5fd3a3',
          500: '#2bb787'
        },

        sky: {
          300: '#9fd8ff',
          400: '#6fc0ff',
          500: '#3fa6f7'
        }
      },

      boxShadow: {
        soft: '0 20px 50px -20px rgba(36,27,77,.3)',
        glow: '0 0 0 10px rgba(255,197,49,.18)'
      }
    }
  },

  plugins: []
};
