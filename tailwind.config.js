/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
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
    require('tailwind-fontawesome')
  ],
}

