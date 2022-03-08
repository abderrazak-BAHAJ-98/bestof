const cart = {
    state:{
        carts:[]
    },
    getters:{
        findCarts : state => id =>state.carts.find(c => c.id == id),
        getAllCarts:state=>state.carts
    },
    mutations:{
        SET_CARTS(state,carts){state.carts = carts.data;},
        ADD_CART(state,cart){state.carts.push(cart.data)},
        UPDATE_CART(state,cart){state.carts[state.carts.indexOf(e => e.id == cart.data.id)] = cart.data},
        DESTROY_CART(state,id){state.carts.slice(state.carts.indexOf(e => e.id == id),1)}
    },
    actions:{
        // Get All Carts 
        async getCartsUser(context){
            if(this.getters['userToken']){
                await axios.get(`/api/cart`,{headers:{
                'Authorization':`Bearer ${this.getters['userToken']}`
                 }}).then(res =>{  
                context.commit('SET_CARTS',res.data)
                }).catch(err=>{
                    context.dispatch('showError',err.response.statusText)
                })
            }
            else
            context.dispatch('showError','Login first')
        },
        // Create Cart 
        // TYPE DATA {product_id : number,quantity : number}
        async addCartForUser(context,data){
            let userToken = this.getters['userToken']
            await axios.post(`/api/cart`,data,{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('ADD_CART',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },
        // Update Cart
        // id Type number
        async UpdateCartForUser(context,id){
            let userToken = this.getters['userToken']
            await axios.delete(`/api/cart/${id}`,{},{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('UPDATE_CART',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },
        // Delete Carte
        // id Type number
        async destroyCartForUser(context,id){
            let userToken = this.getters['userToken']
            await axios.delete(`/api/cart/${id}`,{},{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('DESTROY_CART',id)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        }

    }
    
}

export default cart;