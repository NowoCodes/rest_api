<template>
  <div class="p-4 m-4 bg-blue-100 rounded flex flex-col container">
    <div class="flex justify-between">
      <h1 class="text-2xl text-gray-700">ProjectDetail #{{ id }}</h1>
      <div>
        <button class="bg-green-500 rounded text-white px-3 py-2 mr-6 hover:bg-green-700" @click="showForm = true">
          Edit
        </button>
        <button class="bg-red-500 rounded text-white px-3 py-2 mr-6 hover:bg-red-700" @click="deleteProject(id)">Delete
          Project
        </button>
      </div>
    </div>

    <div v-show="showForm" class="flex justify-center">
      <project-edit-form v-if="project.id > 0" :project="project" @cancel-form="showForm = false"
                         @project-edited="fetchProject"></project-edit-form>
    </div>

    <div v-if="project.id > 0" class="mt-6">
      <div class="flex">
        <div class="w-1/6 p-2">
          <div class="bg-gray-400 text-gray-700 p-2 text-left">Project Name</div>
        </div>

        <div class="w-1/2 p-2">
          <div class="bg-gray-400 text-gray-700 p-2 text-left">{{ project.name }}</div>
        </div>
      </div>

      <div class="flex">
        <div class="w-1/6 p-2">
          <div class="bg-gray-400 text-gray-700 p-2 text-left">Created Date</div>
        </div>

        <div class="w-1/2 p-2">
          <div class="bg-gray-400 text-gray-700 p-2 text-left">{{ project.created_at }}</div>
        </div>
      </div>

      <div class="flex">
        <div class="w-1/6 p-2">
          <div class="bg-gray-400 text-gray-700 p-2 text-left">Updated Date</div>
        </div>

        <div class="w-1/2 p-2">
          <div class="bg-gray-400 text-gray-700 p-2 text-left">{{ project.updated_at }}</div>
        </div>
      </div>

      <div v-if="project.tasks.length > 0" class="my-4">
        <div class="flex justify-between mb-6">
          <h2 class="text-2xl text-gray-600 mb-4">Tasks</h2>
          <button class="bg-blue-500 rounded text-white px-3 py-2 mr-6 hover:bg-blue-700" @click="addTask">Add Task
          </button>
        </div>

        <div v-show="showTaskForm" class="flex justify-center">
          <div>
            <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="handleTaskSubmit">
              <div class="flex items-center mb-6">
                <div class="w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Name
                  </label>
                </div>
                <div class="w-2/3">
                  <input v-model="task.name"
                         class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700"
                         type="text">
                </div>
              </div>

              <div class="flex items-center">
                <div class="w-1/3"></div>
                <div class="w-2/3">
                  <p v-if="taskErrMsg.length" class="mb-4 text-red-500 text-xs italic">{{ taskErrMsg }}</p>
                </div>
              </div>

              <div class="flex items-center">
                <div class="w-1/3"></div>
                <div class="w-2/3">
                  <button
                      class="shadow bg-purple-500 hover:bg-purple-400 rounded px-3 py-2 mr-2 focus:shadow-outline focus:outline-none text-white font-bold"
                      type="submit">
                    Add
                  </button>

                  <button
                      class="shadow bg-gray-500 hover:bg-gray-400 rounded px-3 py-2 focus:shadow-outline focus:outline-none text-white font-bold"
                      type="button"
                      @click="cancelForm">
                    Cancel
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>


        <task-item v-for="task in project.tasks" :key="task.id" :task="task" @delete-task="deleteTask"></task-item>
      </div>
    </div>
  </div>
</template>

<script>
import TaskItem from "./TaskItem";
import ProjectEditForm from "./ProjectEditForm";

export default {
  props: ['id'],
  components: {
    TaskItem,
    ProjectEditForm,
  },
  data() {
    return {
      project: [],
      showForm: false,
      showTaskForm: false,
      task: {
        name: '',
        project_id: this.id,
      },
      taskErrMsg: '',
    }
  },
  methods: {
    deleteProject() {
      axios.delete('api/projects/' + this.id).then((res) => {
        this.$router.push({name: 'projects'});
      });
    },
    fetchProject() {
      this.showForm = false;
      axios.get('api/projects/' + this.id).then((res) => {
        this.project = res.data.data;
      });
    },
    deleteTask(id) {
      axios.delete('api/tasks/' + id).then((res) => {
        //   this.project.tasks
        const index = this.project.tasks.map(i => i.id).indexOf(id);
        this.project.tasks.splice(index, 1);
      });
    },
    addTask() {
      this.showTaskForm = true;
      this.task.name = '';
      this.taskErrMsg = '';
    },
    cancelForm() {
      this.showTaskForm = false;
      this.taskErrMsg = '';
    },
    async handleTaskSubmit() {
      try {
        const response = await axios.post('api/tasks', this.task);
        // console.log(response);
        if (response.data.status === 'OK') {
          // this.fetchProject();
          this.project.tasks.push(response.data.data)
          this.showTaskForm = false;
          this.taskErrMsg = '';
        }
      } catch (e) {
        if (e.response.data.errors.name[0].length > 0) {
          this.taskErrMsg = e.response.data.errors.name[0];
        }
      }
    },
  },
  mounted() {
    this.fetchProject()
  }
}
</script>