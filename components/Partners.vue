<template lang="pug">
  
  section.partners
    .container
      .content
        h2.section-title Наши партнеры
      .content.par-wrapper
        .item(v-for='i in 7' :key='i')
          img(:src='require(`@/assets/img/partners/p-i-${i}.png`)' alt='Партнеры Classic Horse Nutrition')

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

.partners
  padding: 30px 0 30px 0 
  .container
    .content
      .section-title
        font-size: 32px
        text-transform: uppercase
        font-weight: 700
        text-align: center
        margin: 0 0 5px 0
      &.par-wrapper
        padding: 30px 0
        display: flex
        align-items: center
        justify-content: center
        justify-items: center
        margin: -15px -7.5px
        flex-wrap: wrap
        .item
          width: 140px
          display: grid
          justify-content: center
          margin: 15px 7.5px
          img
            width: 100%
        
  @include respond-to(sm)
    .container
      .content 
        &.par-wrapper
          .item
            width: 130px
          




</style>
