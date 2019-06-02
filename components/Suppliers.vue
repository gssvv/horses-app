<template lang="pug">
  
  section.suppliers
    .container
      .content
        h2.section-title Поставщики ингредиентов
        p.tip: nuxt-link(to='/contacts') Стать партнером
      .content.sup-wrapper
        .item
          img(src='@/assets/img/suppliers/lallemand.jpg' alt='Поставщик Lallemand')
        .item
          img(src='@/assets/img/suppliers/biomin.jpg' alt='Поставщик Biomin')
        .item
          img(src='@/assets/img/suppliers/dsm.jpg' alt='Поставщик DSM')
        .item
          img(src='@/assets/img/suppliers/rovimix.jpg' alt='Поставщик RoviMix')

</template>

<script>
export default {
  data() {
    return {}
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.suppliers
  padding: 70px 0 30px 0
  .container
    .content
      .section-title
        font-size: 32px
        text-transform: uppercase
        font-weight: 700
        text-align: center
        margin: 0 0 5px 0
      .tip
        color: #999
        font-size: 20px
        text-align: center
        margin: 0 0 30px 0
        a
          color: $primary
      &.sup-wrapper
        padding: 15px 0
        display: grid
        grid-template-columns: repeat(4, 1fr)
        align-items: center
        grid-gap: 30px
        .item
          display: grid
          justify-content: center
          img
            width: 100%
            max-width: 200px
            border-radius: 4px
        
  @include respond-to(md)
    .container
      .content 
        &.sup-wrapper
          grid-template-columns: repeat(2, 1fr)
          grid-gap: 30px




</style>
