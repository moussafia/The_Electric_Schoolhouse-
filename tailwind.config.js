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
      mygreen: '#a8cf45a8',
      myblue: '#02a1db9e',
    }
  },
  plugins: [],
}

