<template>
  <div id="Discovery">
    <main>
      <div class="container">
        <div class="content">
          <Loader v-show="loading"/>
          <div v-show="!loading" class="image-list">
            <PostList v-for="item in items" :key="item.id" :item="item"/>
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
      items: [],
      loading: true,
      load:false,
      page:1,
    }
  },
  mounted(){
    window.onscroll= () =>{
      let scrollDownWindow = document.documentElement.scrollTop + window.innerHeight >= document;
      if(scrollDownWindow)this.getPostList()
    };
    this.getPostList();
  },
  methods: {
    
    getPostList(){
      if(this.loading){
        if(!this.load){
           this.loading = false
        }
      }
      axios.get('http://127.0.0.1:8000/api/posts')
      .then(res=>{
        if(this.page == res.data.last_page)this.load = true
        if(res.data.data){
          this.items = res.data.data
        }
        this.page +=1
      }).catch(err=>{
        this.load = true
        this.loading = true
        console.log(err)
      })
    },
  },
}
</script>