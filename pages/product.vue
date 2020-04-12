<template lang="pug">
  .product
    .container
      .content(v-if='productInfo')
        .review
          .images(:class="{single: productInfo.group !== 1}")
            .item(v-for="i in productInfo.group == 1 ? 3 : 1" :key='i'): img(v-if="productInfo.id" :src='require(`@/assets/img/products/${productInfo.id}-${i}.jpg`)' :alt='productInfo.title')

            .item.large(v-if="productInfo.group == 1"): img(src='@/assets/img/products/box.jpg' :alt='productInfo.title')
          .info
            h1.title {{ productInfo.title }}
            p.desc {{ productInfo.longDesc }}
            .price Цена: 
              span.num
                span.int(v-text="price")

            .hint(v-text="optionSelected.text || `За коробку ${productInfo.box }шт.`")
            .select(v-if="productInfo.options")
              v-select(:options="getOptions(productInfo.options)" v-model="optionSelected")
            
            .buttons(v-if="optionSelected.price !== 0 && !productInfo.contactOnly")
              a.button(@click='addToCart') В корзину
              change-amount(:amount="amount")
            .buttons(v-else)
              nuxt-link.button(:to="{name: 'index', query: {scroll: 'contacts', product: productInfo.title}}") Предварительный заказ
              
            .hint 
              span Условия доставки обсуждаются индивидуально
              br
              span(v-if="productInfo.group == 1") Возможна оплата при получении в любом отделении ТК CDEK 
              span(v-if="productInfo.group == 2") РОЗНИЦА – 8 (900) 296-99-90; 8 (918) 111-24-53
        
        .chars
          .bar(@click='toggleBar')
            .item(:class="{active: activeSec == 'comp'}", v-if="productInfo.components" id='comp') Компоненты
            .item(:class="{active: activeSec == 'ing'}", v-if="productInfo.ingredients" id='ing') Ингредиенты
            .item(:class="{active: activeSec == 'note'}", v-if="productInfo.notice" id='note') Примечание
            .item(:class="{active: activeSec == 'rec'}", v-if="productInfo.recommendations"  id='rec') Рекомендации по кормлению
            a.item(:href='getPDF(productInfo.pdf)' target='_blank' download v-if="productInfo.pdf").pdf Скачать в PDF-формате
          .chars-content
            transition(name="fade" mode="out-in" :duration="200")
              .components(v-if="activeSec == 'comp'" key='comp')
                  .column(v-for='column in productInfo.components')
                    .row.title {{ column.title }}
                    .row(v-for='row in column.list')
                      .title(v-if='row') {{ row[0] }}
                      .value(v-if='row') {{ row[1] }}
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
import VSelect from '@/components/Select'

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
      title: `${this.productInfo.title} – Classic Horse Nutrition`,
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: `${this.productInfo.longDesc}`
        }
      ]
    }
  },
  data() {
    return {
      optionSelected: {},
      activeSec: 'comp',
      amount: 1,
      id: null,
      productInfo: {}
    }
  },
  async created() {
    this.$on('changeAmount', value => (this.amount = value))

    this.id = this.$route.query ? this.$route.query.id : null
    this.productInfo = await import('@/assets/productsData.js')

    this.productInfo = await this.productInfo.default[this.id]

    if (!this.productInfo) this.$router.push('/catalogue')

    this.activeSec = this.productInfo.components ? 'comp' : 'ing'

    this.initOptions()
  },
  computed: {
    price() {
      if (this.optionSelected.price === 0) return 'договорная'

      let price =
        this.productInfo.box *
        this.amount *
        (this.optionSelected.price || this.productInfo.price)
      return price + 'р.'
    }
  },
  methods: {
    async initOptions() {
      await this.$nextTick
      if (this.productInfo.options)
        this.optionSelected = this.getOptions(this.productInfo.options)[0]
    },
    getPDF(title) {
      return '/pdf/' + title + '.pdf'
    },
    getOptions(options) {
      return options.map(el => ({
        text: el.name,
        value: el.id,
        price: el.price
      }))
    },
    toggleBar(e) {
      if (e.srcElement.id) this.activeSec = e.srcElement.id
    },
    addToCart() {
      let id = this.optionSelected.value
        ? `${this.id}–${this.optionSelected.value}`
        : this.id

      this.$store.dispatch('addProduct', {
        id: id,
        amount: this.amount,
        option: this.optionSelected.id || 0
      })

      this.$toasted.show(`Добавлено в корзину (${this.amount})`, {
        theme: 'toasted-primary',
        position: 'top-right',
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
  components: { ChangeAmount, VSelect }
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
          &.single
            grid-template-columns: 1fr
            grid-template-rows: 1fr
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
            font-size: 14px
          .select
            max-width: 280px
            margin: 20px 0 0 0
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
            &.pdf
              background-color: #b90605
              color: #fff
              text-decoration: none
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
