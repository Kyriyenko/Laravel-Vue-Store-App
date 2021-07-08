
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

Vue.component('v-header',Header)
Vue.component('v-footer',Footer)
Vue.component('v-aside',AsideBlock)
Vue.component('v-messages',Messages)
Vue.component('v-news',News)
Vue.component('v-adminNews',AdminNews)
Vue.component('v-fashion',FashionBanner)
Vue.component('v-banner',Banner)
Vue.component('v-adminBanner',AdminBanner)

import router from './router'

const app = new Vue({
    el: '#app',
    router:router,
    render:h=>h(App)
});
