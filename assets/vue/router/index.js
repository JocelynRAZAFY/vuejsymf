import Vue from 'vue'
import Router from 'vue-router'
import store from '../store/index'
import Dashboard from '../views/back/components/Dashboard'
import Profile from '../views/back/components/Profile'
import Tables from '../views/back/components/Tables'
import Maps from '../views/back/components/Maps'
import BadGateway from '../views/back/components/BadGateway'
import Login from '../views/back/login/Login'
import Buttons from '../views/back/components/button/Buttons'
import Custom from '../views/back/components/custom/Custom'

Vue.use(Router)

let router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'login',
            component: Login,
            props: { page: 1 },
        },
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard,
            props: { page: 1 },
            meta: { requiresAuth: true }
            // alias: '/'
        },
        {
            path: '/profile',
            name: 'Profile',
            props: { page: 2 },
            component: Profile
        },
        {
            path: '/tables',
            name: 'Tables',
            props: { page: 3 },
            component: Tables
        },
        {
            path: '/maps',
            name: 'Maps',
            props: { page: 4 },
            component: Maps
        },
        {
            path: '/404',
            name: 'BadGateway',
            props: { page: 5 },
            component: BadGateway
        },
        {
            path: '*',
            props: { page: 5 },
            redirect: '/404'
        },
        {
            path: '/buttons',
            name: 'Buttons',
            props: { page: 6 },
            component: Buttons
        },
        {
            path: '/custom',
            name: 'Custom',
            props: { page: 7 },
            component: Custom
        }
    ]
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (store.getters['user/getToken']) {
            next();
        } else {
            next({
                path: '/',
                // query: { redirect: to.fullPath }
            });
        }
    } else {
        next(); // make sure to always call next()!
    }
});

export default router