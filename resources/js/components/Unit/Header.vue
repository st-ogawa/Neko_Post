<template>
  <div class="Header">
    <div class="header-navi">
    　<div class="logo-container">
        <img src="../../../../public/images/ねこぽすと.png">
      </div>
      <nav>
        <ul class="nav-link">
          <li class="link"><router-link to="/post"><img src="../../../../public/icon/plus-circle.svg" title="投稿"></router-link></li>
          <li class="link"><router-link to="/"><img src="../../../../public/icon/home.svg" title="ホーム"></router-link></li>
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
