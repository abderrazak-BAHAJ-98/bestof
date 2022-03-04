<template>
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <left-said :product="product" />
                <right-said :product="product"/>
            </div>
        </div>
    </section>
</template>

<script>
import { mapGetters } from 'vuex';
import LeftSaid from '../components/Details/LeftSaid.vue';
import RightSaid from '../components/Details/RightSaid.vue';
export default { 
    data:()=>({
        product:''
    }),
    components:{
        LeftSaid,RightSaid
    },
    created(){
        this.product = this.$store.getters.findProduct(this.$route.params.id)
    }

}
</script>

<style>

</style>