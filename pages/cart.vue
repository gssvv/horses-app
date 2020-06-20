<template lang="pug">
  .cart
    .container
      .content
        .message-wrapper(v-if='finalInfo.status')
          .success(v-if="finalInfo.status == 'success'")
            h1.icon.green: i.fas.fa-check-circle

            h1.title Заказ <span class='green' v-if='finalInfo.id'>№{{ finalInfo.id }}</span> создан

            p.desc Заказ <span class='green' v-if='finalInfo.id'>№{{ finalInfo.id }}</span> успешно начат. На указанную вами почту <span class='green'>{{ finalInfo.email }}</span> было отправлено уведомление с информацией о заказе (письмо может по ошибке попасть в папку СПАМ). 
            p.desc(v-if='finalInfo.id') Также, в ходе транзакции на указанные вами контактные данные был отправлен <span class='green'>электронный чек</span> – настоятельно рекомендуем сохранить его.
            p.desc Если у вас возникли проблемы с заказом или есть другие вопросы – обратитесь к нам по телефону <a href='tel:+7 (928) 332-22-29'>+7 (928) 332-22-29</a> или по почте <a href='info@korma-anilyn.ru'>info@korma-anilyn.ru</a>

            nuxt-link(to='/').button.big На главную


          .fail(v-else)
            h1.icon: i.fas.fa-exclamation-circle

            h1.title Ошибка

            p.desc При обработке заказа возникла ошибка. Попробуйте позже, либо обратитесь к нам по телефону <a href='tel:+7 (928) 332-22-29'>+7 (928) 332-22-29</a> или по почте <a href='info@korma-anilyn.ru'>info@korma-anilyn.ru</a>

            nuxt-link(to='/').button.big На главную


        .cart-wrapper(v-else)
          h1.title Корзина
          h3.note {{ getCartAmount }} товаров на сумму 
            span.price {{ finalPrice }}р
          .products
            cart-item(v-for='item in items' v-bind='item' :key="item.id")
            nuxt-link.more(to='/catalogue')
                i.fas.fa-shopping-cart
                |Открыть каталог

        .order-wrapper(v-if='getCartAmount > 0 && !finalInfo.status')

          h2.title Оформление заказа
          h3.note Заполните все необходимые поля

          form.user-data
            .field
              .tip ФИО:
              input.input(type='text' name='name' v-model='userForm.name.value' placeholder='Иванов Иван Иванович')
              .error {{ userForm.name.alert }}
            .field
              .tip Номер телефона:
              masked-input(mask="\+1 (111) 111-11-11" class='input' name='phone' v-model='userForm.phone.value' placeholder='+7 (900) 000-00-00')
              .error {{ userForm.phone.alert }}
            .field
              .tip Email:
              input.input(type='text' name='email' v-model='userForm.email.value' placeholder='customer@example.com')
              .error {{ userForm.email.alert }}
            .field
              .tip Населенный пункт:
              input.input(type='text' name='area' v-model='userForm.area.value' placeholder='г. Москва')
              .error {{ userForm.area.alert }}
            .field
              .tip Серия и номер паспорта:
              masked-input(mask="1111 111111" class='input' name='passport' v-model='userForm.passport.value' placeholder='0000 000000')
              .error {{ userForm.passport.alert }}

            .field
              .tip Оплата:
              p.radio
                input(type="radio" v-model='userForm.payment.value' value='online')
                span Онлайн
              p.radio
                input(type="radio" v-model='userForm.payment.value' value='receipt')
                span При получении (в любом отделении ТК CDEK)

              .error {{ userForm.payment.alert }}

          .result
            form.row(ref='payForm' action='https://merchant.roboxchange.com/Index.aspx' method='POST')
              .hidden
                input(name='MrchLogin' value='hbhorse')
                input(name='OutSum' :value='finalPrice')
                input(name='InvId' value='0')
                input(name='Desc' value='Заказ на сайте superhorse.ru')
                input(name='SignatureValue' :value='signatureValue')
                input(name='IncCurrLabel' value='RUB')
                input(name='Culture' value='ru')
                input(name='Encoding' value='utf-8')

                input(name='Shp_email' v-model='userForm.email.value')
                input(name='Shp_name' v-model='userForm.name.value')
                textarea(name='Shp_info' :value='productInfo')
                input(name='Shp_phone' v-model='userForm.phone.value')
                input(name='Shp_passport' v-model='userForm.passport.value')
                input(name='Shp_area' v-model='userForm.area.value')


              .button.big(@click='order()') Заказать
              a.price 
                | Итог: 
                span.num {{ finalPrice }}р
            .tip 
              | После оформления заявку с вами свяжется наш специалист для уточнения деталей
              br
              | Условия доставки обсуждаются идивидуально
              br
              nuxt-link(to='/contacts') Связяться с нами

    
