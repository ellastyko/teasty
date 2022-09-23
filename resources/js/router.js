import * as VueRouter from 'vue-router';

// Components
import Home from './views/Home/HomePage';

import Login from './views/Auth/LoginPage';
import Register from './views/Auth/RegisterPage';
import ForgotPasswordPage from "./views/Auth/ForgotPasswordPage";
import PasswordResetPassword from "./views/Auth/PasswordResetPage";
import ProfilePage from './views/User/ProfilePage'

import Page404 from './views/Errors/Page404';

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
