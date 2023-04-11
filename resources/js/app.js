import './bootstrap';
import Container from "./foundation/services/container";

// Components
import authComponents from "./modules/Auth";
import landingComponents from "./modules/Landing"
import receiptComponents from "./modules/Receipt";
import components from "./components/index"

/**
 * ElementPlus
 */
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

/**
 * Vuex
 */
import store from "./store";

const app = new Container()
    .use(ElementPlus)
    .use(store)
    .components({
        ...authComponents,
        ...landingComponents,
        ...receiptComponents,
        ...components
    })
    .mount();
