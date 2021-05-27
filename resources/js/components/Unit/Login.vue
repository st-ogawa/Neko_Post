<template>
  <div class="Login">
    <h3>ねこぽすと</h3>
    <div class="login-form">
      <CommentForm  class="mail" placeholder="メール" v-model="loginMail" @sendData="login"/>
    </div>
    <div class="login-form">
      <CommentForm class="password" :type="inputType" placeholder="パスワード" v-model="loginPass" @sendData="login"/>
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
import CommentForm from '../SheredParts/CommentForm.vue'
import SubmitButton from '../SheredParts/SubmitButton.vue'
import axios from 'axios'
import ErrorMessage from '../SheredParts/ErrorMessage.vue'

export default {
  components: { CommentForm, SubmitButton, ErrorMessage },
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
        console.log(response.data)
      }).catch(error=>{
        this. errormsg = error.response.data.message
      })
    }
  }
}
</script>

.