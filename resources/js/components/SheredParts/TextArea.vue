<template>
  <div class="TextArea" 
  contenteditable="true" 
  spellcheck="false" 
  :placeholder="placeholder"
  @input="inputComment"></div>
</template>

<script>
export default {
 props: ['comment'],
 data() {
   return {
     placeholder: ''
   }
 },
  methods: {
    inputComment (e) {
      this.$emit('update', e.target.innerHTML)
    }
  },
 
}
</script>
