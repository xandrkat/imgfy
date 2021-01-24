module.exports = {
  purge: {
    content: [
      './resources/views/**/*.php',
      './resources/assets/app.js',
      './resources/assets/app.scss',
    ]
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      boxShadow: {
        xs: '0 6px 12px rgba(140,152,164,.075);',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
  ],
}
