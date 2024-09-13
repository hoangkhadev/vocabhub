/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#0A092D',
        secondary: '#2E3856'
      },
      boxShadow: {
        menu: '0 0 4px 2px rgba(255, 255, 255, 0.2)'
      }
    },
  },
  plugins: [],
}