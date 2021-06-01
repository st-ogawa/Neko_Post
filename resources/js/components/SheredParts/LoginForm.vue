<template>
  <input
    class="LoginForm"
    :value="value"
    @input="inputValue"
    @keyup.enter="keyup"
    spellcheck="false"
  />
</template>

<script>
export default {
  props:['val', 'error'],
  data(){
    return {
      value: '',
      placeholder : '',
    }
  },
  methods: {
    inputValue(event){
      this.$emit('input', event.target.value)
    },
    keyup(){
      this.$emit('sendData')
    }
  },
}
</script>
