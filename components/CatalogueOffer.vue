<template lang="pug">
  .offer
    .container
      .content
        p.text Мы предлагаем качественные и эффективные витаминно-минеральные добавки для обогащения традиционного рациона лошадей
        
        nuxt-link.button.white.big.non-trans(to="catalogue") Каталог

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

.offer
  padding: 50px 0
  background-color: $primary
  .container
    .content
      margin: auto
      max-width: 900px
      display: grid
      grid-gap: 50px
      grid-template-columns: 1fr auto
      align-items: center
      color: #fff
      .text
        font-size: 24px
        font-weight: 400
      .button
        margin: 0
        
  @include respond-to(lg)
    .container
      .content
        .text
          font-size: 18px
        
  @include respond-to(md)
    .container
      .content
        grid-gap: 30px
        .button
          font-size: 20px
        
  @include respond-to(sm)
    .container
      .content
        grid-gap: 10px
        grid-template-columns: auto
        justify-content: center
        justify-items: center
        .text
          text-align: center


</style>

