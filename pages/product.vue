<template lang="pug">
  .product
    .container
      .content(v-if='productInfo')
        .review
          .images
            .item(v-for="i in 3" :key='i'): img(:src='require(`@/assets/img/products/${productInfo.id}-${i}.jpg`)' :alt='productInfo.title')

            .item.large: img(src='@/assets/img/products/box.jpg' :alt='productInfo.title')
          .info
            h2.title {{ productInfo.title }}
            p.desc {{ productInfo.longDesc }}
            .price Цена: 
              span.num
                span.int {{ productInfo.box * productInfo.price * amount }}
                | р.
            .hint За коробку {{ productInfo.box }}шт.
            .buttons
              a.button(@click='addToCart') В корзину
              change-amount(:amount="amount")
            .hint Условия доставки обсуждаются индивидуально
        
        .chars
          .bar(@click='toggleBar')
            .item(:class="{active: activeSec == 'comp'}", id='comp') Компоненты
            .item(:class="{active: activeSec == 'ing'}", id='ing') Ингредиенты
            .item(:class="{active: activeSec == 'note'}", id='note') Примечание
            .item(:class="{active: activeSec == 'rec'}", id='rec') Рекомендации по кормлению
          .chars-content
            transition(name="fade" mode="out-in" :duration="200")
              .components(v-if="activeSec == 'comp'" key='comp')
                  .column(v-for='column in productInfo.components')
                    .row.title {{ column.title }}
                    .row(v-for='row in column.list')
                      .title {{ row[0] }}
                      .value {{ row[1] }}
              .ingredients(v-if="activeSec == 'ing'" key='ing')
                ul.list
                  li.item(v-for="item in productInfo.ingredients.list") 
                    span(v-text="item")
                p.desc(v-html="productInfo.ingredients.desc")

              .notice(v-html='productInfo.notice[0]' v-if="activeSec == 'note'" key='note') 

              .recommendations(v-if="activeSec == 'rec'" key='rec')
                div(v-html="productInfo.recommendations.desc")
                table(v-html="productInfo.recommendations.table")
                div(v-html="productInfo.recommendations.after")

</template>

<script>
import ChangeAmount from '@/components/ChangeAmount'
export default {
  head: {
    title: 'Продукт – Classic Horse Nutrition',
    meta: [
      {
        hid: 'description',
        name: 'description',
        content:
          'Здесь представлены такие продукты как: Super Mix BREEDING, Super Mix ELECTROLYTES, Lacto ENZYME, Super Mix REGULAR.'
      }
    ]
  },
  head() {
    return {
      title: `${this.productInfo.title} – Classic Horse Nutrition`
    }
  },
  data() {
    return {
      activeSec: 'comp',
      amount: 1,
      id: null,
      productInfo: {}
    }
  },
  created() {
    this.$on('changeAmount', value => (this.amount = value))

    this.id = this.$route.query ? this.$route.query.id : null
    this.productInfo = require('@/assets/ProductsData.js')[this.id]

    if (!this.productInfo) this.$router.push('/catalogue')
  },
  methods: {
    toggleBar(e) {
      if (e.srcElement.id) this.activeSec = e.srcElement.id
    },
    addToCart() {
      this.$store.dispatch('addProduct', { id: this.id, amount: this.amount })

      this.$toasted.show(`Добавлено в корзину (${this.amount})`, {
        theme: 'toasted-primary',
        position: 'bottom-center',
        duration: 5000,
        icon: 'cart-plus',
        action: {
          text: 'Открыть',
          onClick: (e, toastObject) => {
            this.$router.push('/cart')
            toastObject.goAway(0)
          }
        }
      })
    }
  },
  components: { ChangeAmount }
}
</script>

<style lang="sass">
@import '@/assets/style/variables.sass'

.fade-enter-active, .fade-leave-active
  transition: opacity .5s

.fade-enter, .fade-leave-to
  opacity: 0

