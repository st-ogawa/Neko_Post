<template>
  <div class="SubmitButton" @click="submitData">{{value}}</div>
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

