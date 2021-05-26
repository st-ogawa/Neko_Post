<template>
  <li class="linkTab">
      <div @click="switchTab" :class="[active, 'disabledTab']">
        {{label}}   
      </div>
  </li>
</template>

<script>
export default {
  props:{
    id: Number,
    label: String,
    value: Number,
    link: String,
  },
  computed:{
    active(){
      return this.value === this.id ? 'active' : false
    }
  },
  methods:{
    switchTab(){
      this.$emit('input', this.id)
      this.$router.push(this.link, () => {})
    },    
  }
}
</script>