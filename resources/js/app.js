import './bootstrap';
import Container from "./foundation/services/container";

// Components
import authComponents from "./modules/Auth";
import landingComponents from "./modules/Landing"
import receiptComponents from "./modules/Receipt";

// ElementPlus
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

const app = new Container()
    .use(ElementPlus)
    .components({
        ...authComponents,
        ...landingComponents,
        ...receiptComponents,
    })
    .mount();
