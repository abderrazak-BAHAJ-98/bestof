require('./bootstrap');

window.Vue = require('vue').default;
import App from './App.vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from './router';
import store from './store'; 


Vue.use(VueRouter);
Vue.use(VueAxios, axios)

new Vue({
    router,
    store,
    render: (h) => h(App),
  }).$mount("#app");