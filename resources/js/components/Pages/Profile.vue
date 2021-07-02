<template>
  <div id="Profile">
    <div class="profile-card">
      <section class="user-status">
        <div class="profile-image">
          <img src="" id="profile-image-circle">
        </div>
        <div class="profile-detail">
          <h3>username</h3>
          <span>account</span>
        </div>
        <ul>
          <li>
            <span>
              投稿
              <span>NaN</span>
              件
            </span>
          </li>
        </ul>
      </section>
        <nav>
          <ul class="switch-tab">
            <LinkTab v-for="item in list" v-bind="item" :key="item.id" v-model="currentId" />
          </ul>
        </nav>
        <router-view/>
    </div>
  </div>
</template>

<script>
import LinkTab from '../SheredParts/LinkTab.vue'

export default {
  components:{ LinkTab },
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