<template>
  <div class="Register">
    <h3>ねこぽすと</h3>
    <div class="register-form">
      <comment-form  placeholder="ユーザー名" v-model="userName" @sendData="register"/>
    </div>
    <div class="register-form">
      <comment-form  placeholder="メール" v-model="registerMail" @sendData="register"/>
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

    }
  }
}
</script>