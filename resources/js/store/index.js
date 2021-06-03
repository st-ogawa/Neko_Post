import Vue from'vue'
import Vuex from'vuex'
import apiAuthToken from './modules/apiAuthToken'
import apiAuthUser from './modules/apiAuthUser'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        apiAuthToken,
        apiAuthUser
    },
    strict:process.env.NODE_ENV !== 'production'
})