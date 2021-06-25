<template>
  <div class="Post">
    <div class="container">
      <div class="post-card">
        <div class="close-post" title="閉じる">
            <img src="../../../../public/icon/close.svg" @click="close">
        </div>
        <h3>新規投稿</h3>
        <div class="post-container">
          <div class="post-image-area">
            <div class="image-input-field">
              <input type="file" @change="upload"  accept="image/bmp,image/jpeg,image/png,image/tiff">
              <p v-show="!preview">
                <img src="../../../../public/icon/upload.svg"><br/>
              {{message}}</p>
              <div v-show="preview">
                <div class="cancel-button" @click="imageCancel">
                  <img src="../../../../public/icon/close.svg" class="cancel" >
                </div>
              </div>
              <img :src="preview" :class="{'post-image':preview}">
            </div>
          </div>
          <div class="post-comment-area">
            <div class="post-comment">
              <TextArea v-model="comment" placeholder="コメントを追加"/>
            </div>
            <div class="post-button">
              <SubmitButton value="投稿する" @sendData="post"/>
            </div>
          </div>
        </div>
        <Loader v-show="loading"/>
        <div v-show="modal">
          <modal @close="modal = !modal" class="post-modal">
            <h4 slot="header">投稿しました</h4>
            <div slot="body">
              <img :src="preview" class="modal-image">
            </div>
          </modal>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loader from '../SheredParts/loader.vue'
import SubmitButton from '../SheredParts/SubmitButton.vue'
import TextArea from '../SheredParts/TextArea.vue'
import Modal from '../Unit/Modal.vue'

export default {

  components:{SubmitButton, TextArea, Modal, Loader},
  data() { 
    return {
      message:'',
      file: '',
      preview: '',
      comment:'',
      modal:false,
      loading:false,
    }
  },
  mounted(){
    this.message = '画像を選択'
  },
  methods:{
    close(){
      this.$router.go(-1)
    },
    post(){
      this.loading = true
      const postData = new FormData();
        postData.append("file", this.file);
        postData.append("comment", this.comment);
        postData.append("user_id",this.$store.getters.getUserId)
      axios.post('http://127.0.0.1:8000/api/posts',postData).then((res) => {
        this.modal = true
        this.loading = false
        setTimeout(() => {
          this.preview = ''
          this.$router.push('/',()=>{})
        },2000);
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
      };
      reader.readAsDataURL(file);
    },
    imageCancel(){
      this.preview =''
      this.message = '画像を選択'
    }
  }
}
</script>