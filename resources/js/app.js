
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
import AdminBanner from './components/adminParts/Banner'
import AdminProducts from './components/adminParts/Products'
import CreationProductPage from "./components/adminParts/CreationPage"
import Category from "./components/adminParts/Category"

Vue.component('v-header',Header)
Vue.component('v-footer',Footer)
Vue.component('v-aside',AsideBlock)
Vue.component('v-messages',Messages)
Vue.component('v-news',News)
Vue.component('v-adminNews',AdminNews)
Vue.component('v-fashion',FashionBanner)
Vue.component('v-banner',Banner)
Vue.component('v-adminBanner',AdminBanner)
Vue.component('v-adminProducts',AdminProducts)
Vue.component('v-creationProduct',CreationProductPage)
Vue.component('v-categoryManage',Category)

import router from './router'

const app = new Vue({
    el: '#app',
    router:router,
    render:h=>h(App)
});
