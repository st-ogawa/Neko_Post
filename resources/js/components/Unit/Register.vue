<template>
  <div class="Register">
    <h3>ねこぽすと</h3>
    <div class="register-form">
      <CommentForm class="user-name" placeholder="ユーザー名" v-model="userName" @sendData="register"/>
      <ErrorMessage v-show="errormsg.name" v-model="errormsg.name"/>
    </div>
    
    <div class="register-form">
      <CommentForm  class="mail" placeholder="メール" v-model="registerMail" @sendData="register"/>
      <ErrorMessage v-show="errormsg.email" v-model="errormsg.email"/>
    </div>
    <div class="register-form">
      <CommentForm class="password" :type="inputType" placeholder="パスワード" v-model="registerPass" @sendData="register"/>
      <div :class="iconType" @click="viewPass"/>
      <ErrorMessage v-show="errormsg.password" v-model="errormsg.password"/>
    </div>
    
    <div id="register-button">
      <SubmitButton value="ログイン" @sendData="register"/>
    </div>
  </div>
</template>

<script>

import CommentForm from '../SheredParts/CommentForm.vue'
import SubmitButton from '../SheredParts/SubmitButton.vue'
import axios from 'axios'
import ErrorMessage from '../SheredParts/ErrorMessage.vue'

export default {

  components: { CommentForm, SubmitButton, ErrorMessage },
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
      axios.post('http://127.0.0.1:8000/api/register', {
        'name': this.userName,
        'email' : this.registerMail,
        'password' : this.registerPass,
      }).then(response=>{
        console.log(response)
      }).catch(error=>{
        this.errormsg = error.response.data.message
      })
    }
  }
}
</script>