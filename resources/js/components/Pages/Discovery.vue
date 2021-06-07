<template>
  <div id="Discovery">
    <main>
      <div class="container">
        <div class="image-list">
          <PostList/>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import PostList from '../Unit/PostList.vue'



export default {
  components: { PostList },
  data() {
    return {
      
    }
  },
  methods: {
    // getPostList(){
    //   axios.get()
    // }
  },
    
}
</script>