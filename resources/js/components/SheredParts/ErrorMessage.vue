<template>
  <div class="ErrorMessage">
      <i class="exclamation"/>
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
