<template>
  <div class="UserAuth">
    <Header/>
    <div class="container">
      <div class="auth-card">
        <LoginTab/>
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
  
}
</script>