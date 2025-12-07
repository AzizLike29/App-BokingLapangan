import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../pages/HomeView.vue';
import ContactUsView from '../pages/ContactUsView.vue';
import ExperienceView from '../pages/ExperienceView.vue';
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
    {
        path: '/badmin-kuy',
        name: 'badminKuy',
        component: HomeView,
    },
    {
        path: '/experience',
        name: 'experience',
        component: ExperienceView,
    },
    {
        path: '/contact-us',
        name: 'contactUs',
        component: ContactUsView,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;