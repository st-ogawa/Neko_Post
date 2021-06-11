<template>
  <div class="PostDetails">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="detail-container">
            <div class="detail-body">
              <div class="detail-image">
                <img :src="`${item.image}`">
              </div>
              <div class="detail">
                <div class="user-status"></div>
                <div class="post-detail-comment">
                  {{item.comment}}
                </div>
              </div>
            </div>
            <div class="close-button" @click="$emit('close')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel">
              <line x1="18" y1="1" x2="1" y2="18"/>
              <line x1="1" y1="1" x2="18" y2="18"/>
            </svg>
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
}
</script>
