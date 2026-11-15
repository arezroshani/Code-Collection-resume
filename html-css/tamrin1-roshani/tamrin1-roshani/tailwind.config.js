/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",
    "./**/*.{html,js}",
  ],

  theme: {
    extend: {


      fontFamily: {
        head: ['Fredoka', 'sans-serif'],
        sans: ['Poppins', 'sans-serif'],
        serif: ['"Playfair Display"', 'serif'],
        script: ['Caveat', 'cursive'],
      },



      backgroundImage: {

  
        'dot-grid':
          "radial-gradient(circle,#f9a8d455 1.5px,transparent 1.5px)",

        'scallop':
          "radial-gradient(circle at 10px 0,transparent 9px,#fbcfe8 9px 10px,transparent 10px)",

        'name-grad':
          "linear-gradient(120deg,#ec4899,#a78bfa 60%,#f6ad55)",

        'contact-grad':
          "linear-gradient(120deg,#ec4899,#a78bfa)",

        'cta-grad':
          "linear-gradient(135deg,#ec4899,#f472b6)",

        'avatar-grad':
          "linear-gradient(135deg,#ec4899,#a78bfa)",

        'card-grad':
          "linear-gradient(160deg,#fdf2f8,#f3e8ff)",

        'contact-bg-grad':
          "linear-gradient(135deg,#fdf2f8,#f3e8ff 60%,#fff7e6)",

        'ico-grad':
          "linear-gradient(135deg,#fbcfe8,#e9d8fd)",


        'page-glow':
          "radial-gradient(circle at 15% 20%, rgba(255,180,220,0.18), transparent 28%), radial-gradient(circle at 85% 30%, rgba(180,190,255,0.18), transparent 30%), radial-gradient(circle at 50% 90%, rgba(220,170,255,0.14), transparent 35%), linear-gradient(135deg, #100b20, #18112c 45%, #0c1024)",

        'title-grad':
          "linear-gradient(120deg, #ffffff, #ffc4e9, #cdbdff)",

        'submit-grad':
          "linear-gradient(120deg, #f29bd2, #bca8ff)",
      },


 
      keyframes: {

        floatY: {
          '0%,100%': {
            transform: 'translateY(0) rotate(0deg)'
          },
          '50%': {
            transform: 'translateY(-14px) rotate(12deg)'
          },
        },

        wiggle: {
          '0%,100%': {
            transform: 'rotate(-10deg)'
          },
          '50%': {
            transform: 'rotate(6deg) scale(1.05)'
          },
        },

        avatarSpin: {
          to: {
            transform: 'rotate(360deg)'
          },
        },


        glowMove: {
          from: {
            transform: 'translate(0,0) scale(1)'
          },
          to: {
            transform: 'translate(60px,-40px) scale(1.2)'
          },
        },

        twinkle: {
          '0%,100%': {
            opacity: .15,
            transform: 'scale(.7)'
          },
          '50%': {
            opacity: 1,
            transform: 'scale(1.4)'
          },
        },

        heartFloat: {
          '0%,100%': {
            transform: 'translateY(0)'
          },
          '50%': {
            transform: 'translateY(-3px)'
          },
        },

        successPop: {
          '0%': {
            transform: 'scale(0) rotate(-30deg)'
          },
          '70%': {
            transform: 'scale(1.15) rotate(5deg)'
          },
          '100%': {
            transform: 'scale(1) rotate(0)'
          },
        },

        sparkleClick: {
          '0%': {
            opacity: 1,
            transform: 'translate(-50%,-50%) scale(.5) rotate(0deg)'
          },
          '100%': {
            opacity: 0,
            transform: 'translate(-50%,-100px) scale(1.5) rotate(180deg)'
          },
        },

        teddyBounce: {
          '0%,100%': {
            marginTop: '0'
          },
          '50%': {
            marginTop: '-5px'
          },
        },

        teddyPath1: {
          '0%': {
            transform: 'translate(0,0) rotate(-4deg)'
          },
          '20%': {
            transform: 'translate(180px,-30px) rotate(5deg)'
          },
          '40%': {
            transform: 'translate(320px,80px) rotate(-4deg)'
          },
          '60%': {
            transform: 'translate(210px,210px) rotate(5deg)'
          },
          '80%': {
            transform: 'translate(-50px,140px) rotate(-5deg)'
          },
          '100%': {
            transform: 'translate(0,0) rotate(-4deg)'
          },
        },

        teddyPath2: {
          '0%': {
            transform: 'translate(0,0) rotate(4deg)'
          },
          '20%': {
            transform: 'translate(-180px,100px) rotate(-5deg)'
          },
          '40%': {
            transform: 'translate(-300px,240px) rotate(5deg)'
          },
          '60%': {
            transform: 'translate(-130px,360px) rotate(-4deg)'
          },
          '80%': {
            transform: 'translate(80px,220px) rotate(4deg)'
          },
          '100%': {
            transform: 'translate(0,0) rotate(4deg)'
          },
        },

        teddyPath3: {
          '0%': {
            transform: 'translate(0,0) rotate(3deg)'
          },
          '25%': {
            transform: 'translate(-180px,-100px) rotate(-5deg)'
          },
          '50%': {
            transform: 'translate(-360px,-30px) rotate(4deg)'
          },
          '75%': {
            transform: 'translate(-250px,-250px) rotate(-4deg)'
          },
          '100%': {
            transform: 'translate(0,0) rotate(3deg)'
          },
        },

        teddyPath4: {
          '0%': {
            transform: 'translate(0,0) rotate(-3deg)'
          },
          '20%': {
            transform: 'translate(150px,-120px) rotate(4deg)'
          },
          '45%': {
            transform: 'translate(350px,-60px) rotate(-4deg)'
          },
          '70%': {
            transform: 'translate(420px,-260px) rotate(5deg)'
          },
          '100%': {
            transform: 'translate(0,0) rotate(-3deg)'
          },
        },

        teddyPath5: {
          '0%': {
            transform: 'translate(0,0) rotate(4deg)'
          },
          '25%': {
            transform: 'translate(-120px,160px) rotate(-5deg)'
          },
          '50%': {
            transform: 'translate(100px,290px) rotate(4deg)'
          },
          '75%': {
            transform: 'translate(300px,130px) rotate(-4deg)'
          },
          '100%': {
            transform: 'translate(0,0) rotate(4deg)'
          },
        },

        teddyPath6: {
          '0%': {
            transform: 'translate(0,0) rotate(-4deg)'
          },
          '25%': {
            transform: 'translate(-160px,-170px) rotate(5deg)'
          },
          '50%': {
            transform: 'translate(-380px,-240px) rotate(-4deg)'
          },
          '75%': {
            transform: 'translate(-200px,-370px) rotate(5deg)'
          },
          '100%': {
            transform: 'translate(0,0) rotate(-4deg)'
          },
        },
      },


 
      animation: {

        'float-y':
          'floatY 5s ease-in-out infinite',

        'wiggle':
          'wiggle 4s ease-in-out infinite',

        'avatar-spin':
          'avatarSpin 18s linear infinite',


        'glow-move':
          'glowMove 12s ease-in-out infinite alternate',

        'twinkle':
          'twinkle 3s infinite ease-in-out',

        'heart-float':
          'heartFloat 1.8s ease-in-out infinite',

        'success-pop':
          'successPop .7s ease',

        'sparkle-click':
          'sparkleClick .8s ease forwards',

        'teddy-1':
          'teddyPath1 24s linear infinite, teddyBounce .7s ease-in-out infinite',

        'teddy-2':
          'teddyPath2 27s linear infinite, teddyBounce .8s ease-in-out infinite',

        'teddy-3':
          'teddyPath3 22s linear infinite, teddyBounce .72s ease-in-out infinite',

        'teddy-4':
          'teddyPath4 29s linear infinite, teddyBounce .8s ease-in-out infinite',

        'teddy-5':
          'teddyPath5 25s linear infinite, teddyBounce .75s ease-in-out infinite',

        'teddy-6':
          'teddyPath6 30s linear infinite, teddyBounce .7s ease-in-out infinite',
      },
    },
  },

  plugins: [],
};