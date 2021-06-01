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
            <p><img :src="icon"><br/>
            {{message}}</p>
            <img :src="preview" :class="{'post-image':preview}">
            <div v-show="preview" ><img src="../../../../public/icon/close.svg" width="40" height="40">
            </div>
          </div>
           <div class="post-comment">
              <textarea placeholder="コメントを書く" class="comment"></textarea>
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
import CommentForm from '../SheredParts/LoginForm.vue'
import SubmitButton from '../SheredParts/SubmitButton.vue'
import Header from '../Unit/Header.vue'

export default {
  components:{Header, SubmitButton, CommentForm,},
  data() {
    return {
      message:'',
      file: '',
      preview: '',
      icon: require("../../../../public/icon/upload.svg")
    }
  },
  mounted(){
    this.message = 'クリックして画像を選択'
  },
  methods:{
    close(){
      this.$router.go(-1)
    },
    post(){
      axios.post('http://127.0.0.1:8000/api/posts',{
        file:this.file
      })
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
        this.icon = ''
      };
      reader.readAsDataURL(file);
      this.$emit('input', file);
    }
  }
}
</script>