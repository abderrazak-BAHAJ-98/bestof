
let str = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiODllN2MzMmQ3ZWQ4YjJiNGZmZWVkMGNmYmU2ODVkODU4MDdhNWJkYjc2YjI3NDk5MTEzMzczZTgzNjNmY2I1NzI4NjA3MTZkNjg1Y2E3YWEiLCJpYXQiOjE2NDY2ODkyOTkuNDUwOTcxLCJuYmYiOjE2NDY2ODkyOTkuNDUwOTc1LCJleHAiOjE2NzgyMjUyOTkuNDQyNjQxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.RW1-ojt1UaeKrjGz5zek5iGZUovA-_q5gHwwcz3cNjCD2NyiVE7BPmsx7kxXO8cJqhtTWnPkY6qrUT95lyr1iMP_Ic-NdRU77hSoQWeku1G95vlkvmspIlm6F93fvvFAPPc_m-4PMzFPk91OPXNqlKOd-4aEo5oQRjNXe2Mq5bxZ4RtcHdmYdun5e1jp5p7TcDSr0qvqKg29vV1PjAsx5ql3Et9Yerj1LTxqneTezow_JYizxtmZErtf5bQLCK_T3ABC68saLU27hCiVIs7MbU3ZMHjGMhCv6JhG_fkmvOq8ChUxB3xH6b1xRr6sIHqZQtsQrmY8M7YlSifuzPG1SPjNr3h9dXgPVY72bN6Gmjb8z_3INsrWYAYpyyoJfvVHj8BDUlJaQ0byapGSeKbODWAzXdzPEcKyCvpghnvwMmmJoBeDnXOWj6Htg69NvgDu8WYOGhntIEkKN1F5FC3MW2fum0bqJk5VmA0g4Ur9qOBw-nqmIxZkdAQfZbrZnnrZ5cZlAJry90dgHKG8p1HKgSv-BH-W8rVdjkpx0VskVUt4r1XvfdjxPp6Os1wavAbP_x_WYu3Jqg8m-ai3z_Fo1RQELlahF8-2IRIVzyJ7kSyqoZ-KUbb1G2vEg-1HFCsxFB6xuKuqb9f4iRX73Ejbvz-hLns8o5-ITS8vs8L4vds"
const user = {
    state:{
        isAuth:true,
        loginState:'',
        hasError:false,
        registerState:[],
        isRegister:false,
        user:'',
        token:str,
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
                    context.commit('setRegisterErrors',err.response.data.errors)
                else 
                    context.dispatch('showError',err.response.statusText)
            })
        },
        /* Not Workin Now*/
        async verfictioneAccount(context,data){
            await axios.post('/api/user/register',data)
            .then(res =>{
                if(res.status == 200)
                    context.commit('setUserRegister',{'message':res.data.message,'statue':true})
            }).catch(err=>{
                if(err.response.status == '422')
                    context.commit('setRegisterErrors',err.response.data.errors)
                else 
                    context.dispatch('showError',err.response.statusText)
            })
        },
        async editPassword(context,data){
            await axios.post('/api/user/register',data)
            .then(res =>{
                if(res.status == 200)
                    context.commit('setUserRegister',{'message':res.data.message,'statue':true})
            }).catch(err=>{
                if(err.response.status == '422')
                    context.commit('setRegisterErrors',err.response.data.errors)
                else 
                    context.dispatch('showError',err.response.statusText)
            })
        },
        async forgotPassword(context,data){
            await axios.post('/api/user/forgotpassword',data)
            .then(res =>{
                if(res.status == 200)
                    context.commit('setUserRegister',{'message':res.data.message,'statue':true})
            }).catch(err=>{
                if(err.response.status == '422')
                    context.commit('setRegisterErrors',err.response.data.errors)
                else 
                    context.dispatch('showError',err.response.statusText)
            })
        },
        async editProfile(context,data){
            await axios.post('/api/user/profile',data)
            .then(res =>{
                if(res.status == 200)
                    context.commit('setUserRegister',{'message':res.data.message,'statue':true})
            }).catch(err=>{
                if(err.response.status == '422')
                    context.commit('setRegisterErrors',err.response.data.errors)
                else 
                    context.dispatch('showError',err.response.statusText)
            })
        },

    }
    
}

export default user;