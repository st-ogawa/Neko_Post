<template>
  <div class="PostDetails">
    <transition name="modal">
      <div class="post-mask">
        <div class="modal-wrapper"  @click="closeDetails">
          <div class="close-button" @click="closeDetails" title="閉じる">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel">
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
    closeDetails(){
      // this.$emit('close');
      // this.$router.go(-1);
      let pre = parseInt(this.$route.params.postId) -1
      let prev = this.items.filter((item)=>{
        if(pre == item.id)return true
      })
     if(prev.length <= 0){
        this.$router.replace('/');
        this.$emit('close');
     }
     this.detail = prev[0]
     this.$router.push({ name:'content', params:{postId:`${pre}`}})
    },
    detailComment(){
      if(this.detail.comment == null){
        this.detail.comment = ''
      }
      return this.detail.comment
    }
  }
}
</script>
