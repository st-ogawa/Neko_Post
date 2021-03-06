import Vue from 'vue';
import VueRouter from 'vue-router';
import Discovery from './components/Pages/Discovery'
import Profile from './components/Pages/Profile'
import UserAuth from './components/Pages/UserAuth'
import Login from './components/Unit/Login'
import Register from './components/Unit/Register'
import Favorite from './components/Unit/Favorite'
import Post from './components/Pages/Post'
import PostDetails from './components/Unit/PostDetails';

Vue.use(VueRouter);


export default new VueRouter({
    mode : 'history',
    routes: [
        { path: '/', component: Discovery,
            children: [
                { path: 'content/:postId', name: 'content', component: PostDetails } 
            ]
        },
        { path: '/post', component: Post },
        { path: '/profile', component: Profile,  
            children: [
                { path: 'favorite', name: 'favorite', component: Favorite } 
            ]
        },
        { path: '/auth', component: UserAuth,
            children :[
                { path: 'register', name: 'register', component: Register, },
                { path: 'login', name: 'login', component: Login,},
            ]
        },
    ]
})
