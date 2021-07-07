<template>
  <div class="PostList">
    
    <div class="show-image">
      <img :src="item.image" @click="postsDetail(item.id)" >
    </div>
  </div>
</template>
<script>
export default {
  props:{
    item: Object
  },
  methods: {
    postsDetail(post_id){
      this.$emit('open')
      this.$router.push({ name:'content', params:{postId:`${post_id}`}})
    }
  },
}
</script>