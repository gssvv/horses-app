<template lang="pug">
  
  section.partners
    .container
      .content
        h2.section-title Наши партнеры
      .content.par-wrapper
        a.item(v-for='(link, i) in links' :key='i' :href='link' target='_blank')
          img(:src='require(`@/assets/img/partners/p-i-${i + 1}.png`)' alt='Партнеры Classic Horse Nutrition')

</template>

<script>
export default {
  data() {
    return {
      links: [
        'https://protectfeed.ru',
        'http://www.kirovhorse.ru',
        'http://www.samovolov.ru',
        'http://malkastud.ru',
        'http://www.terskarabian.com/ru',
        'http://www.khip.ru',
        'http://konezavod.ru'
      ]
    }
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
          text-decoration: none
          transition: .25s ease
          &:hover
            opacity: .8
          img
            width: 100%

  @include respond-to(sm)
    .container
      .content
        &.par-wrapper
          .item
            width: 130px
</style>
