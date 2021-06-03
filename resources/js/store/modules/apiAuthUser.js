const getDefaultState =()=> {
    return {
      userName:'',
      userId:''
    }
  }
  
  const state = getDefaultState
    
  
  const getters = {
    getUserName:state =>{
      return  state.userName 
    },
    getUserId:state =>{
      return state.userId
    }
  }
  const actions = {
    getAuthUser:({commit},user) => {
      commit('setAuthUser',user)
    },
  }
  const mutations = {
     setAuthUser : (state,user) => {
        state.userName = user.name
        state.userId = user.id
    },
  }
      
  export default{
      state,
      actions,
      getters,
      mutations
  }