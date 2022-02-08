<template>
    <!--  {{ projects }}-->
    <div class="container flex flex-col p-4 m-4 bg-white rounded">
        <div class="flex justify-between mb-4">
            <h1 class="text-4xl font-bold text-gray-700">Projects</h1>

            <button @click="showForm = true" class="px-3 py-2 mr-6 text-white bg-red-500 rounded hover:bg-red-700">Add
                Project
            </button>
        </div>

        <div class="flex justify-center" v-show="showForm">
            <project-form @cancel-form="showForm = false" @project-added="fetchProjects"></project-form>
        </div>

        <div class="flex justify-center">
            <table class="justify-center table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border border-black">ID</th>
                        <th class="px-4 py-2 border border-black">Name</th>
                        <th class="px-4 py-2 border border-black">Tasks</th>
                        <th class="px-4 py-2 border border-black">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <project-item v-for="project in projects" :key="project.id" :project="project"
                                  @project-deleted="fetchProjects"></project-item>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import ProjectItem from "./ProjectItem";
import ProjectForm from "./ProjectForm";

export default {
    components: {
        ProjectItem,
        ProjectForm
    },
    data() {
        return {
            projects: [],
            showForm: false,
        }
    },
    methods: {
        fetchProjects() {
            this.showForm = false;
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