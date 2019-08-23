<template lang="pug">
  .footer
    .container
      .content
        .item
          nuxt-link(to='/korotko-o-produkcii') Коротко о продукции
          br
          nuxt-link(to='/chto-my-predlagaem') Что мы предлагаем

        .item 
          a(@click="togglePolicy()") Classic Horse Nutrition © {{ currentYear }}

        .item: nuxt-link(to='/policy') Политика компании

        .item.hidden(:class='{ active: showPolicy }') Логотип Classic Horse Nutrition является зарегистрированным товарным знаком и охраняется законом Российской Федерации. Super Mix и Lacto Enzyme являются официально зарегистрированными торговыми обозначениями и охраняются законом Российской Федерации. <br>The Classic Horse Nutrition logo is a registered trademark and is protected by law of the Russian Federation. Super Mix and Lacto Enzyme are officially registered trademarks and are protected by the law of the Russian Federation.

</template>

<script>
export default {
  data() {
    return {
      showPolicy: false
    }
  },
  computed: {
    currentYear() {
      return new Date().getFullYear()
    }
  },
  methods: {
    togglePolicy() {
      this.showPolicy = !this.showPolicy
    }
  }
}
</script>


<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.footer
  align-self: flex-end
  padding: 50px 0
  color: #666
  .container
    .content
      grid-gap: 30px
      display: grid
      grid-template-columns: 1fr auto 1fr
      .item
        &:nth-child(1)
          text-align: left
        &:nth-child(2)
          text-align: center
        &:nth-child(3)
          text-align: right
        a
          text-decoration: underline
          cursor: pointer
        &.hidden
          grid-column: span 3
          text-align: center
          font-size: 12px
          color: #999
          margin-top: -10px
          max-height: 0px
          transition: .5s ease
          overflow: hidden
          &.active
            max-height: 250px


  @include respond-to(md)
    padding: 30px 0
    .container
      .content
        grid-gap: 10px
        display: grid
        grid-template-columns: auto
        .item
          &:nth-child(1)
            text-align: center
          &:nth-child(2)
            text-align: center
            order: -2
          &:nth-child(3)
            text-align: center
          &.hidden
            grid-column: span 1
            margin-top: 0px
            order: -1

</style>
