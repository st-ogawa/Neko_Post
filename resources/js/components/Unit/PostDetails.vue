<template>
  <div class="PostDetails">
    <transition name="modal">
      <div class="post-mask">
        <div class="modal-wrapper">
          <div class="close-button" @click="closeDetails" title="閉じる">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel">
              <line x1="18" y1="1" x2="1" y2="18"/>
              <line x1="1" y1="1" x2="18" y2="18"/>
            </svg>
          </div>
          <div class="detail-container">
            <div class="detail-body">
              <div class="detail-image-container">
                <img :src="'/'+item.image" class="detail-image">
              </div>
              <div class="detail">
                <div class="post-user-status"></div>
                <div class="detail-comment">{{item.comment}}</div>
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
    item:Object
  }
  ,
  data() {
    return {
      comment: '',
    }
  },
  methods:{
    closeDetails(){
      this.$emit('close');
      this.$router.go(-1);
    }
  }
}
</script>
