module.exports = {
  mode: 'spa',
  // mode: 'universal',
  router: {
    base: process.env.DEV ? '/' : '/' ///horses-new'
  },

  /*
   ** Headers of the page
   */
  head: {
    htmlAttrs: {
      lang: 'ru'
    },
    title:
      'Classic Horse Nutrition – Качественные и эффективные кормовые добавки для лошадей',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content:
          'Партнёрское предприятие по производству кормовых добавок для лошадей и торговая марка Classic Horse Nutrition предлагает Вашему вниманию качественных и эффективных кормовых добавок для лошадей.'
      }
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    link: [
      {
        rel: 'stylesheet',
        href:
          'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&subset=cyrillic'
      }
    ]
  },

  /*
   ** Customize the progress-bar color
   */
  loading: { color: '#fff' },

  /*
   ** Global CSS
   */
  css: ['@/assets/style/fa.all.min.css', '@/assets/style/base.sass'],

  /*
   ** Plugins to load before mounting the App
   */
  plugins: ['@/plugins/Toasted.js', '@/plugins/YaMetrics.js'],

  /*
   ** Nuxt.js modules
   */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios'
  ],
  /*
   ** Axios module configuration
   */
  axios: {
    // See https://github.com/nuxt-community/axios-module#options
  },

  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  }
}
