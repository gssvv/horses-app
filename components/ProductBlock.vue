<template lang="pug">
  .item
    .title {{ title }}
    .image
      img(:src='require(`@/assets/img/products/${id}-1.jpg`)' :alt='`${title} – ${desc}`')
    .info
      .price Цена: 
        span.num {{ price }} р.
      .hint(v-text="getHint(price, box)")
      .description {{ desc }}
    .buttons
      nuxt-link.button(:to='{path: `/product`, query: { id }}') Подробнее
      a.button.add-to-cart(@click="addToCart" v-if="!contactOnly"): i.fas.fa-cart-plus

</template>

<script>
export default {
  props: {
    id: Number,
    title: String,
    desc: String,
    price: Number,
    box: Number,
    options: Array,
    contactOnly: Boolean
  },
  data() {
    return {}
  },
  methods: {
    getHint() {
      if (this.options) {
        let firstOption = this.options[0]
        return `${firstOption.price}р. за ${firstOption.name}`
      }

      let total = this.price * this.box
      return `${total}р. за коробку (${this.box}шт.)`
    },
    addToCart() {
      this.$store.dispatch('addProduct', { id: this.id, amount: 1 })

      this.$toasted.show(`Добавлено в корзину (1)`, {
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
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.item
  @include shadow(1)
  display: grid
  grid-auto-columns: minmax(80px, auto) auto
  padding: 20px
  background-color: #fff
  grid-gap: 10px 5px
  .title
    grid-area: span 1 / span 2
    font-size: 20px
    font-weight: 700
    line-height: 1
    margin-bottom: 10px
    color: $primary
  .image
    width: 100%
    margin: -10px
    img
      width: 100%
  .buttons
    justify-self: flex-end
    align-content: flex-end
    grid-area: span 1 / span 2
    display: grid
    grid-auto-flow: column
    grid-gap: 5px
    .button
      margin-top: 0
    .add-to-cart
      height: 100%
      font-size: 22px
      display: grid
      align-items: center
      justify-content: center
      padding: 0 10px 0 7px
  .info
    .price
      font-size: 24px
      font-weight: 700
      .num
        color: $primary
    .hint
      color: #999
      font-size: 13px
    .description
      font-size: 14px
      margin-top: 10px
      margin-bottom: 15px
</style>
