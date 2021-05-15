require('./bootstrap');

import { createApp } from 'vue';

import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp(ExampleComponent)

app.mount('#app');


// import Vue from 'vue';
// import ExampleComponent from './components/ExampleComponent.vue';

// new Vue({
//     el: '#app',
//     components: { ExampleComponent }
// });