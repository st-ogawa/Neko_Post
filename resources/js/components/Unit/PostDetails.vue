<template>
  <div class="PostDetails">
    <transition name="modal">
      <div class="post-mask"  @click="closeDetails">
        <div class="modal-wrapper" >
          <div class="close-button" @click="closeDetails" title="閉じる">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel">
              <line x1="18" y1="1" x2="1" y2="18"/>
              <line x1="1" y1="1" x2="18" y2="18"/>
            </svg>
          </div>
          <div class="detail-card">
            <div class="detail-body">
              <div class="detail-image-container">
                <img :src="`/${detail.image}`" class="detail-image">
              </div>
              <div class="detail">
                <div class="post-user-status"></div>
                <div class="detail-comment">{{detailComment()}}</div>
                <div class="post-comment">
                  <textarea v-model="comment"  placeholder="コメントを追加"/>
                </div>
              </div>
            </div>
          </div>
          <a class="leftPaginationArrow"></a>
          <a class="rightPaginationArrow"></a>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props:{
    items: Array
  }
  ,
  data() {
    return {
      detail:[],
      comment:'',
      postId:''
    }
  },
  mounted(){
    
    let postId = this.$route.params.postId;
    let item = this.items.filter(function(item){
      if(postId == item.id)return true
    })
    this.detail = item[0]
  },
 
  methods:{
    getItem(){

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
      if(item.length <= 0){
        this.$router.push('/',()=>{})
        this.$emit('close');
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
      if(item.length <= 0){
        this.$router.push('/')
        this.$emit('close');
      }
      else{
        this.$router.push({ name:'content', params:{postId:`${postId}`}})
      }
      this.detail = item[0]
    },
    detailComment(){
      if(this.detail.comment == null){
        this.detail.comment = ''
      }
      return this.detail.comment
    },
    
  }
}
</script>
