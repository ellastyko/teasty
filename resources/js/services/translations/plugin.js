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

        /**
         * Check if translation exists
         * @param key
         * @return {boolean}
         */
        $transExists (key) {
          return translator.has(key);
        },

        /**
         * Get pluralised translation.
         * @param key
         * @param number
         * @param replace
         * @returns {*}
         */
        $transChoice (key, number = 1, replace) {
          return translator.choice(key, number, replace);
        },

        /**
         * Get raw translation.
         * @param key
         */
        $transRaw (key) {
          return translator.raw(key);
        },
      },
    });
  },
};
