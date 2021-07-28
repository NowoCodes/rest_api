<template>
  <div>
    This is coming from Dashboard.vue <br>
    {{ user }}
  </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
  computed: {
    ...mapGetters([
        'user'
    ])
  }
}
</script>