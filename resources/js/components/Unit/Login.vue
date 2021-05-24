<template>
  <div class="Login">
    <h3>ねこぽすと</h3>
    <div class="login-form">
      <comment-form  class="mail" placeholder="メール" v-model="loginMail" @sendData="login"/>
    </div>
    <div class="login-form">
      <div :class="iconType" @click="viewPass"/>
      <comment-form class="password" :type="inputType" placeholder="パスワード" v-model="loginPass" @sendData="login"/>
    </div>
    <!-- <div v-show="errormsg" class="error">{{errormsg}}</div> -->
    <div id="login-button">
      <submit-button value="ログイン" @sendData="login"/>
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
      }).then(response=>{
        console.log(response)
      }).catch(error=>{
        console.log(error.response)
      })
    }
  }
}
</script>

.