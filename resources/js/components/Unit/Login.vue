<template>
  <div class="Login">
    <h3>ねこぽすと</h3>
    <div class="login-form">
      <LoginForm  class="mail" placeholder="メール" v-model="loginMail" @sendData="login"/>
    </div>
    <div class="login-form">
      <LoginForm class="password" :type="inputType" placeholder="パスワード" v-model="loginPass" @sendData="login"/>
      <div :class="iconType" @click="viewPass"/>
    </div>
    <div class="error-message">
      <ErrorMessage v-show="errormsg" v-model="errormsg"/>  
    </div>
    <div id="login-button">
      <SubmitButton value="ログイン" @sendData="login"/>
    </div>
  </div>
</template>

<script>
import LoginForm from '../SheredParts/LoginForm.vue'
import SubmitButton from '../SheredParts/SubmitButton.vue'
import axios from 'axios'
import ErrorMessage from '../SheredParts/ErrorMessage.vue'

export default {
  components: { LoginForm, SubmitButton, ErrorMessage },
  data(){
    return {
      loginMail : '',
      loginPass : '',
      isActive : false,
      errormsg :'',
    }
  },
  computed:{
    inputType(){
      return this.isActive ? "text" : "password";
    },
    iconType(){
      return this.isActive ? "visible" : "unvisible"
    }
  },
  methods:{
    viewPass(){
      this.isActive  =  !this.isActive 
    },
    login(){
      axios.post('http://127.0.0.1:8000/api/login', {
        email: this.loginMail,
        password: this.loginPass
      }).then(res=>{
        this.$store.dispatch('getAuthToken', res.data.token)
        this.$store.dispatch('getAuthUser', res.data.user)
        setTimeout(()=>{this.$router.push('/')},1500);
      }).catch(error=>{
        this. errormsg = error.response.data.message
      })
    }
  }
}
</script>

.