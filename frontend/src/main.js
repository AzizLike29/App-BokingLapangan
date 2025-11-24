import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import { animate } from 'motion'

const app = createApp(App)

app.directive('fade-up', {
    mounted(el) {
        animate(el, { opacity: [0, 1], y: [20, 0] }, { duration: 0.5 })
    }
})

app.use(router)
app.mount('#app')
