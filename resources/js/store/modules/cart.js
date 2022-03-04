const category = {
    state:{
        carts:[]
    },
    getters:{
        findCarts : state => id =>state.carts.find(c => c.id == id),
        getAllCarts:state=>state.carts
    },
    mutations:{
        setCarts(state,carts){
            state.carts = carts.data;
        },
        addCarts(state,carts){
            state.carts.push(carts.data)
        },
        destroyCarts(state,id){
            let index = state.carts.indexOf(e => e.id == id)
            console.log(index)
            state.carts.slice(index,1)
        }
    },
    actions:{
        async getCartsUser(context){
            if(this.getters['userToken']){
                await axios.get(`/api/cart`,{headers:{
                'Authorization':`Bearer ${this.getters['userToken']}`
                 }}).then(res =>{
                context.commit('setCarts',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
            }
            else
            context.dispatch('showError','Login first')
        },
        async addCartForUser(context,data){
            let userToken = this.getters['userToken']
            await axios.post(`/api/cart`,data,{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('addCarts',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },
        async destroyCartForUser(context,id){
            let userToken = this.getters['userToken']
            await axios.delete(`/api/cart/${id}`,{},{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('destroyCarts',id)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        }

    }
    
}

export default category;