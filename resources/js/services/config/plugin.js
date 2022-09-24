import { loadStatic } from '../../utils/static';
const config = loadStatic('config');

export default {
  /**
   * Install plugin.
   * @param Vue
   * @returns {*}
   */
  install (Vue) {
    Vue.mixin({
      /**
       * Computed properties.
       */
      computed: {
        /**
         * Get static config
         * @returns {Translator}
         */
        $config () {
          return config;
        },
      },
    });
  },
};
