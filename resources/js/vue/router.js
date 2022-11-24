import { createRouter, createWebHistory } from 'vue-router';

import Index from './components/Index';
import Company from './components/Company';
import User from './components/User';

const routes = [
    {
        name : 'index',
        path : '/vue/',
        component: Index
    },
    {
        name : 'company',
        path : '/vue/company',
        component : Company
    },
    {
        name : 'user',
        path : '/vue/user',
        component : User
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes : routes,
    linkActiveClass: true
});

export default router;