import * as VueRouter from 'vue-router';

// Components
import Home from './views/Home/HomePage.vue';

import Login from './views/Auth/LoginPage.vue';
import Register from './views/Auth/RegisterPage.vue';
import ForgotPasswordPage from "./views/Auth/ForgotPasswordPage.vue";
import PasswordResetPassword from "./views/Auth/PasswordResetPage.vue";
import ProfilePage from './views/User/ProfilePage.vue'

import Page404 from './views/Errors/Page404.vue';

const routes = [
    // Auth
    { path: "/", component: Home },
    { path: "/register", component: Register },
    { path: "/login", component: Login },
    { path: "/reset-password", component: ForgotPasswordPage },
    { path: "/new-password/:token", component: PasswordResetPassword },

    { path: "/profile", component: ProfilePage },

    // Errors
    { path: "*", component: Page404 }
]


export default new VueRouter.createRouter({

    mode: VueRouter.createWebHashHistory(),
    routes
})
