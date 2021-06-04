<template>
    <div id="app">
      <Header/>
         <router-view/>
    </div>
</template>

<script>
import Header from './Unit/Header.vue'



export default {
  name: 'App',
  components:{Header}
 
}
</script>