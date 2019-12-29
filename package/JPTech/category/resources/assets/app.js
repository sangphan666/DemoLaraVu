import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App.vue'
import Navbar from './components/Navbar.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'navbar',
            component: Navbar
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});