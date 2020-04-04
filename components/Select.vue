<template lang="pug">
  .v-select(ref='select')
    .v-select__field(@click="showList" :class="{empty: !choice.text}")
      span(v-text="choice.text || 'Выберите вариант'")
    .v-select__list(:class="{visible}" v-if="options[0].value")
      .v-select-list__item(v-for="(item, index) in options" :key="index" @click="select(item)" v-text="item.text" :class="{active: choice.value == item.value}")
    .v-select__list(:class="{visible}" v-else)
      .v-select-list__item(v-for="(item, index) in options" :key="index" @click="select(item)" v-text="item" :class="{active: choice.value == item}")

</template>

<script>
export default {
  props: ['value', 'options'],
  data: () => ({
    visible: false,
    choice: {
      value: '',
      text: ''
    }
  }),
  mounted() {},
  updated() {
    if (typeof this.value === 'object') {
      this.choice = this.value
    } else {
      this.choice.text = this.value
      this.choice.value = this.value
    }
  },
  methods: {
    select(option) {
      if (typeof option === 'object') {
        this.choice = option
      } else {
        this.choice.text = option
        this.choice.value = option
      }

      this.$emit('input', this.choice)
      this.visible = false

      document.removeEventListener('click', this.clickOutsideHandler)
    },
    showList() {
      this.visible = true

      document.addEventListener('click', this.clickOutsideHandler)
    },
    clickOutsideHandler(event) {
      let { select } = this.$refs

      let isClickInside = select.contains(event.target)

      if (!isClickInside) {
        this.visible = false
        document.removeEventListener('click', this.clickOutsideHandler)
      }
    }
  }
}
</script>

<style lang="sass" scoped>
.v-select
  position: relative
  &__field
    font-size: 18px
    color: #222
    padding: 16px
    background-color: #F0F0F4
    border-radius: 8px
    cursor: pointer
    background-image: url('/img/icons/select-arrows.svg')
    background-repeat: no-repeat
    background-position: calc(100% - 20px) center
    padding-right: 48px
    height: 56px
    position: relative
    &.empty
      color: #ccc
    & > span
      max-width: calc(100% - 58px)
      position: absolute
      white-space: nowrap
      overflow: hidden
      display: block
      text-overflow: ellipsis
  &__list
    position: absolute
    border-radius: 0 0 4px 4px
    top: 50px
    background-color: #fff
    border: 1px solid #F0F0F4
    width: 100%
    pointer-events: none
    opacity: 0
    transition: .25s ease
    z-index: 1
    &.visible
      pointer-events: all
      opacity: 1
  &-list__item
    padding: 16px
    transition: .25s ease
    cursor: pointer
    &:hover
      background-color: #f5f5f5
    &.active
      color: #2A713E
</style>
