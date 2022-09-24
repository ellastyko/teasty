// File with imported components

/**
 * Pages
 */
import HomePage from "./views/Home/HomePage.vue";

import LoginPage from './views/Auth/LoginPage.vue'
import RegisterPage from './views/Auth/RegisterPage.vue'
import ResetPasswordPage from "./views/Auth/PasswordResetPage.vue";
import ForgotPasswordPage from "./views/Auth/ForgotPasswordPage.vue";

import ProfilePage from './views/User/ProfilePage.vue'
import Page404 from './views/Errors/Page404.vue'
import UsersPage from "./views/User/UsersListPage.vue";

/**
 * Components
 */
export default {

    'home-page': HomePage,

    // Auth
    'login-page': LoginPage,
    'register-page': RegisterPage,
    'reset-password-page': ResetPasswordPage,
    'forgot-password-page': ForgotPasswordPage,

    'profile-page': ProfilePage,
    'users-list-page': UsersPage,

    'page404': Page404,
}
