<template>
  <div class="PostDetails">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="close-button" @close="$emit('close')">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="#ededed" stroke-width="2" stroke-linecap="round" stroke-linejoin="bevel">
              <line x1="18" y1="6" x2="6" y2="18"/>
              <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
          </div>
          <div class="detail-container">
            <div class="detail-body">
              <div class="detail-image">
                <img :src="`${item.image}`">
              </div>
              <div class="detail">
                <div class="post-detail-comment">
                  {{item.comment}}
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
}
</script>
