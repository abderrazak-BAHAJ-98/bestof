<template>
  
    <div class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3" v-for="c in getAllCategorais.slice(0,3)" :key="c.id">
                <img :src="c.cat_img" class="rounded-circle img-fluid border">
                <h5 class="text-center mt-3 mb-3" v-text="c.cat_name"></h5>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    data:()=>({
        id:2
    }),
    computed: {
        ...mapGetters(["getAllCategorais"]),
    },
}
</script>

<style>

</style>