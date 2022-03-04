<template>
    <div class="container p-3">
        <div class="row">
            <div class="col-md-3 ">
                <categorais-said-bar :categorais='getAllCategorais' />
            </div>
            <div class="col-md-9" v-if="loading">
                <div class="row">
                    <div class="col-md-4 col-lg-3"
                        v-for="product in getAllProducts"
                        :key="product.id">
                        <card-item :product="product" />
                    </div>
                </div>
            </div>
            <loading-progress v-else/>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import LoadingProgress from '../components/Global/loadingProgress.vue';
import CardItem from "../components/shope/CardItem.vue";
import CategoraisSaidBar from "../components/shope/CategoraisSaidBar.vue";

export default {
    data: () => ({
        loading: true,
    }),
    components: { CardItem, CategoraisSaidBar, LoadingProgress },
    computed: {
        ...mapGetters(["productIsLoaded","getAllProducts","getAllCategorais"])
    },
    methods: {
         fetchData:async function(){
        this.loading = false
        await new Promise(r => setTimeout(r, 2000));
        this.$store.dispatch('getCartsUser')
        this.$store.dispatch('getProductByCategory',this.$route.params.id)
        this.loading = true
        }
    },
    created(){
            this.$watch(
                () => this.$route.params,() => {
                    this.fetchData()
                },
                { immediate: true }
            )
    }
};
</script>

<style></style>
