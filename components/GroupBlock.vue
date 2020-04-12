<template lang="pug">
  nuxt-link(:to='{path: `/catalogue`, query: { group: id }}').item
    .image
      img(:src='require(`@/assets/img/groups/${id}.png`)' :alt='title')
    .title {{ title }}

</template>

<script>
export default {
  props: {
    id: String,
    title: String
  },
  data() {
    return {}
  },
  methods: {}
}
</script>

<style lang="sass" scoped>
@import '@/assets/style/variables.sass'

.item
  @include shadow(1)
  display: grid
  grid-auto-columns: minmax(80px, auto) auto
  padding: 20px
  background-color: #fff
  grid-gap: 10px 5px
  text-decoration: none
  .title
    grid-area: span 1 / span 2
    font-weight: 700
    line-height: 1
    margin: 10px 0
    color: #222
    font-size: 28px;
    line-height: 1.3;
  .image
    grid-column: span 2
    width: auto;
    height: 250px;
    margin: -20px -20px 0;
    overflow: hidden
    img
      object-fit: cover;
      object-position: center center;
      width: 100%;
      border-radius: 2px 2px 0 0;
      height: 100%;
      transition: .75s ease
  &:hover
    .image
      img
        transform: scale(1.3)
</style>
