import { loadStatic } from 'Foundation/utils/static';
import { get as getValue, forEach } from 'lodash';
const { app } = loadStatic('config');

export default class Translator {
  /**
   * @param locales
   * @param locale
   */
  constructor (locales, locale) {
    this.locale = locale;
    this.locales = locales;
  }

  /**
   * Get translation message
   *
   * @param key
   * @param params
   */
  get (key, params = null) {
    const message  = this.getMessage(key);

    if (!message) {
      console.warn('No translation for: ' + key);
      return key;
    }

    if (params) {
      return this.compile(message, params);
    }

    return message;
  }

  /**
   * Check if translation has a value
   * @param key
   * @return {boolean}
   */
  has (key) {
    return !!getValue(this.locales[this.locale], key);
  }

  /**
   * Get pluralised value.
   *
   * @param key
   * @param number
   * @param replace
   * @returns {*}
   */
  choice (key, number, replace = {}) {
    const message  = this.getMessage(key);

    const replaceLength = Object.keys(replace).length;

    if (!message) {
      return key;
    }
    const messages = message.split('|');
    const chosenMessage = parseInt(number, 10) > 1 ? messages[1] : messages[0];

    return replaceLength > 0 ? this.compile(chosenMessage, replace) : chosenMessage;
  }

  /**
   * Get raw translation.
   * @param key
   */
  raw (key) {
    return getValue(this.locales[this.locale], key);
  }

  /**
   * Compile message
   *
   * @param message
   * @param params
   * @returns {*}
   */
  compile (message, params) {
    message = (typeof message === 'string') ? message : '';

    forEach(params, (value, key) => {
      message = message.replace(':' + key, value);
    });

    return message;
  }

  /**
   * Message accessor.
   * Fallback locale will be used if translation for current locale does not exist.
   *
   * @param key
   * @returns {string}
   */
  getMessage (key) {
    let locale = this.locale;

    if (!this.has(key)) {
      locale = app['fallback_locale'];
    }

    return getValue(this.locales[locale], key);
  }
}
