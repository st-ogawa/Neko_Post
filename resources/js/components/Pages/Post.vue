<template>
  <div class="Post">
    <div class="container">
      <div class="post-card">
        <div class="close-post" title="閉じる">
            <i class="close-icon-b" @click="close"/>
        </div>
        <h2 class="nf-font" style="margin:20px 0  0 0;">新規投稿</h2>
        <div class="post-container">
          <div class="post-image-area">
            <div class="image-input-field">
              <input type="file" @change="upload"  accept="image/bmp,image/jpeg,image/png,image/tiff">
              <p v-show="!preview">
                <i class="upload-icon"/><br/>
              {{message}}</p>
              <div v-show="preview">
                <div class="cancel-button" @click="imageCancel">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel" class="cancel">
                    <line x1="18" y1="1" x2="1" y2="18"/>
                    <line x1="1" y1="1" x2="18" y2="18"/>
                  </svg>
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
      axios.post('https://neko-post.com//api/posts',postData).then((res) => {
        this.modal = true
        this.loading = false
        setTimeout(() => {
          this.preview = ''
          this.$router.push('/',()=>{})
        },2000);
      }).catch((err) => {
        console.info(err)
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