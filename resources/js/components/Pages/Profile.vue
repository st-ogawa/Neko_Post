<template>
  <div id="Profile">
      <Header/>
    <section class="user-status">
       
    </section>
    <ProfileTab/>
    <router-view/>
  </div>
</template>

<script>
import ProfileTab from '../SheredParts/ProfileTab.vue'
import Header from '../Unit/Header'
export default {
  components:{ Header, ProfileTab }
}
</script>