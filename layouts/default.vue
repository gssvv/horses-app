<template lang="pug">
  .page(:style='{ backgroundColor }')
    header-component(:white="whiteMode")

    nuxt

    footer-component

</template>

<script>
import HeaderComponent from '~/components/Header.vue'
import FooterComponent from '~/components/Footer.vue'

export default {
  data() {
    return {
      whiteMode: false
    }
  },
  computed: {
    backgroundColor() {
      return this.whiteMode ? '#fff' : 'unset'
    }
  },
  created() {
    this.$store.dispatch('getCartCookies')
  },

  components: {
    HeaderComponent,
    FooterComponent
  }
}
</script>


<style lang='sass'>
.page
  min-height: 100vh
  display: grid
  grid-template-rows: auto 1fr auto

</style>
