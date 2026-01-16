import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import { animate } from 'motion'
import Toast, { POSITION } from "vue-toastification";
import "vue-toastification/dist/index.css";
import i18n from "./components/lang/i18n.js";

const app = createApp(App)

app.use(i18n);

app.directive('fade-up', {
    mounted(el) {
        animate(el, { opacity: [0, 1], y: [20, 0] }, { duration: 0.5 })
    }
})

app.use(Toast, {
    position: POSITION.TOP_RIGHT,
    timeout: 3000,
    closeOnClick: true,
    pauseOnHover: true,
});

app.use(router)
app.mount('#app')
