const category = {
    state:{
        categorais:[],
        categoryIsLoad:false
    },
    getters:{
        findCategory : state => id =>state.categorais.find(c => c.id == id),
        getAllCategorais:state=>state.categorais
    },
    mutations:{
        SET_CATEGORAIS(state,categorais){state.categorais = categorais.data;},
        ADD_CATEGORY(state,category){state.categorais.push(category.data)},
        UPDATE_CATEGORY(state,category){state.categorais[state.categorais.indexOf(c => c.id == category.data.id)] = category.data},
        DESTROY_CATEGORY(state,id){state.categorais.slice(state.categorais.indexOf(c => c.id == id),1)}
    },
    actions:{
        // Get All Categorais 
        async getCategorais(context){
            await axios.get('/api/category').then(res =>{
                context.commit('SET_CATEGORAIS',res.data)
            }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
            })
        },
        // Create Category 
        // TYPE category {cat_name : STRING,cat_img : IMG}
        async addCategory(context,category){
            let userToken = this.getters['userToken']
            await axios.post(`/api/category`,category,{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('ADD_CATEGORY',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },
        // Update Category 
        // TYPE category {cat_name : STRING,cat_img : IMG}
        async updateCategory(context,category,id){
            let userToken = this.getters['userToken']
            await axios.put(`/api/category/${id}`,category,
                            {headers:{'Authorization':`Bearer ${userToken}`}})
                 .then(res =>{
                context.commit('UPDATE_CATEGORY',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },
        // Delete Category
        // id Type INTEGER
        async destroyCategory(context,id){
            let userToken = this.getters['userToken']
            await axios.delete(`/api/category/${id}`,{},{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('DESTROY_CATEGORY',id)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        }
    }
}
export default category;