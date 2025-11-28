import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../pages/HomeView.vue';
import LoginView from '../pages/LoginView.vue';
import RegisterView from '../pages/RegisterView.vue';
import ForgotPasswordView from '../pages/ForgotPasswordView.vue';

const routes = [
    {
        path: '/',
        redirect: '/badmin-kuy',
    },
    {
        path: '/badmin-kuy',
        name: 'badminKuy',
        component: HomeView,
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