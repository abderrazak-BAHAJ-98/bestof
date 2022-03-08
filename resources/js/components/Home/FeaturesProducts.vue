<template>

    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4" v-for="p in getAllProducts.slice(0,3)" :key="p.id">
                    <div class="card h-100">
                        <img :src="p.p_image_1" class="card-img-top" :alt="p.p_name">
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">{{p.p_price}} $</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark" v-text="p.p_name"></a>
                            <p class="card-text" v-text="p.p_description"></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

</template>

<script>
import { mapGetters } from 'vuex'
export default {
    data:()=>({
        categorais:[],
    }),
    computed:mapGetters(["getAllProducts"]),

}
</script>

<style>
.card-img-top{
    max-height: 20em;
}
</style>