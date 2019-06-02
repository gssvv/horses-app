<template lang="pug">
  .change-amount(:class='{ small: small }')
    .change.minus(@click='changeAmount(-1)'): i.fas.fa-minus
    input.num(:value='amount' @input="changeAmount(1, $event.target.value)")
    .change.plus(@click='changeAmount(1)'): i.fas.fa-plus
</template>

<script>
export default {
  props: {
    amount: Number,
    small: Boolean
  },
  methods: {
    changeAmount(num, changer) {
      if (changer !== undefined && !isNaN(changer))
        return this.updateAmount(changer)

      if (Number(this.$parent.amount) + num > 0)
        this.updateAmount(Number(this.amount) + num)
    },
    updateAmount(value) {
      this.$parent.$emit('changeAmount', Number(value))
    }
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.change-amount
  display: inline-grid
  align-items: center
  grid-auto-flow: column
  @include shadow(1)
  background-color: #F5F5F5
  border-radius: 10px
  font-size: 22px
  .change
    color: #8A8A8A
    cursor: pointer
    padding: 0 15px
    font-size: 16px
    transition: .25s ease
    &:hover
      color: #222
  .num
    padding: 7.95px 0
    width: auto
    background-color: unset
    border: none
    font-size: inherit
    width: 40px
    text-align: center
    line-height: 1.3
    &:focus
      outline: none

  &.small
    font-size: 18px
    .num
      width: 25px
      padding: 9.5px 0
    .change
      padding: 0 10px

  @include respond-to(sm)
    font-size: 18px
    .num
      width: 25px
      padding: 9.5px 0
    .change
      padding: 0 10px
</style>


