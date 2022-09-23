import './bootstrap';
import router from "./router";
import  { createApp } from 'vue';
import VueCookies from 'vue-cookies'
import Store from './store/index';
import Components from "./components";

const app = createApp({
    Components
});

app.use(
    Store,
    VueCookies,
    router
);

app.mount("#app");

