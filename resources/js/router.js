
import VueRouter from "vue-router";
import Vue from 'vue';

Vue.use(VueRouter);

import Home from "./components/pages/Home"
import AboutUs from './components/pages/Aboutus'
import ContactUs from './components/pages/Contactus'
import Shop from './components/pages/Shop'
import Login from './components/pages/Login'
import Registration from './components/pages/Registration'
import AdminPanel from "./components/pages/AdminPanel"
import Categories from "./components/pages/Categories"
import Product from "./components/pages/Product"
import Cart_page from "./components/pages/Cart_page";

const routes=[
    {
        path:'/',
        component:Home
    },
    {
        path:'/aboutUs',
        component:AboutUs
    },
    {
        path:'/contactUs',
        component:ContactUs
    },
    {
        path:'/shop',
        component:Shop
    },
    {
        path:'/login',
        component:Login
    },
    {
        path: '/registration',
        component:Registration
    },
    {
        path: '/adminPanel',
        component:AdminPanel
    },
    {
        path: '/category',
        component: Categories
    },
    {
        path: '/product',
        component: Product
    },
    {
        path: '/cart_page',
        component: Cart_page
    }

];

export default new VueRouter({
    mode:'history',
    routes:routes
});


