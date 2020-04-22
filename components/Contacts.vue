<template lang="pug">
  
  section.contacts
    .container
      .content
        h2.section-title Контакты
      .content.wrapper

        .info
          .logo
            img(src='@/assets/img/logo-400.png' alt='Classic Horse Nutrition – Качественные и эффективные кормовые добавки для лошадей')
          .phone-n-mail
            a.phone(href='tel:+7 (928) 332-22-29' target='_blank') 
              i.fas.fa-phone
              | +7 (928) 332-22-29
            a.mail(href='mailto:classichorse@yandex.ru  ' target='_blank') 
              i.fas.fa-envelope
              | classichorse@yandex.ru  
          .address 350900, Россия, Краснодарский край, г. Краснодар, пер. Ленский, 23 
          .socials
            a.item(href="https://vk.com/id541234365" target="_blank"): i.fab.fa-vk
            a.item(href="https://www.facebook.com/classic.horsenutrition" target="_blank"): i.fab.fa-facebook-f
            a.item(href="https://www.instagram.com/classic.horse.nutrition" target="_blank"): i.fab.fa-instagram
            a.item(href="https://ok.ru/profile/574397461583" target="_blank"): i.fab.fa-odnoklassniki

        .form-wrapper(ref="form")
          h2.title Предварительный заказ
          form.form
            .field
              .tip Имя:
              input.input(type='text' name='name' v-model='form.name.value' placeholder='Иван Иванов')
              .error {{ form.name.alert }}
            .field
              .tip Email:
              input.input(type='text' name='email' v-model='form.email.value' placeholder='ivan.ivanov@mail.ru')
              .error {{ form.email.alert }}
            .field
              .tip Номер телефона::
              <masked-input mask="+1 (111) 111-11-11" class='input' name='phone' v-model='form.phone.value' placeholder='+7 (900) 000-00-00'/>
              .error {{ form.phone.alert }}
            .field
              .tip Сообщение:
              textarea.input(name='message' v-model='form.message.value' placeholder='Расскажите, какой вопрос или продукт вас интересует')
              .error {{ form.message.alert }}
            .button(v-if='!result' @click.prevent='prepareMailAndSend()') Отправить
            .announce(v-else) {{ result }}



        
</template>

<script>
import axios from 'axios'
import MaskedInput from 'vue-masked-input'

export default {
  data() {
    return {
      form: {
        name: {
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
        phone: {
          value: '',
          alert: '',
          required: false
        },
        message: {
          value: '',
          alert: '',
          required: false
        }
      },
      result: ''
    }
  },
  async mounted() {
    await this.$nextTick
    if (this.$route.query.scroll == 'contacts') {
      const { form } = this.$refs
      let top = form.offsetParent.offsetTop + form.offsetTop

      window.scrollTo({
        top,
        left: 0,
        behavior: 'smooth'
      })

      this.form.message
    }

    const { product } = this.$route.query

    if (product) {
      this.form.message.value = `Здравствуйте. Меня интересует продукт ${product}...`
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
      bodyFormData.set('email', this.form.email.value)
      bodyFormData.set('message', this.form.message.value)
      bodyFormData.set('phone', this.form.phone.value)

      this.result = 'Отправляется...'

      axios({
        method: 'post',
        url: '/home.php',
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
  },
  components: {
    MaskedInput
  }
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.contacts
  padding: 50px 0
  .container
    .content
      .section-title
        font-size: 32px
        text-transform: uppercase
        font-weight: 700
        text-align: center
        margin: 0 0 30px 0
      &.wrapper
        padding: 30px 0
        display: grid
        grid-template-columns: 1fr 350px
        grid-gap: 50px
        .info
          @include shadow(1)
          padding: 30px
          background-color: #f9f9f9
          border-radius: 4px
          display: grid
          grid-gap: 30px
          grid-template-columns: 2fr 3fr
          align-items: center
          justify-items: center
          .logo
            display: grid
            justify-content: center
            align-items: center
            img
              width: 200px
              max-width: 90%
          .phone-n-mail
            display: grid
            font-size: 20px
            font-weight: 600
            grid-gap: 5px
            justify-self: flex-start
            a
              text-decoration: none
              i.fas
                margin-right: 10px
          .address
            grid-column: span 2
            font-size: 14px
            color: #666
            text-align: center
            align-self: flex-end
          .socials
            grid-column: span 2
            display: grid
            grid-auto-flow: column
            justify-content: flex-start
            grid-gap: 10px
            align-self: flex-start
            .item
              font-size: 24px
              width: 26px
              text-align: center
              &:hover
                opacity: .5

        .form-wrapper
          @include shadow(1)
          padding: 30px
          background-color: #f9f9f9
          border-radius: 4px
          .title
            text-align: center
            font-size: 32px
            font-weight: 600
            margin: 0
          .form
            margin: auto
            max-width: 370px
            padding: 20px 0
            width: 100%
            display: grid
            justify-items: flex-end
            grid-gap: 10px
            textarea
              resize: vertical
              height: 100px
            .field
              width: 100%
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
                &:focus
                  outline: none
              .error
                font-size: 13px
                color: #DC4C40
                margin: 2px 0 0 0
            .announce
              margin-top: 22px
              font-size: 14px
              color: #666
              width: 100%
              text-align: center

  @include respond-to(lg)
    .container
      .content
        &.wrapper
          grid-template-columns: auto
          max-width: 500px
          margin: auto
          .info
            grid-gap: 15px

  @include respond-to(md)
    .container
      .content
        &.wrapper
          padding: 10px 0
          grid-gap: 30px
          .info
            .logo
              display: none
            .phone-n-mail
              justify-self: center
              grid-column: span 2
          .form-wrapper
            padding: 20px
</style>
