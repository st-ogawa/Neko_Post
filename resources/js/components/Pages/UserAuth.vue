<template>
  <div class="UserAuth">
    <Header/>
    <div class="container">
      <div class="auth-card">
        <nav>
          <ul class="switch-tab">
            <LinkTab v-for="item in list" v-bind="item" :key="item.id" v-model="currentId"/>
          </ul>
        </nav>
        <router-view/>
      </div>
    </div>
    
  </div>
</template>

<script>
import LinkTab from '../SheredParts/LinkTab.vue'

import Header from '../Unit/Header'
export default {
  components:{ Header, LinkTab, },
  data() {
    return {
      currentId: 1,
      list: [
        { id: 1, label: 'ログイン', link: 'login' },
        { id: 2, label: '新規登録', link: 'register' },
      ]
    }
  },
}
</script>