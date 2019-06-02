<template lang="pug">
  
  section.about
    .container
      .content
        h2.section-title: a(name='about') О компании
      .content.info
        .para 
          p Партнёрское предприятие по производству кормовых добавок для лошадей и торговая марка <b>Classic Horse Nutrition</b> предлагает Вашему вниманию качественных и эффективных кормовых добавок для лошадей. 

          p Вся продукция разработана и изготовлена при помощи наших партнёров из <b>Швейцарии, Австрии, Канады, России</b>, поставляющих высококлассные и эффективные витамнно-минеральные комплексы, пробиотики, аминокислоты, антиоксиданты, современные инактиваторы микотоксинов в кормах и другие компоненты, позволяющие сбалансировать и изготовить действительно продукт высокого качества. 

          p(@click='hiddenContent = !hiddenContent'): a.show 
            span Развернуть 
            i.fas.fa-angle-down 

          .hidden(:class='{active: hiddenContent}')
            p Все ингредиенты и производители были выбраны нами среди десятков прочих за свою эффективность, которая подтверждена более чем 20-ти летней практикой успешного использования во многих странах Европы и мира. Продукты от торговой марки <b>Classic Horse Nutrition</b> это высококачественные корма и добавки способные обогащать и балансировать традиционный рацион лошадей легко усвояемыми витаминами, макро и микроэлементами, незаменимыми аминокислотами, антиоксидантами и другими питательными веществами, а также имеют высокую способность оптимизировать и улучшать кишечное пищеварение лошадей. 

            p Трёхслойная <b>порционная</b> алюминизированная упаковка защищает продукт от постоянного контакта с ультрафиолетом, кислородом, предотвращает добавку от прогоркания, окисления витаминов и минералов, излишней бактериальной обсеменённости продукта, позволяет увеличивать срок хранения продукта <b>до 6 месяцев</b> и является удобной в гигиеническом и санитарном отношении. 

          p: b Мы рады предложить Вам продукцию из «первых рук» от завода производителя и надеемся она будет полезной и эффективной для ваших лошадей. Мы рады долгосрочному сотрудничеству.
            
          p: b Вы можете приобрести товар у нас на сайте и других магазинах.

        .stats
          .item
            .num 5 лет
            .text Исследований и разработок
          .item
            .num 12
            .text Специализированных продуктов
          .item
            .num 1000+
            .text Довольных клиентов
          


        
</template>

<script>
export default {
  data() {
    return {
      hiddenContent: false
    }
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.about
  padding: 50px 0
  .container
    .content
      .section-title
        font-size: 32px
        text-transform: uppercase
        font-weight: 700
        text-align: center
        margin: 0 0 30px 0
      &.info
        display: grid
        grid-template-columns: 1fr minmax(auto, 300px)
        grid-gap: 30px
        .para
          font-size: 16px
          p
            margin: 15px 0
            text-align: justify
          .show
            font-weight: 600
            color: $primary
            cursor: pointer
            &:hover
              text-decoration: underline
            i.fas
              vertical-align: bottom
          .hidden
            max-height: 0
            overflow: hidden
            transition: .3s ease
            &.active
              max-height: 800px
              margin: -10px 0


        .stats
          display: grid
          grid-gap: 20px 
          justify-content: center
          justify-items: center
          align-content: flex-start
          .item
            display: grid
            text-align: center
            grid-gap: 5px
            justify-items: center
            align-items: flex-start
            align-content: flex-start
            .num
              color: $primary
              font-weight: 700
              font-size: 52px
              line-height: 1
            .text
              font-weight: 400
              font-size: 18px

  @include respond-to(lg)
    .container
      .content
        &.info
          grid-template-columns: auto
          .stats
            order: -1
            grid-auto-flow: column
            grid-auto-columns: 1fr
            .num
              font-size: 34px

  @include respond-to(sm)
    .container
      .content
        &.info
          .stats
            grid-auto-flow: row



</style>
