import Vue from'vue'
import Vuex from'vuex'
import apiAuthToken from './modules/apiAuthToken'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        apiAuthToken,
    },
    strict:process.env.NODE_ENV !== 'production'
})