.product
  padding: 30px 0
  .container
    .content
      @include shadow(1)
      padding: 50px
      background-color: #fff
      .review
        display: grid
        grid-template-columns: 2fr 3fr
        align-items: flex-start
        grid-gap: 50px
        .images
          width: 100%
          display: grid
          grid-template-columns: 1fr 1fr 1fr
          grid-template-rows: 1fr auto
          grid-gap: 5px
          .item
            img
              width: 100%
              height: 100%
              object-fit: contain
              object-position: center center
            &.large
              grid-area: span 2 / span 3
              img
                padding: 10px
        .info
          width: 100%
          display: grid
          .title
            font-size: 32px
            font-weight: 700
            margin: 0 0 15px 0
            line-height: 1.1
          .desc
            margin: 0
            font-size: 16px 
            font-weight: 500
          .price 
            margin: 15px 0 0 0
            font-size: 34px
            font-weight: 700
            .num
              color: $primary
          .hint
            color: #999
            font-size: 13px
          .buttons
            margin: 25px 0 5px 0
            display: grid
            grid-auto-flow: column
            justify-content: flex-start
            align-items: center
            grid-gap: 15px
            .button
              font-size: 22px
              margin: 0
              padding: 7.5px 35px
      .chars
        padding: 30px 0 0 0 
        .bar
          display: inline-flex
          flex-wrap: wrap
          justify-content: flex-start
          align-items: center
          margin: -5px -5px 30px -5px
          .item
            padding: 5px 20px
            font-size: 18px
            cursor: pointer
            background-color: #F5F5F5
            @include shadow(1)
            border-radius: 2px
            margin: 5px
            transition: .25s ease
            &.active
              background-color: $primary
              color: #fff
        .chars-content
          .components
            width: 100%
            font-size: 16px
            display: grid
            grid-template-columns: 1fr 1fr 1fr
            grid-gap: 40px
            .column
              display: grid
              grid-gap: 20px
              align-content: flex-start
              .row
                display: grid
                grid-template-columns: auto auto
                justify-content: space-between
                grid-gap: 10px
                &.title
                  font-weight: 700
                  font-size: 18px
          .ingredients
            .list
              margin: 15px 0
              color: $primary
              display: grid
              grid-template-columns: 1fr 1fr 1fr
              grid-gap: 15px 50px
              padding: 0 0 0 30px
              li
                span
                  color: #222
            .desc
              margin: 30px 0
              font-size: 17px
              text-align: justify
          .notice
            .centered
              text-align: center
              margin: 30px 0
            b
              font-weight: 600
            ul
              li
                padding: 2.5px 0
                color: $primary
                font-size: 16px
                span
                  color: #222
          .recommendations
            b
              font-weight: 600
            table
              width: 100%
              margin: 30px 0
              border-collapse: collapse
              tr
                td
                  text-align: center
                  font-size: 17px
                  padding: 10px
                  border: 1px solid #ccc
            .centered
              text-align: center



  @include respond-to(lg)
    .container
      .content
        .review
          grid-gap: 30px
          .info
            .title
              font-size: 26px
            .desc
              font-size: 14px
            .buttons
              .button
                padding: 7.5px 25px
        .chars
          .chars-content
            .ingredients
              .list
                grid-gap: 10px 30px

  @include respond-to(md)
    padding: 15px 0 
    .container
      .content
        padding: 30px 50px
        .review
          grid-gap: 30px
          grid-template-columns: auto
          .info
            order: -1
          .images
            grid-template-columns: auto auto auto auto
            grid-template-rows: unset
            .item.large
              grid-area: unset
              img
                padding: 0
        .chars
          .bar
            width: 100%
            flex-direction: column
            align-items: stretch
            text-align: center
          .chars-content
            .components
              grid-template-columns: auto
            .ingredients
              .list
                padding-left: 20px
                grid-template-columns: 1fr 1fr

        

  @include respond-to(sm)
    .container
      .content
        padding: 30px 15px
        .review
          .info
            .title
              font-size: 22px
            .buttons
              .button
                font-size: 20px
                padding: 7.5px 20px  
              .change-amount
                font-size: 18px
                .num
                  width: 25px
                  padding: 9.5px 0
                .change
                  padding: 0 10px
        .notice
          p
            font-size: 1rem




</style>
