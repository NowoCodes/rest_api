<template>
  <div class="p-4 m-4 bg-white rounded flex">
    <div>
      <h1 class="text-2xl">Dashboard</h1>

      <p class="mt-4">
        Hello <span class="font-bold">{{ user.name }}</span>, Welcome to the Dashboard. You have registered with the email <span class="font-bold italic">{{ user.email }}</span>.
      </p>

      <p class="mt-2">
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
      </p>
      <p class="mt-2">
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
        Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit Some dumb shit
      </p>
    </div>
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