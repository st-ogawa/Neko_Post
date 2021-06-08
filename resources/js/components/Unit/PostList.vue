<template>
  <div class="PostList">
    <div class="show-image">
      <img :src="`${item.image}`" @click="postsDetail" >
    </div>
    <div v-show="modal">
      <Modal @close="modal = !modal">
        <div slot="body" class="post-modal">
          <div class="post-detail">
            <div class="detail-image">
              <img :src="`${item.image}`">
            </div>
            <div class="detail">
              <div class="post-detail-comment">
                {{item.comment}}
              </div>
              <div class="comment"></div>
            </div>
          </div>
        </div>
      </Modal>
    </div>
  </div>
</template>

<script>
import Modal from "./Modal.vue"

export default {
  components: { Modal, },
  props:{
    item:Object
  },
  data() {
    return {
      modal:false
    }
  },
  methods: {
    postsDetail(){
      this.modal = true
    }
  },
}
</script>