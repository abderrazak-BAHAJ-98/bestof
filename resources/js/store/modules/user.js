

const user = {
    state:{
        isAuth:false,
        loginState:'',
        hasError:false,
        registerState:[],
        isRegister:false,
        user:'',
        token:'',
    },
    getters:{
        userHasAuth : state => state.isAuth,
        userToken:state => state.token,
        userInfo:state => state.user,
        userLoginError : state => state.loginState,
        userHasRegister: state => state.isRegister,
        userRegisterError:state => state.registerState
    },
    mutations:{
        setUser(state,data){
            state.user = data.user;
            state.token = data.access_Token;
            state.isAuth = true
        },
        setLoginError(state,data){
            state.loginState = data.message;
        },
        setRegisterErrors(state,data){
            state.registerState =data
        }

    },
    actions:{
        async Login(context,data){
            await axios.post('/api/user/login',data)
            .then(res =>{
                if(res.status == 200)
                    context.commit('setUser',res.data)
                else
                    context.commit('setLoginError',res.data)
            }).catch(err=>{
                context.dispatch('showError',err)
            })
        },

        async register(context,data){
            await axios.post('/api/user/register',data)
            .then(res =>{
                if(res.status == 200)
                    context.commit('setUserRegister',{'message':res.data.message,'statue':true})
            }).catch(err=>{
                if(err.response.status == '422')
                    {
                        context.commit('setRegisterErrors',err.response.data.errors)
                         
                    }
                else 
                    context.dispatch('showError',err.response.statusText)
            })
        },
    }
    
}

export default user;