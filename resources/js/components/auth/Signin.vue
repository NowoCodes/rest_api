<template>
  <div class="h-screen flex justify-center items-center mx-auto">
    <div>
      <div>
        <h1 class="mb-6 text-center font-bold text-gray-600">Login Form</h1>
      </div>
      <form @submit.prevent="handleLogin" class="w-full max-w-xs bg-white flex flex-col py-5 px-8 rounded-lg shadow-lg" action="">
        <label class="text-gray-700 font-bold py-2">Email</label>
        <input v-model="email"
            class="text-gray-700 shadow border rounded border-gray-300 focus:outline-none focus:shadow-outline py-1 px-3 mb-3"
            type="text" placeholder="Email">
        <label class="text-gray-700 font-bold py-2">Password</label>
        <input v-model="password"
            class="text-gray-700 shadow border rounded border-gray-300 mb-3 py-1 px-3 focus:outline-none focus:shadow-outline"
            type="password" placeholder="********">
        <p v-if="errorMsg.length" class="text-red-500 text-xs italic">{{ errorMsg }}</p>
        <div class="flex justify-between items-center my-4">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
            Sign In
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export  default {
  data() {
    return {
      'email' : '',
      'password' : '',
      'errorMsg' : '',
    }
  },
  methods: {
    async handleLogin() {
      this.errorMsg = '';

      // Action here
      try {
        await this.$store.dispatch('signIn', {email: this.email, password: this.password});
        await this.$router.push({name: 'dashboard'});
      } catch (e) {
        this.errorMsg = e;
      }
    }
  }
}
</script>