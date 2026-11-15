/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{html,js}'],
  theme: {
    extend: {
      colors: {
        primaryGradientStart: '#43cea2',
        primaryGradientEnd: '#185a9d',
        secondaryGradientEnd: '#82a4c7',
        buttonGradientStart: '#1e3c72',
        buttonGradientEnd: '#2a5298',

        // ✅ رنگ‌های جدید اضافه شده:
        primary: '#0d9488',
        'primary-light': '#ccfbf1',
        toggle: '#a7f3d0',
        text: '#064e3b',
      },
      fontFamily: {
        vazirmatn: ['Vazirmatn', 'sans-serif'],
      },
      boxShadow: {
        'card': '0 20px 60px rgba(0, 0, 0, 0.2)',
        'card-hover': '0 0 30px rgba(106, 64, 162, 0.6)',
        'button': '0 5px 15px rgba(0, 0, 0, 0.2)',
      },
      backdropBlur: {
        'card': '20px',
        'form': '10px',
      },
    },
  },
  darkMode: false, // یا media یا class
  plugins: [],
};
