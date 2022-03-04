<template>
  <div >
      <header-component/>
      <router-view></router-view>
      <footer-component/>
      <error-component v-if="hasError"/>
  </div>
</template>

<script>
import HeaderComponent from './components/Global/HeaderComponent.vue'
import FooterComponent from './components/Global/FooterComponent.vue'
import ErrorComponent from './components/Global/ErrorComponent.vue'
import { mapGetters } from 'vuex'

export default {
  data:()=>({
  }),
  components: { HeaderComponent, FooterComponent, ErrorComponent },
  async created(){
    this.$store.dispatch('getProducts',null,{root:true})
    this.$store.dispatch('getCategorais',null,{root:true})
  },
  computed:{
      ...mapGetters(['hasError'])
    }
}
</script>

<style>

</style>