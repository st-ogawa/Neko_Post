<template>
  <div id="Discovery">
    <div class="container">
      <div class="content">
        <Loader v-show="loading"/>
        <div v-show="detail">
          <router-view :items="items" @close="detail = false"/>
        </div>
        <div  class="image-list">
          <PostList v-for="item in items" :key="item.id" :item="item" @open="detail = true"/>
          <div v-infinite-scroll="handler"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loader from '../SheredParts/loader.vue';

import PostList from '../Unit/PostList.vue'



export default {
  components: { PostList, Loader },
  data() {
    return {
      items: [],
      loading: false,
      load:false,
      page:0,
      perPage:15,
      startScrollYOffset:0,
      detail:false,
    }
  },
  mounted(){
    this.getPostList();
  },
  
  methods: {
    handler(evt, el){
      let scrollHeight = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight)

      let scrollBottom = scrollHeight - window.innerHeight
      if(window.pageYOffset  >= scrollBottom && !this.load){
        this.startScrollYOffset = window.innerHeight + window.pageYOffset;
        this.perPage +=15
        this.getPostList();
      }
    },
    getPostList(){
    
      if(this.load)return
      this.load = true
      this.loading = true
      axios.get('https://neko-post.com/api/posts?page=' + this.page)
      .then(res=>{
        this.items = res.data.posts.slice(this.page, this.perPage)
        console.log(this.items);
        this.loading = false
        this.load = false
      }).catch(err=>{
        this.load = false
        this.loading = false
        console.info(err)
      })
    },
  },
}
</script>