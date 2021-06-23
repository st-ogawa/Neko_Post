<template>
  <div id="Discovery">
    <main>
      <div class="container">
        <div class="content">
          <Loader v-show="loading"/>
          <div v-show="!loading" class="image-list">
            <PostList v-for="item in list" :key="item.id" :item="item"/>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Loader from '../SheredParts/loader.vue';
import PostList from '../Unit/PostList.vue'



export default {
  components: { PostList, Loader },
  data() {
    return {
    list: [],
    loading: true,
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
        this.loading = false
      }).catch(err=>{
        console.log(err)
      })
    }
  },
}
</script>