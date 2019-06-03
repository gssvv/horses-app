<template lang="pug">
  .contacts
    .container
      .content
        .contact-wrapper
          h2.title Сотрудничество
          p.note Стать партнером
          form.form
            .field
              .tip Название ООО, ИП:
              input.input(type='text' name='name' v-model='form.name.value')
              .error {{ form.name.alert }}
            .field
              .tip Магазин, интернет-магазин:
              input.input(type='text' name='shop' v-model='form.shop.value')
              .error {{ form.shop.alert }}
            .field
              .tip Email:
              input.input(type='text' name='email' v-model='form.email.value')
              .error {{ form.email.alert }}
            .field
              .tip Контактный телефон:
              input.input(type='text' name='phone' v-model='form.phone.value')
              .error {{ form.phone.alert }}
            .field
              .tip ИНН, ОРГН:
              input.input(type='text' name='inn' v-model='form.inn.value')
              .error {{ form.inn.alert }}
            .field
              .tip Регион (край, область, республика):
              input.input(type='text' name='region' v-model='form.region.value')
              .error {{ form.region.alert }}
            .field
              .tip Населенный пункт (район, город, посёлок, станица):
              input.input(type='text' name='humset' v-model='form.humset.value')
              .error {{ form.humset.alert }}
            .field.message
              .tip Комментарий:
              textarea.input(name='message' v-model='form.message.value')
              .error {{ form.message.alert }}
            .button-wrapper
              .button(v-if='!result' @click.prevent='prepareMailAndSend()') Отправить
              .announce(v-else) {{ result }}

        .contact-info
          h2.title Контакты
          .name ООО "Kubanagrotorg" Krasnodar, Russia,
          .phone Горячая линия/Hotline: 
            a(href='tel:+7 (928) 332-22-29' target='_blank').dif +7 (928) 332-22-29
          .mail Почта/Email: 
            a(href='mailto:classichorse@yandex.ru' target='_blank').dif classichorse@yandex.ru
          .socials
            a.item(href="https://vk.com/id541234365" target="_blank"): i.fab.fa-vk
            a.item(href="https://www.facebook.com/classic.horsenutrition" target="_blank"): i.fab.fa-facebook-f
            a.item(href="https://www.instagram.com/classic.horse.nutrition" target="_blank"): i.fab.fa-instagram
            a.item(href="https://ok.ru/profile/574397461583" target="_blank"): i.fab.fa-odnoklassniki

    

</template>

<script>
import axios from 'axios'

export default {
  head() {
    return {
      title: 'Стать партнером – Classic Horse Nutrition'
    }
  },
  data() {
    return {
      form: {
        name: {
          value: '',
          alert: '',
          required: true
        },
        shop: {
          value: '',
          alert: ''
        },
        email: {
          value: '',
          alert: '',
          required: true,
          regExp: /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/
        },
        phone: {
          value: '',
          alert: '',
          required: true
        },
        inn: {
          value: '',
          alert: ''
        },
        humset: {
          value: '',
          alert: '',
          required: true
        },
        region: {
          value: '',
          alert: '',
          required: true
        },
        message: {
          value: '',
          alert: ''
        }
      },
      result: ''
    }
  },
  methods: {
    prepareMailAndSend() {
      let essentialMsg = 'Поле обязятельно для заполнения'
      let incorrectMsg = 'Поле заполнено некорректно'
      let error = false

      for (let i in this.form) {
        let field = this.form[i]

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

      if (!error) this.sendMail()
    },
    sendMail() {
      let bodyFormData = new FormData()
      bodyFormData.set('name', this.form.name.value)
      bodyFormData.set('shop', this.form.shop.value)
      bodyFormData.set('email', this.form.email.value)
      bodyFormData.set('phone', this.form.phone.value)
      bodyFormData.set('inn', this.form.inn.value)
      bodyFormData.set('region', this.form.region.value)
      bodyFormData.set('humset', this.form.humset.value)
      bodyFormData.set('message', this.form.message.value)

      this.result = 'Отправляется...'

      axios({
        method: 'post',
        url: '/contacts.php',
        data: bodyFormData,
        config: { headers: { 'Content-Type': 'multipart/form-data' } }
      })
        .then(res => {
          this.result = 'Сообщение успешно отправлено'
        })
        .catch(err => {
          this.result =
            'При отправке сообщения возникла ошибка. Свяжитесь с нами по почте spcon@bk.ru'
        })
    }
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.contacts
  .container
    .content
      @include shadow(1)
      padding: 50px 40px
      background-color: #fff
      display: grid
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
      .contact-info
        display: grid
        font-size: 16px
        font-weight: 400
        padding: 0 30px 30px 30px
        align-content: flex-start
        grid-gap: 15px
        a:link
          color: $primary
        .socials
          display: grid
          grid-auto-flow: column
          justify-content: flex-start
          grid-gap: 10px
          .item
            font-size: 24px
            width: 26px
            text-align: center
            &:link
              color: #222
            &:hover
              opacity: .5
      .contact-wrapper
        .form
          display: grid
          margin-top: 30px
          grid-template-columns: 1fr 1fr
          max-width: 600px
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
            .input
              @include shadow(1)
              border-radius: 4px
              width: 100%
              background-color: #fff
              border: none
              font-family: 'Source Sans Pro', sans-serif
              font-size: 16px
              padding: 7.5px 10px
              resize: none
              &:focus
                outline: none
            .error
              font-size: 13px 
              color: #DC4C40
              margin: 2px 0 0 0
          .button-wrapper
            grid-column: span 2
            justify-self: flex-end
            .announce
              margin-top: 22px
              font-size: 14px
              color: #666
              width: 100%
              text-align: center

  @include respond-to(lg)
    .container
      .content
        grid-template-columns: auto
        grid-gap: 15px
        .contact-info
          order: -1
          padding: 0 0 30px 0

  @include respond-to(md)
    .container
      .content
        .contact-wrapper
          .form
            grid-template-columns: auto
            .button-wrapper
              grid-column: span 1

  @include respond-to(sm)
    .container
      .content
        padding: 20px
        .title
          font-size: 28px
        .contact-info
          order: -1
          padding: 0 0 15px 0
        

</style>
