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
            <div class="detail-body">
              <div class="detail-image-container">
                <img :src="`/${detail.image}`" class="detail-image">
              </div>
              <div class="detail">
                <div class="post-user-status"></div>
                <div class="detail-comment">{{detailComment()}}</div>
                <div class="input-field">
                  <textarea v-model="inputComment"  placeholder="コメントを追加"/>
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
export default {
  props:{
    items: Array
  },
  data() {
    return {
      detail:[],
      inputComment:'',
    }
  },
  created(){
    let postId = this.$route.params.postId;
    this.getPosts(postId);
    this.getComment(postId);
  },
 
  methods:{
    getPosts(postId){
      let item = this.items.filter((item)=>{
        if(postId == item.id)return true
      })
       this.detail = item[0]
    },
    getComment(postId){
      axios.get('http://127.0.0.1:8000/api/posts/' + postId)
      .then((res) => {
        console.log(res.data.comment)
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
      this.getPosts(postId)
     
      if(this.detail === undefined){
        this.closeDetails();
      }
      else{
        this.$router.push({ name:'content', params:{postId:`${postId}`}})
      }
    },
    next(){
      let postId = parseInt(this.$route.params.postId) -1
      this.getPosts(postId)
     
      if(this.detail === undefined){
        this.closeDetails();
      }
      else{
        this.$router.push({ name:'content', params:{postId:`${postId}`}})
      }
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
    }
  }
}
</script>
