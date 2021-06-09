<template>
  <div class="PostList">
    
    <div class="show-image">
      <img :src="`${item.image}`" @click="postsDetail" >
    </div>
    <div v-show="detail">
      <PostDetails @close="detail = !detail">
        <div slot="body">
          <div class="post-detail">
            <div class="detail-image">
              <img :src="`${item.image}`">
            </div>
            <div class="detail">
              <div class="post-detail-comment">
                {{item.comment}}
              </div>
              <div class="comment"></div>
            </div>
          </div>
        </div>
      </PostDetails>
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