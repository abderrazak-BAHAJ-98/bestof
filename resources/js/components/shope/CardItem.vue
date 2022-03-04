<template>
        <div class="card mb-4 product-wap rounded-0">
            <div class="card rounded-0">
               
                <img
                    class="card-img rounded-0 img-fluid"
                    :src="product.p_image_1"
                    style="max-height:250px ;"
                />
                <div
                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"
                >
                    <ul class="list-unstyled">
                        <li>
                            <button class="btn cls-btn-fav text-white">
                                <i class="far fa-heart"></i>
                            </button>
                        </li>
                        <li>
                             <router-link :to="{name:'Product',params:{id:product.id}}" class="btn cls-btn-fav text-white mt-2">
                                <i class="far fa-eye"></i>
                             </router-link>
                        </li>
                        <li>
                            <button class="btn cls-btn-fav text-white mt-2">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <a href="shop-single.html" class="h3 text-decoration-none"
                    >{{product.p_name}}</a
                >
                <ul
                    class="w-100 list-unstyled d-flex justify-content-between mb-0"
                >
                    <li>{{product.p_color}}</li>
                    <li class="pt-2">
                        <span
                            class="product-color-dot color-dot-red float-left rounded-circle ml-1"
                        ></span>
                        <span
                            class="product-color-dot color-dot-blue float-left rounded-circle ml-1"
                        ></span>
                        <span
                            class="product-color-dot color-dot-black float-left rounded-circle ml-1"
                        ></span>
                        <span
                            class="product-color-dot color-dot-light float-left rounded-circle ml-1"
                        ></span>
                        <span
                            class="product-color-dot color-dot-green float-left rounded-circle ml-1"
                        ></span>
                    </li>
                </ul>
                <!--ul class="list-unstyled d-flex justify-content-center mb-1">
                    <li>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                        <i class="text-muted fa fa-star"></i>
                    </li>
                </ul-->
                <p class="text-center mb-0" >{{product.p_price | filterPrice}}</p>
            </div>
        </div>
</template>

<script>
export default {
    data(){
        return {

        }
    },
    props:['product'],
    filters:{
        filterPrice:(val) => val + " $"
    }
};
</script>

<style>
.cls-btn-fav{
        background-color: rgb(255 255 255 / 60%) !important;
        border-radius: 10%;
        border-color: rgb(72 44 92 / 30%) !important;
}
</style>
