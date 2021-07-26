require('./bootstrap');

import { createApp } from 'vue';
import router from './routes';

import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp(ExampleComponent)
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