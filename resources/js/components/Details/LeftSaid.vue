<template>
    <div class="col-lg-6 mt-5">
        <div class="card mb-3">
            <img
                class="card-img img-fluid"
                :src="mainImg"
                alt="Card image cap"
                style="max-height:550px ;"
                id="product-detail"
            />
        </div>

        <div class="row">
            <div class="col-3">
                <button @click="SwitchImg">
                    <img
                        class="card-img img-fluid"
                        :src="product.p_image_1"
                        alt="Product Image 1"
                    />
                </button>
            </div>
            <div class="col-3">
                <button @click="SwitchImg">
                    <img
                        class="card-img img-fluid"
                        :src="product.p_image_2"
                        alt="Product Image 1"
                    />
                </button>
            </div>
            <div class="col-3">
                <button @click="SwitchImg">
                    <img
                        class="card-img img-fluid"
                        :src="product.p_image_3"
                        alt="Product Image 1"
                    />
                </button>
            </div>
            <div class="col-3">
                <button @click="SwitchImg">
                    <img
                        class="card-img img-fluid"
                        :src="product.p_image_4"
                        alt="Product Image 1"
                    />
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["product"],
    data(){
        return({
            mainImg:this.product.p_image_1,
        })
    },
    
    methods:{
        SwitchImg:function(event){
            this.mainImg = event.target.src
        }
    },
};
</script>

<style  scoped>
.col-3 button {
    outline: none;
    border: none;
}
</style>