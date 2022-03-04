<template>
<div class=" m-5 cls-main">
      <div class="row">
          <div class="col-md-5  p-3 d-flex justify-content-center ">
            <img class="img-fluid r" src="http://127.0.0.1:8000/images/illustration.svg" alt="">
          </div>
          <div class="col-md-7">
              <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="mb-4 h2 text-center">Register </h3>
                <div class="row">
                  <div class="form-floating m-1 col-md">
                    <input type="text" v-model="data.first_name" class="form-control" id="first_name" placeholder="First name">
                    <label for="first_name">First name</label>
                    <error-partial word='first_name'/>
                  </div>
                  <div class="form-floating m-1 col-md">
                    <input type="text" v-model="data.last_name" class="form-control" id="last_name" placeholder="Last name">
                    <label for="last_name">Last name</label>
                    <error-partial word='last_name'/>
                  </div>
                </div>

                <div class="form-floating m-1">
                  <input type="text" v-model="data.address" class="form-control" id="Address" placeholder="Address">
                  <label for="Address"> address</label>
                  <error-partial word='Address'/>
                </div>

                <div class="form-floating m-1">
                  <input type="text" v-model="data.phone_number" class="form-control" id="phone_number" placeholder="phone number">
                  <label for="phone_number">phone number</label>
                  <error-partial word='phone_number'/>
                </div>

                <div class="form-floating m-1">
                  <input type="date" v-model="data.Date_birth" class="form-control" id="Date_birth" >
                  <label for="Date_birth">Date Birth</label>
                  <error-partial word='Date_birth'/>
                </div>

                <div class="form-floating m-1">
                  <input type="email"  v-model="data.email" class="form-control" id="email" placeholder="name@example.com">
                  <label for="email">Email address</label>
                  <error-partial word='email'/>
                </div>

                <div class="form-floating m-1">
                  <input type="password" v-model="data.password" class="form-control" id="password" placeholder="Password">
                  <label for="password">Password</label>
                  <error-partial word='password'/>
                </div>
                <div class="form-floating m-1">
                  <input  type="password" v-model="data.password_confirmation" class="form-control" id="password_confirmation " placeholder="Password confirmation">
                  <label for="password_confirmation">Password Confirmation</label>
                </div>

                <div class="d-grid">
                  <button class="btn-lg btn-outline-primary cls-btn-login m-2" @click="register">Register</button>
                  <div class="text-center">
                     You  have account,Login now <router-link to="/login" class="small">click her</router-link>
                  </div>
                </div>
            </div>

          </div>
      </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import ErrorPartial from '../components/Global/ErrorPartial.vue'
export default {
  components: { ErrorPartial },
  data(){
    return{
        data:{
          email:'',
          password:'',
          password_confirmation:'',
          Date_birth:'',
          phone_number:'',
          first_name:'',
          last_name:'',
          address:''
          },
          hasRegister:false,
      }
    },
    methods:{
      register:async function(){
        await this.$store.dispatch('register',this.data)
      }
    },
    computed:{
      ...mapGetters(["userHasRegister"]),
     
    },
   watch:{
     userHasRegister:function(val){
       this.hasRegister = true;
     }
   }

}

</script>

<style> 
.cls-error{
  padding: 0;
  margin: 0;
}
</style>