const category = {
    state:{
        categorais:[]
    },
    getters:{
        findCategory : state => id =>state.categorais.find(c => c.id == id),
        getAllCategorais:state=>state.categorais
    },
    mutations:{
        setCategorais(state,categorais){
            state.categorais = categorais.data;
        }
    },
    actions:{
        async getCategorais(context){
            await axios.get('/api/category').then(res =>{
                context.commit('setCategorais',res.data)
            }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
            })
        },
    }
    
}

export default category;