</template>

<script>
import MaskedInput from 'vue-masked-input'
import CartItem from '@/components/CartItem'
import { mapState } from 'vuex'
import productsList from '@/assets/productsList'
import axios from 'axios'

export default {
  head() {
    return {
      title: 'Корзина – Classic Horse Nutrition'
    }
  },
  data() {
    return {
      finalInfo: {},
      finalPrice: 0,
      signatureValue: null,
      productInfo: null,
      userForm: {
        name: {
          value: '',
          alert: '',
          required: true
        },
        phone: {
          value: '',
          alert: '',
          required: true
        },
        area: {
          value: '',
          alert: '',
          required: true
        },
        passport: {
          value: '',
          alert: '',
          required: true
        },
        email: {
          value: '',
          alert: '',
          required: true,
          regExp: /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/i
        },
        payment: {
          value: 'receipt',
          alert: '',
          required: true
        }
      }
    }
  },
  created() {
    if (this.$route.query.status) {
      this.finalInfo.status = this.$route.query.status
      if (this.finalInfo.status == 'success') {
        this.finalInfo.email = this.$route.query.email
        this.finalInfo.id = this.$route.query.id

        this.$store.dispatch('cleanCart')
      }
    }

    this.updateFinalPrice()
  },
  mounted() {
    console.log()
  },
  computed: {
    ...mapState(['cart']),
    items() {
      return this.getItems()
    },
    getCartAmount() {
      return this.$store.getters.getCartAmount
    }
  },
  watch: {
    items() {
      this.updateFinalPrice()
    }
  },
  methods: {
    prepareMail() {
      let essentialMsg = 'Поле обязятельно для заполнения'
      let incorrectMsg = 'Поле заполнено некорректно'
      let error = false

      for (let i in this.userForm) {
        let field = this.userForm[i]

        if (field.required && field.value.length < 1) {
          field.alert = essentialMsg
          error = true
          continue
        } else {
          field.alert = ''
        }

        if (field.regExp && !field.regExp.test(field.value)) {
          field.alert = incorrectMsg
          error = true
          continue
        } else {
          field.alert = ''
        }
      }

      return error ? false : true
    },
    async order() {
      if (!this.prepareMail())
        return this.$toasted.show(
          `Форма заполнена неверно. Проверьте корректность заполнения полей.`,
          {
            theme: 'toasted-primary',
            position: 'top-right',
            className: 'error',
            duration: 5000,
            icon: 'times'
          }
        )

      let { payForm } = this.$refs
      let productInfo = this.getItems()
      let productInfoString = productInfo.reduce(
        (prev, current, index, arr) => {
          return `${prev}${current.title}:| ${current.amount} x ${current.box *
            current.price}р;`
        },
        ''
      )
      productInfoString = productInfoString.slice(0, -1)

      if (this.userForm.payment.value == 'receipt')
        return this.orderReceipt(productInfoString)

      this.productInfo = productInfoString
      let bodyFormData = new FormData()
      bodyFormData.set('summ', this.finalPrice)
      bodyFormData.set('info', productInfoString)

      bodyFormData.set('email', this.userForm.email.value)
      bodyFormData.set('name', this.userForm.name.value)
      bodyFormData.set('phone', this.userForm.phone.value)
      bodyFormData.set('area', this.userForm.area.value)
      bodyFormData.set('passport', this.userForm.passport.value)

      axios({
        method: 'post',
        url: '/payment.php',
        data: bodyFormData,
        config: { headers: { 'Content-Type': 'multipart/form-data' } }
      }).then(res => {
        console.log(res)

        this.signatureValue = res.data

        setTimeout(() => {
          payForm.submit()
        }, 100)
      })
    },
    orderReceipt(productInfoString) {
      let bodyFormData = new FormData()
      bodyFormData.set('summ', this.finalPrice)
      bodyFormData.set('info', productInfoString)

      bodyFormData.set('email', this.userForm.email.value)
      bodyFormData.set('name', this.userForm.name.value)
      bodyFormData.set('phone', this.userForm.phone.value)
      bodyFormData.set('area', this.userForm.area.value)
      bodyFormData.set('passport', this.userForm.passport.value)

      axios({
        method: 'post',
        url: '/order.php',
        data: bodyFormData,
        config: { headers: { 'Content-Type': 'multipart/form-data' } }
      }).then(res => {
        this.$router.push({ path: '/cart?status=success' })
        setTimeout(() => {
          location.reload()
        }, 1)
      })
    },
    updateFinalPrice() {
      let result = 0

      for (let i of this.items) {
        result += i.box * i.price * i.amount
      }

      this.finalPrice = result

      // uncomment for test payments
      // this.finalPrice = 1
    },
    getItems() {
      let result = []

      for (let i in this.cart) {
        if (this.cart[i].amount > 0) {
          let item = productsList.find(e => e.id == i)
          if (!item) continue

          item.amount = this.cart[i].amount

          result.push(item)
        }
      }

      return result
    },
    changeAmount(id, amount) {
      let item = this.items.find(e => e.id == id)
      let index = this.items.indexOf(item)

      this.items[index].amount = amount
      this.$store.dispatch('updateProduct', { id, amount })
    }
  },
  components: { CartItem, MaskedInput }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.cart
  .container
    .content
      @include shadow(1)
      padding: 50px 40px
      background-color: #fff
      .message-wrapper
        max-width: 500px
        margin: auto
        text-align: center
        margin-bottom: 50px
        .icon
          font-size: 110px
          margin: 15px 0
        .red
          color: #f44336
        .green
          color: $primary
          font-weight: 600
        .desc
          margin: 30px 0
      .title
        font-size: 36px
        font-weight: 700
        text-transform: uppercase
        margin: 0
      .note
        font-size: 14px
        font-weight: 600
        margin: 0
        .price
          color: $primary
      .products
        margin-bottom: 70px
        margin-top: 30px
        display: grid
        grid-template-columns: repeat(auto-fill, minmax(300px, auto))
        grid-gap: 15px
        .more
          display: grid
          align-items: center
          justify-content: center
          align-content: center
          text-align: center
          padding: 30px
          font-size: 18px
          color: $primary
          border: dashed 2px $primary
          opacity: .5
          transition: .25s ease
          display: grid
          text-decoration: none
          grid-gap: 5px
          .fas
            font-size: 40px
          &:hover
            opacity: 1
      .user-data
        display: grid
        margin-top: 30px
        max-width: 300px
        width: 100%
        grid-gap: 15px 20px
        .field
          width: 100%
          &.message
            grid-row: span 3
            .input
              height: 155px
          .tip
            color: #999
            font-size: 14px
            margin: 0 0 2px 0
          .radio
            font-size: 15px
            input
              margin-right: 8px
          .input
            @include shadow(1)
            border-radius: 4px
            width: 100%
            background-color: #fff
            border: none
            font-family: 'Source Sans Pro', sans-serif
            font-size: 16px
            padding: 7.5px 10px
            &:focus
              outline: none
          .error
            font-size: 13px
            color: #DC4C40
            margin: 2px 0 0 0
      .result
        padding-top: 50px
        .row
          display: grid
          justify-content: flex-start
          align-items: center
          grid-gap: 15px
          grid-template-columns: auto auto
          .hidden
            display: none
          .button
            margin: 0
          .price
            font-size: 32px
            font-weight: 700
            .num
              color: $primary
        .tip
          margin-top: 10px
          font-size: 14px
          color: #999

  @include respond-to(sm)
    .container
      .content
        padding: 30px 15px
        .result
          text-align: center
          .row
            grid-template-columns: auto
            justify-content: center
            .price
              order: -1
</style>
