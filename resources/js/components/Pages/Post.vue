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
          <div class="image-input-field">
            <input type="file" @change="upload"  accept="image/*,">
            <p>{{message}}</p>
            <img :src="preview" :class="{'post-image':preview}">
          </div>
           <div class="post-comment">

           </div>
        </div>
        <div class="post-button">
          <SubmitButton value="投稿する" @sendData="post"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SubmitButton from '../SheredParts/SubmitButton.vue'
import Header from '../Unit/Header.vue'
export default {
  components:{Header, SubmitButton,},
  data() {
    return {
      message:'',
      file: '',
      preview: ''
    }
  },
  methods:{
    close(){
      this.$router.go(-1)
    },
    post(){
      this.mesage = 'aaaaaaa'
    },
    upload(event){
      this.file = event.target.files[0]
      if(!this.file.type.match('image.*')){
        this.message = 'ファイル形式が正しくないためアップロードできません'
        this.preview = ''
        return
      }
      this.readImage(this.file);
    },
    readImage(file){
      var reader = new FileReader();
      reader.onload = (event) => {
        this.preview = event.target.result
        this.message = ''
      };
      reader.readAsDataURL(file);
      this.$emit('input', file);
    }
  }
}
</script>