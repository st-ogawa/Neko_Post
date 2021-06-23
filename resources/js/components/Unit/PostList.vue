<template>
  <div class="PostList">
    <div class="show-image">
      <img :src="item.image" @click="postsDetail" >
    </div>
    <div v-show="detail">
      <router-view :item="item" @close="detail = false"/>
    </div>
  </div>
</template>

<script>
export default {
  props:{
    item:Object
  },
  data() {
    return {
      detail:false
    }
  },
  methods: {
    postsDetail(){
      this.detail = true
      this.$router.push('content',()=>{})
    }
  },
}
</script>