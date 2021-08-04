import Vue from 'vue'
import router from './router'
import store from './store/index'
import './scroll'
import Axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/App').default);


const app = new Vue({
    el: '#app',
    router,
    store,
});
