import Vue from "vue";
import VueRouter from "vue-router";
import NotFound from '../views/NotFound.vue'

Vue.use(VueRouter);

const routes = [
    {
		path: '/',
        name:'Home',
        component: () =>import("../views/Home.vue"),
    },
    {
		path: '/maintenance',
        name:'Maintenance',
        component: () =>import("../views/Maintenance.vue"),
    },
    {
		path: '/about',
        name:'About',
        component: () =>import("../views/About.vue"),
    },
    {
		path: '/shope',
        name:'Shope',
        component: () =>import("../views/Shope.vue"),
    },
    {
		path: '/contact',
        name:'Contact',
        component: () =>import("../views/Contact.vue"),
    },
    {
		path: '/register',
        name:'Register',
        component: () =>import("../views/Register.vue"),
    },
    {
		path: '/login',
        name:'Login',
        component: () =>import("../views/Login.vue"),
    },
    {
		path: '/product/add',
        name:'ManagementProduct',
        component: () =>import("../views/ProductAdd.vue"),
    },
    {
		path: '/product/:id',
        name:'Product',
        component: () =>import("../views/Details.vue"),
    },
    {
		path: '/product',
        name:'ProductList',
        component: () =>import("../views/ProductList.vue"),
    },
    {
		path: '/cart',
        name:'Cart',
        component: () =>import("../views/Cart.vue"),
    },
    {
		path: '/category/:id',
        name:'Category',
        component: () =>import("../views/ShopeCategory.vue"),
    },
    {
		path: "*",
        component:NotFound,
    },
];

const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes
});

export default router;