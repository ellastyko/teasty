import { createStore } from 'vuex'

import user from './modules/user'
import receipt from "./modules/receipt";

export default new createStore({
    modules: {
        user,
        receipt,
    },
    strict: import.meta.env.NODE_ENV !== 'production'
})
