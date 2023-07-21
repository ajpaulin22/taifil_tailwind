/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./node_modules/tw-elements/dist/js/**/*.js",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    fontFamily: {
      'poppins': ['Poppins', 'sans-serif'],
    },
    extend: {
      gridColumn: {
        'span-13': 'span 13 / span 13',
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('tailwind-fontawesome'),
    require("tw-elements/dist/plugin.cjs")
  ],

}

