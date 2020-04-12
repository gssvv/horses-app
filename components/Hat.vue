<template lang="pug">
  
  section.hat(:style="{ backgroundImage: `url('${require('@/assets/img/hat-bg.jpg')}')`}")
    .container
      .content
        h1.title 
          | Швейцарские добавки 
          span.dif для лошадей, КРС, МРС
        h2.sign Качественные кормовые добавки для с/х животных, гигиена вымени и профилактика копытных заболеваний
        .buttons-wrapper
          nuxt-link.button.big.non-trans(to="catalogue") Каталог
          a.button.big.white(href="#about") Подробнее
        .socials
          a.item(href="https://vk.com/id541234365" target="_blank"): i.fab.fa-vk
          a.item(href="https://www.facebook.com/classic.horsenutrition" target="_blank"): i.fab.fa-facebook-f
          a.item(href="https://www.instagram.com/classic.horse.nutrition" target="_blank"): i.fab.fa-instagram
          a.item(href="https://ok.ru/profile/574397461583" target="_blank"): i.fab.fa-odnoklassniki


</template>

<script>
export default {
  data() {
    return {}
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.hat
  background-size: cover
  background-position: center center
  background-repeat: no-repeat
  color: #fff
  transition: .25s ease
  .container
    .content
      padding: 170px 0 70px 0
      min-height: 100vh
      display: grid
      align-content: center
      justify-content: flex-start
      align-items: center
      grid-gap: 15px
      max-width: 900px
      .title
        font-size: 62px
        text-transform: uppercase
        font-weight: 700
        margin: 0
        line-height: 1.1
      .sign
        font-size: 22px
        font-weight: 400
        max-width: 600px
        margin: 12px 0 32px 0
        color: #ddd
        line-height: 1.1
      .buttons-wrapper
        grid-gap: 5px 20px
        display: grid
        grid-auto-flow: column
        justify-content: flex-start
        align-items: center
      .socials
        display: grid
        grid-auto-flow: column
        justify-content: flex-start
        grid-gap: 10px
        .item
          font-size: 24px
          width: 26px
          text-align: center
          &:hover
            opacity: .5

  @include respond-to(md)
    .container
      .content
        padding: 130px 0 50px 0
        grid-gap: 30px
        .title
          font-size: 42px
        .sign
          font-size: 20px

  @include respond-to(sm)
    .container
      .content
        padding: 130px 0 50px 0
        grid-gap: 30px
        justify-content: center
        justify-items: center
        text-align: center
        .title
          font-size: 34px
        .sign
          font-size: 18px
        .buttons-wrapper
          grid-auto-flow: row
</style>
