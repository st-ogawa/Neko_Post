<template>
  <textarea 
  class="TextArea" 
  spellcheck="false" 
  :placeholder="placeholder"
  :value="value"
  @input="updateValue"></textarea>
</template>

<script>
export default {
 props: {
   val: String,
 },
 data() {
   return {
     placeholder: '',
     value:''
   }
 },
  methods: {
    updateValue(e) {
      this.$emit('input', e.target.value)
    }
  },
 
}
</script>
