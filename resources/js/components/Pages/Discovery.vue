<template>
  <div id="Discovery">
    <main>
      <div class="container">
        <div class="content">
          <div class="image-list">
            <PostList v-for="item in list" :key="item.id" :item="item"/>
          </div>
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
    list:[]
    }
  },
  mounted(){
  this.getPostList();
  },
  methods: {
    getPostList(){
      axios.get('http://127.0.0.1:8000/api/posts')
      .then(res=>{
        this.list = res.data
      }).catch(err=>{
        console.log(err)
      })
    }
  },
}
</script>