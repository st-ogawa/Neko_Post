<template>
  <div class="ErrorMessage">
      <img src="../../../../public/icon/exclamation-mark.svg">
      <p>{{value}}</p>
    </div>
</template>

<script>
export default {
  props:[
    'value'
  ]
}
</script>
