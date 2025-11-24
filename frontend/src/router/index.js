import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '../pages/LoginView.vue';
import RegisterView from '../pages/RegisterView.vue';

const routes = [
    {
        path: '/',
        redirect: '/login',
    },
    {
        path: '/login',
        name: 'login',
        component: LoginView,
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterView,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;