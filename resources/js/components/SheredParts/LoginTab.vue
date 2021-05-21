<template>
  <div class="LoginTab">
      <nav>
          <ul class="swith-tab">
            <li :class="{leftTab:isActive}" @click.prevent="switchTab(1)" :disabled="loginActive">
              <router-link to="login">ログイン</router-link>
            </li>
            <li :class="{rightTab:!isActive}" @click.prevent="switchTab(2)" :disabled="registerActive">
              <router-link to="register">新規登録</router-link>
            </li>
          </ul>
        </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loginActive : false,
      registerActive : false,
      isActive : false,
    }
  },
  methods:{
    switchTab(num){
     
      if(num === 1){
        this.loginActive = true 
        this.registerActive = false
        this.isActive = false
      } 
      else if(num === 2){
        this.loginActive = false 
        this.registerActive = true
        this.isActive = true
      }
    },
    
  }
}
</script>