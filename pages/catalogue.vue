<template lang="pug">
  .catalogue
    .container
      template(v-if="!groupId")
        .content.title
          h1.title Каталог
        .content.wrapper
          group-block(v-for="item in groups" :key="item.id" v-bind="item")
          
      template(v-else)
        .content.title
          h1.title(v-text="groups[groupId].title")
        .content.wrapper
          product-block(v-for="item in blocks.filter(e => e.group == groups[groupId].num)" :key="item.id" v-bind="item")

        .content.info
          | <b class='imp'>Важно!</b> При вскрытии иной упаковки с подкормкой для лошадей содержащиеся в ней витамины, макро, микроэлементы и другие питательные вещества подвергаются прогорганию, окислению и разрушению под воздействием света, кислорода, температуры. <b>Classic Horse Nutrition</b> предлагает использовать в кормлении <b>запатентованную серию добавок для лошадей Super Mix и Lacto Enzyme</b>, защищённых современной <b>порционной упаковкой</b>, рассчитанной на непосредственное вскрытие и введение добавки к существующему рациону. Это позволяет сохранять качество продукта длительное время и получать максимальный эффект от его применения.

</template>

<script>
import ProductBlock from '@/components/ProductBlock'
import GroupBlock from '@/components/GroupBlock'
import productsData from '@/assets/productsData'
import groups from '@/assets/groups'

export default {
  head() {
    return {
      title: 'Каталог'
    }
  },
  data() {
    return {
      blocks: Object.values(productsData),
      groups: groups
    }
  },
  computed: {
    groupId() {
      const { group } = this.$route.query
      return group
    }
  },
  created() {},
  components: {
    ProductBlock,
    GroupBlock
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
      padding: 32px 0 20px 0
      .subtitle
        margin: 0px 0 4px 0
        color: #888
        text-transform: uppercase
        font-size: 16px
        letter-spacing: 1.5px
        font-weight: 400
      .title
        font-size: 36px
        font-weight: 700
        text-transform: uppercase
        margin: 0
    .content.wrapper
      display: grid
      grid-gap: 30px 15px
      grid-template-columns: repeat(auto-fit, minmax(290px, calc(33.3333% - 10px)))
      margin-bottom: 40px

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
