<template lang="pug">
  .item
    .close(@click="removeFromCart"): img(src='@/assets/img/close.svg')
    img.image(:src='require(`@/assets/img/products/${id}-1.jpg`)' :alt='title')
    .info
      h3.name {{ title }}
      div
      h4.price Сумма: 
        span.num
          span.int {{ price * amount * box  }}
          | руб.
      .change 
        change-amount(:amount='amount' :small="true")
</template>

<script>
import ChangeAmount from '@/components/ChangeAmount'

export default {
  props: {
    id: Number,
    title: String,
    amount: Number,
    price: Number,
    box: Number
  },
  created() {
    this.$on('changeAmount', value => this.$parent.changeAmount(this.id, value))
  },
  methods: {
    removeFromCart() {
      this.$store.dispatch('removeFromCart', this.id)
    }
  },
  components: {
    ChangeAmount
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.item
  @include shadow(1)
  padding: 25px 15px 20px 10px
  display: grid
  grid-template-columns: 1fr 2fr
  grid-gap: 10px
  height: 100%
  position: relative
  .close
    position: absolute
    top: 5px 
    right: 5px
    height: 15px
    cursor: pointer
  .image
    width: 100%
  .info
    display: grid
    align-items: flex-start
    grid-template-rows: auto auto 1fr auto
    .name
      font-size: 22px
      font-weight: 700
      line-height: 1
      margin: 5px 0 0 0
      word-break: break-word
    .price
      margin: 10px 0
      font-size: 18px
      font-weight: 700
      .num
        color: $primary
    .change
      justify-self: flex-start
      display: inline

  @include respond-to(lg)
    .info
      .name
        font-size: 30px
        margin: 15px 0
      .price
        font-size: 24px
        margin: 10px 0 20px 0

  @include respond-to(md)
    .info
      .name
        font-size: 22px
        margin: 5px 0 0 0
      .price
        font-size: 18px
        margin: 10px 0




</style>

