import './bootstrap';
import Container from "./foundation/services/container";

// Components
import authComponents from "./modules/Auth";
import landingComponents from "./modules/Landing"
import receiptComponents from "./modules/Receipt";

// PrimeVue
import PrimeVue from 'primevue/config';
import primeVueComponents from "./components/primevue";

const app = new Container()
    .use(PrimeVue)
    .components({
        ...authComponents,
        ...landingComponents,
        ...receiptComponents,
        ...primeVueComponents
    })
    .mount();
