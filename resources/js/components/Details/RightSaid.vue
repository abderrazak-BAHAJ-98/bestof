<template>
    <div class="col-lg-6 mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="h2">{{product.p_name}}</h1>
                <p class="h3 py-2">{{product.p_price}}$</p>
                <p class="py-2">
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <span class="list-inline-item text-dark"
                        >Rating {{product.rate }} </span
                    >
                </p>

                <h6>Description:</h6>
                <p>
                    {{product.p_description}}
                </p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h6>Available Color : </h6>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-muted"><strong>{{product.p_color}}</strong></p>
                    </li>
                </ul>

                    <div class="row">
                        <div class="col-auto">
                            <ul class="list-inline pb-3">
                                <li class="list-inline-item text-right">
                                    Quantity
                                    <input
                                        type="hidden"
                                        name="product-quantity"
                                        id="product-quantity"
                                        value="1"
                                    />
                                </li>
                                <li class="list-inline-item" @click="decrement">
                                    <span class="btn btn-success" id="btn-minus"
                                        >-</span
                                    >
                                </li>
                                <li class="list-inline-item">
                                    <span
                                        class="badge bg-secondary"
                                        id="var-value"
                                        >{{quantity}}</span
                                    >
                                </li>
                                <li class="list-inline-item" @click="increment">
                                    <span class="btn btn-success" id="btn-plus"
                                        >+</span
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col d-grid">
                            <button
                                @click="by"
                                class="btn btn-success btn-lg"
                            >
                                Buy
                            </button>
                        </div>
                        <div class="col d-grid">
                            <button
                                @click="addCart"
                                class="btn btn-outline-success btn-lg"
                            >
                                Add To Cart
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['product'],
    data:()=>({
            quantity : 0,
    }),
    methods:{
        increment:function(){
            this.quantity++;
        },
        decrement:function(){
             if(this.quantity != 0){
                 this.quantity--;
                 }
        },
        by:function(){
            console.log("By")
        },
        addCart:function(){
            console.log("addCard")
        },

    }
    
};
</script>

<style></style>
