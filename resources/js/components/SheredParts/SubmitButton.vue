<template>
  <button class="SubmitButton" @click="submitData">{{value}}</button>
</template>

<script>
export default {
  props:['value'],
  methods:{
    submitData:function(){

      this.$emit('sendData')
    }
  }
}
</script>

