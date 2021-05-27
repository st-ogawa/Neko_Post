<template>
  <div class="Post">
    <Header/>
    <div class="container">
      <div class="post-card">
        <div class="close-post">
            <img src="../../../../public/icon/close.svg" @click="close">
        </div>
        <h3>新規投稿</h3>
        <div class="post-detail">
           <div class="upload-image">
               <input-image　@inputImage="post"/>
           </div>
           <div class="post-comment">

           </div>
        </div>
        <SubmitButton value="投稿する" @sendPosts="post"/>
      </div>
    </div>
  </div>
</template>

<script>
import InputImage from '../SheredParts/InputImage.vue'
import SubmitButton from '../SheredParts/SubmitButton.vue'
import Header from '../Unit/Header.vue'
export default {
  components:{Header, SubmitButton, InputImage,},
  methods:{
    close(){
      this.$router.go(-1)
    },
    post(){

    }
  }
}
</script>