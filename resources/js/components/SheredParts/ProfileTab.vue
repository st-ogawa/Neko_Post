<template>
  <div class="ProfileTab">
      <nav>
          <ul class="swith-tab">
            <li :class="{changeTab:isActive}" @click.prevent="switchTab(1)" :disabled="postActive">
              <router-link to="/profile">投稿</router-link>
            </li>
            <li :class="{changeTab:!isActive}" @click.prevent="switchTab(2)" :disabled="favoriteActive">
              <router-link to="/profile/favorite">お気に入り</router-link>
            </li>
          </ul>
        </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      postActive : false,
      favoriteActive : false,
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