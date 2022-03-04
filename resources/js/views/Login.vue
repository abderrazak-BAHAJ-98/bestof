<template>
 
  <div class="container m-5 cls-main">
      <div class="row">
        <div class="col-md-6">
              <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="mb-4 h2 text-center">Login </h3>
              <h3 class="small mb-5 text-center">welcome back</h3>
              <p v-if="userLoginError">
                {{userLoginError }}
              </p>
                <div class="form-floating m-3">
                  <input type="email" class="form-control" v-model="user.email" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating m-3">
                  <input type="password"  class="form-control" v-model="user.password" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-outline-primary cls-btn-login m-2" @click="logInUser">Login</button>
                  <div class="text-center">
                     You don't have account,create now <router-link to="/register" class="small">click her</router-link>
                  </div>
                  <div class="text-center">
                      <router-link to="/forgotPassword" class="small">Forgot password?</router-link>
                  </div>
                </div>
            </div>

          </div>
          <div class="col-md-5  p-3 d-flex justify-content-center ">
            <img class="img-fluid r" src="http://127.0.0.1:8000/images/illustration.svg" alt="">
          </div>
          
      </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  data:()=>({
      user :{ email:'',password:''}
  }),
  methods:{
    async logInUser(){
      await  this.$store.dispatch('Login',this.user)
      if(this.userHasAuth){
        //is now login
        console.log("welcome")
      }
    }
  },
  computed:{
    ...mapGetters(['userLoginError','userHasAuth'])
  }
} 
</script>

<style> 
.cls-main{
    height: 70vh;
}
.cls-btn-login {
  letter-spacing: 0.05rem;
}
</style>