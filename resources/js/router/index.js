import Vue from 'vue';
import VueRouter from 'vue-router';
import NProgress from 'nprogress';
import Home from '../views/Home.vue';
import Login from '../views/Auth/Login.vue';
import Register from '../views/Auth/Register.vue';
import Dashboard from '../views/Dashboard.vue';
import ProjectDetail from '../views/ProjectDetail.vue';
import NotFound from '../views/NotFound.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: { requiresVisitor: true },
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: { requiresVisitor: true },
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: { requiresVisitor: true },
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
    {
        path: '/404',
        name: '404',
        component: NotFound,
    },
    {
        path: '*',
        redirect: { name: '404' },
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

router.beforeEach((to, from, next) => {
    NProgress.start();

    const loggedIn = localStorage.getItem('user');

    if (to.matched.some((record) => record.meta.requiresVisitor) && loggedIn) {
        next({ name: 'dashboard' });
    } else if (
        to.matched.some((record) => record.meta.requiresAuth) &&
        !loggedIn
    ) {
        next('/');
    }
    next();
});

router.afterEach(() => {
    NProgress.done();
});

export default router;
