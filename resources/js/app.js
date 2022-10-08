import './bootstrap';
import Container from "./foundation/services/container";
// Components
import authComponents from "./modules/Auth";
import homeComponents from "./modules/Home"
import receiptComponents from "./modules/Receipt";

import PrimeVue from 'primevue/config';
import primeVueComponents from "./components/primevue";

const app = new Container()
    .use(PrimeVue)
    .components({
        ...authComponents,
        ...homeComponents,
        ...receiptComponents,
        ...primeVueComponents
    })
    .mount();
