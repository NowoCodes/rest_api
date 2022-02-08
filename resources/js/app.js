require('./bootstrap');

import {createApp} from 'vue';
import router from './routes'
import axios from 'axios';
import store from './store/index';

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://127.0.0.1:8000/';

import App from './components/App.vue';

store.dispatch('getUser').then(() => {
    const app = createApp(App)
    app.use(router)
    app.use(store)
    app.mount('#app');
});