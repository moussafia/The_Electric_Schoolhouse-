/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {},
    colors:{
      mygreen: '#02a1db9e',
      myblue: '#a8cf45a8',
    }
  },
  plugins: [],
}

