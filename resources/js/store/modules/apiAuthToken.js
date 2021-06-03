const state = {
    authToken : ''
}

const getters = {
    getToken : state =>{
        return state.authToken;
    },
}

const actions = {
    getAuthToken : ({commit},authToken)=> {
        commit('setAuthToken', authToken);
    },
}

const mutations = {
    setAuthToken : (state, authToken) => {
        state.authToken = authToken
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}