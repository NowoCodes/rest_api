<template>
  <!--  {{ projects }}-->
  <div class="p-4 m-4 bg-blue-100 rounded flex flex-col container">
    <div class="flex justify-between">
      <h1 class="text-2xl text-gray-700">Projects</h1>
      <button class="bg-red-500 rounded text-white px-3 py-2 mr-6 hover:bg-red-700">Add Project</button>
    </div>

    <div class="justify-center flex">
      <table class="table-auto justify-center">
        <thead>
        <tr>
          <th class="border border-black px-4 py-2">ID</th>
          <th class="border border-black px-4 py-2">Name</th>
          <th class="border border-black px-4 py-2">Tasks</th>
          <th class="border border-black px-4 py-2">Actions</th>
        </tr>
        </thead>

        <tbody>
        <project-item v-for="project in projects" :key="project.id" :project="project" @project-deleted="fetchProjects"></project-item>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import ProjectItem from "./ProjectItem";

export default {
  components: {
    ProjectItem
  },
  data() {
    return {
      projects: []
    }
  },
  methods: {
    fetchProjects() {
      axios.get('api/projects').then((res) => {
        console.log(res);
        this.projects = res.data.data;
      });
    }
  },
  mounted() {
    this.fetchProjects();
  }
}
</script>