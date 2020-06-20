<template lang="pug">
  .header(:class="{ white }")
    .container
      .content
        nuxt-link.logo(tag="div" to="/")
          img(src='@/assets/img/logo-white.png' alt='Classic Horse Nutrition – Качественные и эффективные кормовые добавки для лошадей' v-if='white')
          img(src='@/assets/img/logo.png' alt='Classic Horse Nutrition – Качественные и эффективные кормовые добавки для лошадей' v-else)
        div
        ul.menu 
          li(v-for="(item, index) in menu" :key="index"): nuxt-link(:to='item.href' @click='toggleMenu()') {{ item.title }}
        .phone
          .icon: i.fas.fa-phone
          .number: a(href='tel:8 (800) 333-53-42') 8 (800) 333-53-42
        .cart
          nuxt-link(to='/cart').icon
            i.fas.fa-shopping-cart
            .amount {{ getCartAmount }}
        .menu-icon(@click='toggleMenu()'): i.fas.fa-bars
    .mobile-menu(@click.self="toggleMenu()" :class="{active: menuActive}")
      .wrapper
        .close(@click='toggleMenu()'): i.fas.fa-times
        .number: a(href='tel:8 (800) 333-53-42') 8 (800) 333-53-42
        ul.menu 
          li(v-for="(item, index) in menu" :key="index" @click="toggleMenu()"): nuxt-link(:to='item.href') {{ item.title }}


</template>

<script>
import { mapGetters } from 'vuex'
export default {
  props: {
    white: Boolean
  },
  data() {
    return {
      menu: [
        {
          title: 'Главная',
          href: '/'
        },
        {
          title: 'Каталог',
          href: '/catalogue'
        },
        {
          title: 'Где купить',
          href: '/gde-kupit'
        },
        {
          title: 'Контакты',
          href: '/contacts'
        }
      ],
      menuActive: false
    }
  },
  computed: {
    ...mapGetters(['getCartAmount'])
  },
  methods: {
    toggleMenu() {
      this.menuActive = !this.menuActive
    }
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.header
  display: grid
  &.white
    .container
      position: relative
      .content
        z-index: 1
        position: absolute
        top: 0
        left: 0
        width: 100%
        color: #fff
        .menu
          li
            a
              &:hover
                color: #fff
              &.nuxt-link-exact-active
                color: #fff
  .container
    .content
      padding: 15px 0
      display: grid
      grid-template-columns: auto 1fr auto auto auto
      align-items: center
      grid-gap: 30px
      .logo
        cursor: pointer
        img
          height: 100px
      .menu
        list-style-type: none
        display: grid
        grid-auto-flow: column
        grid-gap: 20px
        font-size: 20px
        justify-content: flex-end
        li
          a
            text-decoration: none
            font-weight: 400
            &:hover
              color: $primary
            &.nuxt-link-exact-active
              color: $primary
      .phone
        display: flex
        align-items: center
        .icon
          font-size: 20px
        .number
          margin-left: 5px
          font-size: 22px
          font-weight: 600
          a
            text-decoration: none
      .cart
        font-size: 20px
        position: relative
        .amount
          top: -7.5px
          right: -7.5px
          display: flex
          align-items: center
          justify-content: center
          position: absolute
          font-size: 12px
          color: #fff
          height: 20px
          width: 20px
          border-radius: 50%
          background-color: $primary
      .menu-icon
        display: none
        font-size: 20px
        cursor: pointer

  .mobile-menu
    z-index: 10
    position: fixed
    width: 100%
    height: 100%
    background-color: rgba(0,0,0,0)
    top: 0
    left: 0
    pointer-event: none
    visibility: hidden
    transition: .25s ease
    .wrapper
      @include shadow(2)
      overflow: auto
      transition: .25s ease
      right: -300px
      top: 0
      position: absolute
      width: 300px
      max-width: 100%
      padding: 30px 50px 30px 30px
      background-color: #f9f9f9
      height: 100%
      .number
        font-size: 26px
        font-weight: 600
        border-bottom: 1px dotted #555
        display: inline-block
        a
          text-decoration: none
      .close
        position: absolute
        top: 15px
        right: 15px
        font-size: 22px
      .menu
        margin: 0
        display: grid
        list-style-type: none
        padding: 30px 0 0 0
        grid-gap: 10px
        font-size: 24px
        font-weight: 500
        li
          a
            text-decoration: none
            &:hover
              color: $primary
            &.nuxt-link-exact-active
              color: $primary
    &.active
      visibility: initial
      background-color: rgba(0,0,0,.25)
      .wrapper
        right: 0

  @include respond-to(xl)
    .container
      .content
        .menu
          display: none
        .menu-icon
          display: block

  @include respond-to(md)
    .container
      .content
        grid-template-columns: auto 1fr auto auto
        .logo
          img
            height: 80px
        .phone
          display: none
</style>
