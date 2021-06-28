import Vue from 'vue'

Vue.directive('infinite-scroll', {
    inserted: function (el,binding) {
        console.log(binding.value(e, el))
    }
})