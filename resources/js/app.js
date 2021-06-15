require('./bootstrap');

import { createApp } from 'vue';
import router from './routes';
import VueRouter from 'vue-router';

import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp(ExampleComponent)
VueRouter.use(VueRouter)
app.use(router)
app.mount('#app');

// createApp(ExampleComponent).mount('#app');
// createApp(ExampleComponent).use(router);


// import Vue from 'vue';
// import ExampleComponent from './components/ExampleComponent.vue';

// new Vue({
//     el: '#app',
//     components: { ExampleComponent }
// });