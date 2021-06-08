<template>
  <div id="modal">
      <transition name="modal"  appear>
        <div class="modal-mask" @click="$emit('close')">
          <div class="modal-wrapper">
            <div class="modal-container">
              <div class="modal-close">
                <button class="modal-default-button" @click="$emit('close')">
                    <i class="" @click="$emit('close')"></i>
                </button>
              </div>
              <div class="modal-header">
                <slot name="header"></slot>
              </div>
              <div class="modal-body">
                <slot name="body"></slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
  </div>
</template>