<template>
  <div class="LoginTab">
    <button @click="switchTab" :class="[disabled, 'disabledTab']" :disabled="!disabled">
      {{label}}   
    </button>
  </div>
</template>

<script>
export default {
  props:{
    id: '',
    label: '',
    value: '',
    link: String,
  },
  methods:{
    switchTab(){
      console.log(link,value,id,label)
      this.$emit('input', this.id)
      this.$router.push(link)
    },
    // switchTab(num){
     
    //   if(num === 1){
    //     this.loginActive = true 
    //     this.registerActive = false
    //     this.isActive = false
        
    //   } 
    //   else if(num === 2){
    //     this.loginActive = false 
    //     this.registerActive = true
    //     this.isActive = true
        
    //   }
      
    // },
    disabled(){
      return this.value === this.id ? 'disabled' : false
    }
    
  }
}
</script>