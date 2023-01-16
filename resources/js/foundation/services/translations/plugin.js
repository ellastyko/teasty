import translator from './locale';

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
         * Translator instance.
         *
         * @returns {Translator}
         */
        $translator () {
          return translator;
        },
      },

      /**
       * Available methods.
       */
      methods: {
        /**
         * Get translation with key.
         * @param key
         * @param params
         * @returns {*}
         */
        $trans (key, params = null) {
          return translator.get(key, params);
        },
      },
    });
  },
};
