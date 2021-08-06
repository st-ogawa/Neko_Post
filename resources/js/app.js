import Vue from 'vue'
import router from './router'
import store from './store/index'
import './scroll'
import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/App').default);

// console.log(axios.defaults.baseURL);
axios.defaults.baseURL = 'https://neko-post.com';


const app = new Vue({
    el: '#app',
    router,
    store,
});
