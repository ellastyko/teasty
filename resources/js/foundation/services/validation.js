import { loadStatic } from '../utils/static';
import isObject from 'lodash/isObject';
import transform from 'lodash/transform';


  function deepMap (obj, iterator, context) {
    return transform(obj, function (result, val, key) {
      val = Array.isArray(val) && !val.length ? {} : val;
      result[key] = isObject(val) ?
        deepMap(val, iterator, context) :
        iterator.call(context, val, key, obj);
    });
  }
  const validation = loadStatic('validation');
  return deepMap(validation, (value, ruleName) => {
    if (ruleName === 'regex') {
      const flags = value.split('/').pop();

      value = new RegExp(value.substring(
        1,
        value.lastIndexOf('/')
      ), flags);
    }

    return value;
  });
