import Vue from 'vue';
import VueRouter from 'vue-router';
import Discovery from './components/Pages/Discovery'
import Profile from './components/Pages/Profile'
import UserAuth from './components/Pages/UserAuth'
import Login from './components/Unit/Login'
import Register from './components/Unit/Register'


Vue.use(VueRouter);


export default new VueRouter({
    mode : 'history',
    routes: [
        { path: '/', component: Discovery },
        { path: '/profile', component: Profile },
        { path: '/auth', component: UserAuth,
            children : [
                { path: 'register', name: 'register', component: Register, },
                { path: 'login', name: 'login', component: Login,},
            ]
        },
    ]
})