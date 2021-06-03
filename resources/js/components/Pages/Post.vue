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
            <input type="file" @change="upload"  accept="image/bmp,image/jpeg,image/png,image/tiff">
            <p><img :src="icon"><br/>
            {{message}}</p>
            <div v-show="preview">
              <div class="cancel-preview" @click="imageCancel">
                <img src="../../../../public/icon/close.svg" class="preview" >
              </div>
            </div>
            <img :src="preview" :class="{'post-image':preview}">
          </div>
           <div class="post-comment">
              <TextArea :comment="comment" @update="update"/>
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
import TextArea from '../SheredParts/TextArea.vue'
import Header from '../Unit/Header.vue'

export default {
  components:{Header, SubmitButton, TextArea},
  data() {
    
    return {
      message:'',
      file: '',
      preview: '',
      comment:'',
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

      const postData = new FormData();
        postData.append("file", this.file);
        postData.append("comment", this.comment);
        postData.append("user_id",this.$store.getters.getUserId)

      axios.post('http://127.0.0.1:8000/api/posts',postData).then((res) => {
        console.log(res)
      }).catch((err) => {
        console.log(err)
      });
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
    },
    update(comment) {
      this.comment = comment
    },
    imageCancel(){
      this.preview =''
      this.message = 'クリックして画像を選択'
    }
  }
}
</script>