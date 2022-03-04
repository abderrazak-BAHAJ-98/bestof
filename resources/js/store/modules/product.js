const product = {
    state:{
        products:[],
        IsLoaded:false
    },
    getters:{
        getAllProducts:state  => state.products,
        findProduct : state => id =>state.products.find(p => p.id == id),
        productIsLoaded: state => state.IsLoaded,
    },
    mutations:{
        setProducts(state,products){
            state.products = products.data;
            state.IsLoaded = true;
        },
        addProduct(state,product){
            state.products.push(product);
        },
    },
    actions:{
        async getProducts(context){
            await axios.get('/api/product').then(res =>{
                context.commit('setProducts',res.data)
            }).catch(err=>{
                context.dispatch('showError',err)
            })
            
        },
        async searchProduct(context,data){
            await axios.get(`/api/product/search/${data}`).then(res =>{
                context.commit('setProducts',res.data)
            }).catch(err=>{
                context.dispatch('showError',err)
            })
        },
        async getProductByCategory(context,data){
            await axios.get(`/api/category/${data}`).then(res =>{
                context.commit('setProducts',res.data)
            }).catch(err=>{
                context.dispatch('showError',err)
            })
        },

        async createProduct(context,product){
            
            context.commit('addProduct',product)
        }
    }
    
}

export default product;