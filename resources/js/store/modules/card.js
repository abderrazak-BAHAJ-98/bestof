const card = {
    state:{
        cards:[]
    },
    getters:{
        findCards : state => id =>state.cards.find(c => c.id == id),
        getAllCards:state=>state.cards
    },
    mutations:{
        SET_CARDS(state,cards){state.cards = cards.data;},
        ADD_CARD(state,card){state.cards.push(card.data)},
        DESTROY_CARD(state,id){state.cards.slice(state.cards.indexOf(e => e.id == id),1)}
    },
    actions:{
        // Get All cards 
        async getCardsUser(context){
            if(this.getters['userToken']){
                await axios.get(`/api/card`,{headers:{
                'Authorization':`Bearer ${this.getters['userToken']}`
                 }}).then(res =>{  
                context.commit('SET_CARDS',res.data)
                }).catch(err=>{
                    context.dispatch('showError',err.response.statusText)
                })
            }
            else
            context.dispatch('showError','Login first')
        },
        // Create card 
        // TYPE DATA {card_number : number, card_date_expr : date, card_sold : number,}
        async addCardForUser(context,data){
            let userToken = this.getters['userToken']
            await axios.post(`/api/card`,data,{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('ADD_CARD',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },
        // Delete card
        // id Type number
        async destroyCardForUser(context,id){
            let userToken = this.getters['userToken']
            await axios.delete(`/api/card/${id}`,{},{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('DESTROY_CARD',id)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        }

    }
    
}

export default card;