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
        'masjid-green': '#063f2b',
        'masjid-gold': '#f59e0b',
      }
    },
  },
  plugins: [],
}