<template>
  <div class="PostList">
    
    <div class="show-image">
      <img :src="`${item.image}`" @click="postsDetail" >
    </div>
    <div v-show="detail">
      <PostDetails :item="item" @close="detail = false"/>
    </div>
  </div>
</template>

<script>

import PostDetails from './PostDetails.vue'

export default {
  components: {  PostDetails, },
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
    }
  },
}
</script>