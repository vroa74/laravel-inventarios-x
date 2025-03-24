import { createApp } from 'vue';
import Alpine from 'alpinejs';
import './bootstrap';

window.Alpine = Alpine;
Alpine.start();

const app = createApp({
    data() {
        return {
            message: "✅ Vue.js está funcionando en Laravel 11"
        };
    }
});

app.mount("#app");
