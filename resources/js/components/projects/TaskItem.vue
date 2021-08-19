<template>
  <div :class="{'bg-gray-600': task.priority == 'High'}" class="mb-2 p-2 bg-gray-300 grid grid-cols-3">
    <div class="flex items-center">{{ task.name }}</div>
    <div class="flex items-center justify-center">{{ task.due_date }}</div>
    <div class="flex items-center justify-center">
      <button class="bg-green-500 rounded text-white px-3 py-2 mr-2 hover:bg-green-700">Edit</button>
      <button @click="this.$emit('delete-task', task.id)" class="bg-red-500 rounded text-white px-3 py-2 mr-2 hover:bg-red-700">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['task'],
}
</script>