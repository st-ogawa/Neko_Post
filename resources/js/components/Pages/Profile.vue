<template>
  <div id="Profile">
      <Header/>
    <section class="user-status">
       
    </section>
    <LinkTab v-for="item in list" v-bind="item" :key="item.id" v-model="currentId" />
    <router-view/>
  </div>
</template>

<script>
import LinkTab from '../SheredParts/LinkTab.vue'
import Header from '../Unit/Header'
export default {
  components:{ Header, LinkTab },
  data() {
    return {
      currentId: 1,
      list: [
        { id: 1, label: '投稿', link: '/profile' },
        { id: 2, label: 'お気に入り', link: '/profile/favorite' },
      ]
    }
  },
}
</script>