<template>
  <div class="TextArea" 
  contenteditable="true" 
  spellcheck="false" 
  @input="inputComment"></div>
</template>

<script>
export default {
 props: ['comment'],
  methods: {
    inputComment (e) {
      this.$emit('update', e.target.innerHTML)
    }
  },
 
}
</script>
