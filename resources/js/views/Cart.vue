<template>
  <div class="container mt-5 p-3 rounded cart">
    <div class="row">
        <div class="col-md-8">
            <h4 class="h2">Shopping cart</h4>
            <h5 class="3">You have {{getAllCarts.length}} items in your cart</h5>
            <div class="cls-table-carts">
                <div class="items row m-3 rounded" v-for="cart in getAllCarts" :key="cart.id">
                    <img :src="cart.p_image" alt="" class="col-2 img-fluid cls-img-cart">
                    <div class="col-7">
                        <h4 class="h4 ">{{cart.p_name}}</h4>
                        <p class="small mt-md-4">color valuabl : {{cart.p_color}}</p>
                    </div>
                    <div class="col-3 cls-left-cart">
                        <div><i class="fa-solid fa-xmark"></i></div>
                        <div>{{cart.p_price }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            xcccccccccccccccccdssssssss
        </div>
    </div>
</div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    computed:{
        ...mapGetters(['getAllCarts'])
    }
}
</script>

<style >
.cls-left-cart{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.items {
    -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
    box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08)
}
.cls-img-cart{
    max-height: 6em;
}

</style>
