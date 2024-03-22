import './assets/main.css';
import './assets/dashbord.css';
import './assets/css/nucleo-icons.css';
import './assets/css/perfect-scrollbar.css';
import './assets/css/tooltips.css';



import { createApp } from 'vue';
import App from './layouts/Admin.vue';
import router from './router';

// Create the Vue app instance
const app = createApp(App);
// Use the router plugin
app.use(router);

// Mount the app to the DOM
app.mount('#app');
