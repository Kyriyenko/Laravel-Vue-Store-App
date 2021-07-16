
require('./bootstrap');

window.Vue = require('vue').default;

import App from './components/App'
import Header from "./components/parts/Header"
import Footer from "./components/parts/Footer"
import AsideBlock from "./components/parts/Aside"
import Messages from "./components/adminParts/Messages"
import News from './components/parts/News'
import AdminNews from './components/adminParts/News'
import FashionBanner from './components/ banners/Fashion'
import Banner from "./components/ banners/Banner"
import AdminProducts from './components/adminParts/Products'
import CreationProductPage from "./components/adminParts/CreationProductPage"
import Category from "./components/adminParts/Category"
import FeaturedProducts from "./components/parts/FeaturedProducts"
import Brand_logo from "./components/parts/Brand_logo";

Vue.component('v-header',Header)
Vue.component('v-footer',Footer)
Vue.component('v-aside',AsideBlock)
Vue.component('v-messages',Messages)
Vue.component('v-news',News)
Vue.component('v-adminNews',AdminNews)
Vue.component('v-fashion',FashionBanner)
Vue.component('v-banner',Banner)
Vue.component('v-adminProducts',AdminProducts)
Vue.component('v-creationProduct',CreationProductPage)
Vue.component('v-categoryManage',Category)
Vue.component('v-featuredProducts',FeaturedProducts)
Vue.component('v-brand_logo',Brand_logo)

import router from './router'

const app = new Vue({
    el: '#app',
    router:router,
    render:h=>h(App)
});
