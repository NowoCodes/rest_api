<template>
    <div>
        This is coming from Dashboard.vue <br>
      {{ user }}
    </div>
</template>

<script>
export default {
  data() {
    return {
      user: []
    }
  },
  mounted() {
    axios.get('/api/user').then(res => {
      this.user = res.data;
      // console.log(res);
    });
  }
}
</script>