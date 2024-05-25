/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/**/*.blade.php",
    "node_modules/preline/dist/*.js"
],
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
}

