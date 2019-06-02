<template lang="pug">
  div
    hat-component
    about-component
    catalogue-offer
    suppliers-component
    partners-component
    contacts-component

</template>

<script>
import HatComponent from '@/components/Hat.vue'
import AboutComponent from '@/components/About.vue'
import CatalogueOffer from '@/components/CatalogueOffer.vue'
import SuppliersComponent from '@/components/Suppliers.vue'
import PartnersComponent from '@/components/Partners.vue'
import ContactsComponent from '@/components/Contacts.vue'
// alt

export default {
  head() {
    return {
      title: 'Главная – Classic Horse Nutrition'
    }
  },
  data() {
    return {}
  },
  created() {
    this.$parent.$parent.whiteMode = true
  },
  destroyed() {
    this.$parent.$parent.whiteMode = false
  },
  components: {
    HatComponent,
    AboutComponent,
    CatalogueOffer,
    SuppliersComponent,
    PartnersComponent,
    ContactsComponent
  }
}
</script>

<style lang="sass" scoped>

</style>
