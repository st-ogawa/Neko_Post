<template>
  <div class="Login">
    <h3>ねこぽすと</h3>
    <div class="login-form">
      <comment-form  placeholder="メール" v-model="loginMail" @sendData="login"/>
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

    }
  }
}
</script>

.