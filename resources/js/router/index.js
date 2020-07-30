import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Login from '../views/Auth/Login.vue';
import Register from '../views/Auth/Register.vue';
import Dashboard from '../views/Dashboard.vue';
import ProjectDetail from '../views/ProjectDetail.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
    },
    {
        path: '/projects',
        name: 'dashboard',
        component: Dashboard,
        meta: { requiresAuth: true },
    },
    {
        path: '/projects/:id',
        name: 'project-detail',
        component: ProjectDetail,
        props: true,
        meta: { requiresAuth: true },
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user');

    if (to.matched.some((record) => record.meta.requiresAuth) && !loggedIn) {
        next('/');
    }
    next();
});

export default router;
