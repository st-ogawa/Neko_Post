<template>
  <div class="Header">
    <div class="header-navi">
      <div class="header-logo">
        <img src="images/ねこぽすと.png" class="title-logo" alt="ねこぽすと">
      </div>
      <nav>
        <ul class="nav-link">
          <li class="link nf-font"><router-link to="/">ホーム</router-link></li>
          <li class="link nf-font"><router-link to="/post">投稿する</router-link></li>
          <!-- <li class="link"><router-link to="/auth/login"><img src="../../../../public/icon/grid.svg"></router-link></li>
          <li class="link"><router-link to="/profile">profile<img src=""></router-link></li> -->
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {

}
</script>
