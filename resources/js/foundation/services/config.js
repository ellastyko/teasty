import { loadStatic } from '../utils/static';
const config = loadStatic('config');

export default {
    /**
     * Install plugin.
     * @returns {*}
     */
    install: (app) => {
        app.config.globalProperties.$config = (key) => {
            return config[key];
        }
    },
};

