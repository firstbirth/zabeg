import { createApp } from 'vue';
import Index from "@/components/Index.vue";
import router from './router.js';
// import './bootstrap';
import '../css/app.css';

const app = createApp({
   components: {
       Index,
   },
    router,
});

app.use(router)

app.mount('#app');
