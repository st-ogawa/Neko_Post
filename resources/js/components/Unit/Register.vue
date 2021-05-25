<template>
  <div class="Register">
    <h3>ねこぽすと</h3>
    <div class="register-form">
      <comment-form class="user-name" placeholder="ユーザー名" v-model="userName" @sendData="register"/>
    </div>
    <div class="register-form">
      <comment-form  class="mail" placeholder="メール" v-model="registerMail" @sendData="register"/>
    </div>
    <div class="register-form">
      <div :class="iconType" @click="viewPass"/>
      <comment-form class="password" :type="inputType" placeholder="パスワード" v-model="registerPass" @sendData="register"/>
    </div>
    <!-- <div v-show="errormsg" class="error">{{errormsg}}</div> -->
    <div id="login-button">
      <submit-button value="ログイン" @sendData="register"/>
    </div>
  </div>
</template>

<script>

import CommentForm from '../SheredParts/CommentForm.vue'
import SubmitButton from '../SheredParts/SubmitButton.vue'
import axios from 'axios'

export default {

  components: { CommentForm, SubmitButton },
  data(){
    return {
      userName : '',
      registerMail : '',
      registerPass : '',
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
        console.log(error.response.data.message)
      })
    }
  }
}
</script>