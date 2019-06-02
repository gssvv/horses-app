<template lang="pug">
  .cart
    .container
      .content
        h1.title Корзина
        h3.note {{ getCartAmount }} товаров на сумму 
          span.price {{ finalPrice }}р
        .products
          cart-item(v-for='item in items' v-bind='item' :key="item.id")
          nuxt-link.more(to='/catalogue')
              i.fas.fa-shopping-cart
              |Открыть каталог

        .result
          form.row(ref='payForm' action='https://merchant.roboxchange.com/Index.aspx' method='POST')
            .hidden
              input(name='MrchLogin' value='hbhorse')
              input(name='OutSum' :value='finalPrice')
              input(name='InvId' value='0')
              input(name='Desc' value='Заказ на сайте superhorse.ru')
              input(name='SignatureValue' :value='signatureValue')
              textarea(name='Shp_info' :value='productInfo')
              input(name='IncCurrLabel' value='RUB')
              input(name='Culture' value='ru')
              input(name='Encoding' value='utf-8')

            .button.big(@click='order()') Заказать
            a.price 
              | Итог: 
              span.num {{ finalPrice }}р
          .tip 
            | Условия доставки обсуждаются идивидуально
            br
            nuxt-link(to='/contacts') Связяться с нами

    
</template>

<script>
import CartItem from '@/components/CartItem'
import { mapState } from 'vuex'
import productsList from '@/assets/productsList'
import axios from 'axios'

export default {
  head() {
    return {
      title: 'Корзина – Classic Horse Nutrition'
    }
  },
  data() {
    return {
      finalPrice: 0,
      signatureValue: null,
      productInfo: null
    }
  },
  created() {
    this.updateFinalPrice()
  },
  computed: {
    ...mapState(['cart']),
    items() {
      return this.getItems()
    },
    getCartAmount() {
      return this.$store.getters.getCartAmount
    }
  },
  watch: {
    items() {
      this.updateFinalPrice()
    }
  },
  methods: {
    async order() {
      let { payForm } = this.$refs
      let productInfo = this.getItems()
      let productInfoString = productInfo.reduce(
        (prev, current, index, arr) => {
          return `${prev}${current.title} – ${current.box *
            current.price *
            current.amount} руб. (${current.amount} по ${current.box *
            current.price} руб.); `
        },
        ''
      )
      productInfoString += `Всего: ${this.finalPrice} руб. за ${
        this.getCartAmount
      } товаров.`

      this.productInfo = productInfoString
      let bodyFormData = new FormData()
      bodyFormData.set('summ', this.finalPrice)
      bodyFormData.set('info', productInfoString)

      axios({
        method: 'post',
        url: '/payment.php',
        data: bodyFormData,
        config: { headers: { 'Content-Type': 'multipart/form-data' } }
      }).then(res => {
        console.log(res)

        this.signatureValue = res.data

        setTimeout(() => {
          payForm.submit()
        }, 100)
      })
    },
    updateFinalPrice() {
      let result = 0

      for (let i of this.items) {
        result += i.box * i.price * i.amount
      }

      this.finalPrice = result
    },
    getItems() {
      let result = []

      for (let i in this.cart) {
        if (this.cart[i].amount > 0) {
          let item = productsList.find(e => e.id == i)
          if (!item) continue

          item.amount = this.cart[i].amount

          result.push(item)
        }
      }

      return result
    },
    changeAmount(id, amount) {
      let item = this.items.find(e => e.id == id)
      let index = this.items.indexOf(item)

      this.items[index].amount = amount
      this.$store.dispatch('updateProduct', { id, amount })
    }
  },
  components: { CartItem }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.cart
  .container
    .content
      @include shadow(1)
      padding: 50px 40px
      background-color: #fff
      .title
        font-size: 36px
        font-weight: 700
        text-transform: uppercase
        margin: 0
      .note
        font-size: 14px 
        font-weight: 600
        margin: 0
        .price
          color: $primary
      .products
        margin-top: 30px
        display: grid
        grid-template-columns: repeat(auto-fill, minmax(300px, auto))
        grid-gap: 15px
        .more
          display: grid
          align-items: center
          justify-content: center
          align-content: center
          text-align: center
          padding: 30px
          font-size: 18px
          color: $primary
          border: dashed 2px $primary
          opacity: .5
          transition: .25s ease
          display: grid
          text-decoration: none
          grid-gap: 5px
          .fas
            font-size: 40px
          &:hover
            opacity: 1
      .result
        padding-top: 50px
        .row
          display: grid
          justify-content: flex-start
          align-items: center
          grid-gap: 15px
          grid-template-columns: auto auto
          .hidden
            display: none
          .button
            margin: 0
          .price
            font-size: 32px
            font-weight: 700
            .num
              color: $primary
        .tip
          margin-top: 10px
          font-size: 14px 
          color: #999

  @include respond-to(sm)
    .container
      .content
        padding: 30px 15px
        .result
          text-align: center
          .row
            grid-template-columns: auto
            justify-content: center
            .price
              order: -1
          


  
</style>
