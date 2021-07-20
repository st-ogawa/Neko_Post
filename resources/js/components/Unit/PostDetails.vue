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
        <div class="modal-wrapper" >
          <div class="detail-card">
            <div class="detail-body">
              <div class="detail-image-container">
                <img :src="`/${detail.posts.image}`" class="detail-image">
              </div>
              <div class="detail">
                <div class="post-user-status"></div>
                <div class="detail-comment">{{detailComment()}}</div>
                <div class="post-comment">
                  <textarea v-model="comment"  placeholder="コメントを追加"/>
                  <button @click="submitComment">送信</button>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="prevPaginationArrow " @click="prev()">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel"><path d="M15 18l-6-6 6-6"/></svg>
        </div>
        <div class="nextPaginationArrow" @click="next()" >
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel"><path d="M9 18l6-6-6-6"/></svg>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  // props:{
  //   items: Array
  // }
  // ,
  data() {
    return {
      detail:[],
      comment:'',
      postId:'',
    }
  },
  created(){
    let post_id = this.$route.params.postId;
    this.getItem(post_id);
  },
 
  methods:{
    getItem(post_id){
      
      axios.get('http://127.0.0.1:8000/api/posts/' + post_id)
      .then((res) => {
        this.detail = res.data
      }).catch((err) => {
        console.log(err)
      });
    },
    closeDetails(){
      this.$emit('close');
      this.$router.push('/',()=>{});
    },
    prev(){
      let postId = parseInt(this.$route.params.postId) +1
      let item = this.items.filter((item)=>{
        if(postId == item.id)return true
      })
     
      if(item.length === 0){
        this.closeDetails();
      }
      else{
        
        this.$router.push({ name:'content', params:{postId:`${postId}`}})
      }
      
      this.detail = item[0]
       
    },
    next(){
      let postId = parseInt(this.$route.params.postId) -1
      let item = this.items.filter((item)=>{
        if(postId == item.id)return true
      })
      if(item.length < 1){
        this.paginateArrow = false
        this.closeDetails();
      }
      else{
        this.$router.push({ name:'content', params:{postId:`${postId}`}})
      }
      this.detail = item[0]
    },
    detailComment(){
      if(this.detail.posts.comment == null){
        this.detail.posts.comment = ''
      }
      return this.detail.posts.comment
    },
    submitComment(){
      axios.post('http://127.0.0.1:8000/api/comments',this.comment)
    }
    
  }
}
</script>
