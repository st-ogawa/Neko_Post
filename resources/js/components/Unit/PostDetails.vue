<template>
  <div class="PostDetails">
    <transition name="modal">
      <div class="post-mask" >
        <div class="close-button" @click="closeDetails" title="閉じる">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel">
            <line x1="18" y1="1" x2="1" y2="18"/>
            <line x1="1" y1="1" x2="18" y2="18"/>
          </svg>
        </div>
        <div class="modal-wrapper">
          <div class="detail-card">
            <Loader v-show="loading"/>
            <div class="detail-body">
              <div class="detail-image-container">
                <img :src="`/${detail.image}`" class="detail-image">
              </div>
              <div class="detail">
                <div class="post-user-status"></div>
                <ul class="detail-comment">
                  <div class="comment-list">
                    <li><span class="detail-comment">{{detailComment()}}</span></li> 
                    <li  v-for="item of postComment" :key="item.id">
                      <span>{{item.comment}}</span>
                    </li>
                  </div>
                </ul>
                <div class="input-field">
                  <textarea v-model="inputComment"  placeholder="コメントを追加" @keydown.enter="submitComment"/>
                  <button @click="submitComment">送信</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="prevPaginationArrow " @click="prev()">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel"><path d="M15 18l-6-6 6-6"/></svg>
        </div>
        <div class="nextPaginationArrow" @click="next()">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel"><path d="M9 18l6-6-6-6"/></svg>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import Loader from '../SheredParts/loader.vue';

export default {
  components: { Loader },
 
  data() {
    return {
      detail:[],
      inputComment:'',
      postComment:'',
      loading:false,
    }
  },
  created(){
    let postId = this.$route.params.postId;
    this.getPosts(postId);
  },
 
  methods:{
    async getPosts(postId){

      this.loading = true

      const res = await axios.get('http://127.0.0.1:8000/api/posts/' + postId)
      .catch(err=>{
        console.log(err)
      })
     
      this.postComment =  res.data.comment
      this.detail =  res.data.posts

      if(this.detail === null){
        this.loading = false
        this.closeDetails();
      }  

      this.loading = false
    },

    closeDetails(){
      this.$emit('close');
      this.$router.push('/',()=>{});
    },
    prev(){
      let postId = parseInt(this.$route.params.postId) +1
      this.getPosts(postId);
      this.$router.push({ name:'content', params:{postId:`${postId}`}})
    },
    next(){
      let postId = parseInt(this.$route.params.postId) -1
      this.getPosts(postId)
      this.$router.push({ name:'content', params:{postId:`${postId}`}})  
    },
    detailComment(){
      if(this.detail.comment == null){
        this.detail.comment = ''
      }
      return this.detail.comment
    },
    submitComment(){
      const data = { post_id: this.detail.id, user_id: this.detail.user_id, comment: this.inputComment }
      axios.post('http://127.0.0.1:8000/api/comments', data)
      .then(res=>{
        this.getPosts(this.detail.id);
      }) 
    },
  }
}
</script>
