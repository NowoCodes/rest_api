<template>
  <div>
    <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="handleSubmit">
      <div class="flex items-center mb-6">
        <div class="w-1/3">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
            Name
          </label>
        </div>
        <div class="w-2/3">
          <input v-model="name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700"
                 type="text">
        </div>
      </div>

      <div class="flex items-center">
        <div class="w-1/3"></div>
        <div class="w-2/3">
          <p v-if="errorMsg.length" class="mb-4 text-red-500 text-xs italic">{{ errorMsg }}</p>
        </div>
      </div>

      <div class="flex items-center">
        <div class="w-1/3"></div>
        <div class="w-2/3">
          <button class="shadow bg-purple-500 hover:bg-purple-400 rounded px-3 py-2 mr-2 focus:shadow-outline focus:outline-none text-white font-bold"
                  type="submit">
            Add
          </button>

          <button class="shadow bg-gray-500 hover:bg-gray-400 rounded px-3 py-2 focus:shadow-outline focus:outline-none text-white font-bold" type="button"
                  @click="cancelForm">
            Cancel
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      errorMsg: '',
    }
  },
  methods: {
    async handleSubmit() {
      try {
        const response = await axios.post('api/projects', {name: this.name});
        if (response.data.status === 'OK') {
          this.name = '';
          this.errorMsg = '';
          this.$emit('project-added');
        }
      } catch (e) {
        if (e.response.data.error.name[0].length > 0) {
          this.errorMsg = response.data.error.name[0];
        }
      }
    },
    cancelForm() {
      this.name = '';
      this.errorMsg = '';
      this.$emit('cancel-form');
    }
  }
}
</script>