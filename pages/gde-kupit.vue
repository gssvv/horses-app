<template lang="pug">
  
  .dealers
    .container
      .content
        h2.title Где купить?
        p.note Список наших дилеров
        .dealers-wrapper
          .dealer-card(v-for='(dealer, index) in dealers' :key='index')
            p(v-text='dealer.town').dealer__town
            h4(v-text='dealer.name').dealer__name 
            p(v-for='address in dealer.addresses' v-text='address').dealer__address
            p(v-if='dealer.phones.length').dealer__phones
              span(v-for='(phone, index) in dealer.phones' :key='index')
                a(:href="`tel:${phone}`" v-text='phone' target='_blank' rel='nofollow')
                span(v-if='index + 1 != dealer.phones.length' v-text="`, `")
            p(v-if='dealer.site').dealer__site: a(:href='dealer.site' v-text='dealer.site' target='_blank' rel='nofollow')
            .dealer__socials
              a(:href='link' v-for='(link, index) in dealer.socials' target='_blank' rel='nofollow'): i(:class='`fab fa-${index}`') 

        
</template>

<script>
export default {
  data() {
    return {
      dealers: [
        {
          name: 'Воронежский конный магазин (ИП Ярыгин С.Ю)',
          town: 'Воронеж',
          addresses: [
            'Воронежская область, Воронеж, Коминтерновский район, улица Проспект Труда, 48'
          ],
          site: 'https://konimag.ru/',
          socials: {
            vk: 'https://vk.com/konimag36',
            instagram: 'https://www.instagram.com/voronezh_horse_shop/'
          },
          phones: ['+7 (473) 246-06-09', '+7 (473) 296-90-07']
        },
        {
          name: 'ООО «Лакшми» Калинины',
          town: 'Санкт-Петербург',
          addresses: [
            'Санкт-Петербург и Ленинградская область. С доставкой по СПб и ЛО. Так же в магазинах, адреса уточнять по телефону для связи.'
          ],
          socials: {
            vk: 'https://vk.com/classichorsenutritionspb'
          },
          phones: ['+7 (906) 27-27-518']
        },
        {
          name: 'Сеть магазинов «Конкур»',
          town: 'Краснодар',
          addresses: [
            'Краснодарский край, г Краснодар. Ул.Суворова, 74/1',
            'Ул.Беговая, 11, Ипподром'
          ],
          site: 'https://www.magkonkur.ru/',
          phones: ['+7 (918) 31-331-28', '+7 (918) 45-89-414']
        },
        {
          name: 'Сеть магазинов «Конкур»',
          town: 'Майкоп',
          addresses: ['Республика Адыгея, г. Майкоп, ул.Хакурате, 196'],
          site: 'https://www.magkonkur.ru/',
          phones: [
            '+7 (918) 31-331-28',
            '+7 (952) 978-71-50',
            '+7 (903) 466-60-63'
          ]
        },
        {
          name: 'Сеть магазинов «Конкур»',
          town: 'Ростов-на-Дону',
          addresses: [
            'Ростовская область, г. Ростов-на-Дону, Ул.Малюгиной, 233, Ипподром'
          ],
          site: 'https://www.magkonkur.ru/',
          phones: ['+7 (918) 31-331-28', '+7 (903) 43-85-939']
        },
        {
          name: 'Сеть магазинов «Конкур»',
          town: 'Сочи',
          addresses: [
            'Краснодарский край, г. Сочи, поселок Дагомыс, КСК «Светлана»'
          ],
          site: 'https://www.magkonkur.ru/',
          phones: ['+7 (918) 31-331-28', '+7 (918) 616-12-61']
        },
        {
          name: 'Crazy Horse , Рахимзанова Наталья Петровна',
          town: 'Ульяновск',
          addresses: [
            'Ульяновская обл., г Ульяновск., Ул.Лесная 11 или пос. Мирный, ул. Южная'
          ],
          socials: {
            vk: 'https://vk.com/crazyhorseshop'
          },
          phones: ['+7 (917) 635-25-15', '+7 (999) 194-94-84']
        },
        {
          name: 'Конный магазин Фаворит Ярославль',
          town: 'Ярославль',
          addresses: ['Г. Ярославль, ул. Мостецкая 1'],
          socials: {
            vk: 'https://vk.com/shopfavorite76'
          },
          phones: ['+7 (903) -824-60-50']
        },
        {
          name: 'Интернет магазин «КормаСиб»',
          town: 'Новосибирск',
          site: 'http://kormasib-shop.ru/',
          socials: {
            vk: 'https://vk.com/kormasib'
          },
          phones: ['+7 (913) 985-63-45', '+7 (383) 213-63-45']
        },
        {
          name: 'Магазин на Беговой, ИП Пущин В.И.',
          town: 'Москва',
          addresses: ['г. Москва, Улица Беговая, 22б, Ипподром'],
          phones: ['+7 (968) 608-54-45, +7 (903) 565-69-09']
        },
        {
          name: 'Дилер ООО «Алтын Агро»',
          town: 'Казань',
          addresses: ['Республика Татарстан, Казань, Нурлат'],
          phones: ['+7 (987) 290-83-41']
        },
        {
          name: 'Pegasus Company',
          town: 'Рыбинск',
          addresses: [
            'Ярославская обл., г. Рыбинск, ул. Катерская, д. 1, кв. 107, 152920'
          ],
          socials: {
            vk: 'https://vk.com/kseniahorses',
            instagram: 'https://www.instagram.com/pegasus_shop_ryb/'
          },
          phones: ['+7 (915) 979-15-37']
        },
        {
          name: 'Магазин КОННЫЙ СПОРТ "ИСТОК"',
          town: 'Екатеринбург',
          addresses: ['г. Екатеринбург, ул. Сурикова, 28'],
          site: 'https://konimag.ru/',
          socials: {
            vk: 'https://vk.com/club85489841'
          },
          phones: ['+7 (922) 031-74-57']
        },
        {
          name: 'ООО «Мега-Экспорт»',
          town: 'Черкесск',
          phones: ['+7 (903) 422-57-57']
        }
      ]
    }
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.dealers
  .container
    .content
      @include shadow(1)
      padding: 50px 40px
      background-color: #fff
      grid-template-columns: minmax(500px, 600px) auto
      grid-gap: 30px
      .title
        font-size: 36px
        font-weight: 700
        text-transform: uppercase
        margin: 0
      .note
        font-size: 14px 
        font-weight: 600
        margin: 0
      .dealers-wrapper
        margin-top: 40px
        display: grid
        grid-template-columns: 1fr 1fr
        grid-gap: 50px
        a:link, a:visited
          color: $primary
        .dealer-card
          p
            margin: 5px 0 0 0
            font-size: 16px
          .dealer
            &__town
              font-size: 18px
            &__name
              font-size: 28px
              font-weight: 600
              margin: 0 0 15px 0
            &__socials
              display: flex
              margin: 15px -7.5px 0
              a
                color: #222
                margin: 0 7.5px
                font-size: 24px
                &:hover
                  opacity: .75

  @include respond-to(lg)
    .container
      .content
        .dealers-wrapper
          grid-template-columns: 1fr
          grid-gap: 30px
          .dealer-card
            .dealer
              &__name
                font-size: 24px

  @include respond-to(sm)
    .container
      .content
        padding: 20px
        .title
          font-size: 28px
        .dealers-wrapper
          .dealer-card
            .dealer
              &__name
                font-size: 20px
          
            


</style>
