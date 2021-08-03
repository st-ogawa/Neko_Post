<template>
  <div class="Register">
    <h3>ねこぽすと</h3>
    <div class="register-form">
      <LoginForm class="user-name" placeholder="ユーザー名" v-model="userName" @sendData="register"/>
    </div>
    <div class="error-message">
       <ErrorMessage v-show="errormsg.name" v-model="errormsg.name"/>
    </div>
    <div class="register-form">
      <LoginForm  class="mail" placeholder="メール" v-model="registerMail" @sendData="register"/>
    </div>
    <div class="error-message">
      <ErrorMessage v-show="errormsg.email" v-model="errormsg.email"/>
    </div>
    <div class="register-form">
      <LoginForm class="password" :type="inputType" placeholder="パスワード" v-model="registerPass" @sendData="register"/>
      <div :class="iconType" @click="viewPass"/>
    </div>
    <div class="error-message">
      <ErrorMessage v-show="errormsg.password" v-model="errormsg.password"/>
    </div>
    <div id="register-button">
      <SubmitButton value="新規登録" @sendData="register"/>
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
      userName : '',
      registerMail : '',
      registerPass : '',
      errormsg : '',
      isActive : false,
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
    register(){
      axios.post('/api/register', {
        'name': this.userName,
        'email' : this.registerMail,
        'password' : this.registerPass,
      }).then(res=>{
        this.$store.dispatch('getAuthToken', res.data.token);
        this.$store.dispatch('getAuthUser', res.data.user);
        setTimeout(()=>{this.$router.push('/')},1500);
      }).catch(error=>{
        this.errormsg = error.response.data.message
      })
    }
  }
}
</script>