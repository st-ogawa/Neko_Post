import Vue from 'vue'
import router from './router'
import store from './store/index'
import './scroll'
import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/App').default);


axios.defaults.baseURL=process.env.MIX_API_URL;
console.log(axios.defaults.baseURL);

const app = new Vue({
    el: '#app',
    router,
    store,
});
