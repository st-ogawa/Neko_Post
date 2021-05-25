<template>
  <div class="UserAuth">
    <Header/>
    <div class="container">
      <div class="auth-card">
          <div class="swith-tab">
            <LoginTab v-for="item in list" :key="item.id" v-bind="item" v-model="currentId"/>
          </div>
        <router-view/>
      </div>
    </div>
    
  </div>
</template>

<script>
import LoginTab from '../SheredParts/LoginTab.vue'

import Header from '../Unit/Header'
export default {
  components:{ Header, LoginTab, },
  data() {
    return {
      currentId:1,
      list:[
        {id: 1 , label: 'ログイン', link: 'login'},
        {id: 2, label: '新規登録', link: 'register'}
      ]
    }
  },
}
</script>