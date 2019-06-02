<template lang="pug">
  .catalogue
    .container
      .content.title
        h1.title Каталог
          h3.note: a(href='#' target='_blank') Скачать в PDF-формате
      .content.wrapper
        product-block(v-for="item in blocks" :key="item.id" v-bind="item")

      .content.info
        | <b class='imp'>Важно!</b> При вскрытии иной упаковки с подкормкой для лошадей содержащиеся в ней витамины, макро, микроэлементы и другие питательные вещества подвергаются прогорганию, окислению и разрушению под воздействием света, кислорода, температуры. <b>Classic Horse Nutrition</b> предлагает использовать в кормлении <b>запатентованную серию добавок для лошадей Super Mix и Lacto Enzyme</b>, защищённых современной <b>порционной упаковкой</b>, рассчитанной на непосредственное вскрытие и введение добавки к существующему рациону. Это позволяет сохранять качество продукта длительное время и получать максимальный эффект от его применения.

</template>

<script>
import ProductBlock from '@/components/ProductBlock'
import productsList from '@/assets/productsList'

export default {
  head() {
    return {
      title: 'Каталог – Classic Horse Nutrition'
    }
  },
  data() {
    return {
      blocks: productsList
    }
  },
  components: {
    ProductBlock
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.catalogue
  padding: 0px 0
  .container
    .content.info
      @include shadow(1)
      margin-top: 30px
      border-radius: 10px
      padding: 30px
      background-color: #fff
      text-align: center
      font-size: 16px
      color: #666
    .content.title
      padding: 30px 0 50px 0
      .title
        font-size: 36px
        font-weight: 700
        text-transform: uppercase
        margin: 0
      .note
        font-size: 14px 
        font-weight: 600
        margin: 0
        a
          color: $primary
    .content.wrapper
      display: grid
      grid-gap: 30px 15px
      grid-template-columns: repeat(auto-fit, minmax(290px, calc(33.3333% - 10px)))

  @include respond-to(lg)
    .container
      .content.wrapper
        grid-template-columns: repeat(auto-fit, minmax(290px, calc(50% - 7.5px)))

  @include respond-to(md)
    .container
      .content.info
        font-size: 14px
      .content.title
        padding: 10px 0 30px 0
      .content.wrapper
        grid-template-columns: auto




</style>
