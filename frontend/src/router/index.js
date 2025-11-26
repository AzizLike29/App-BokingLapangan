import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '../pages/LoginView.vue';
import RegisterView from '../pages/RegisterView.vue';
import ForgotPasswordView from '../pages/ForgotPasswordView.vue';

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
    {
        path: '/lupa-password',
        name: 'forgotPassword',
        component: ForgotPasswordView,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;