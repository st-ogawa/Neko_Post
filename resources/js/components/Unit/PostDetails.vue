<template>
  <div class="PostDetails">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="detail-container">
              <div class="close-button">
                <div class="details-body">
                  <slot name="body"></slot>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
  </div>
</template>
