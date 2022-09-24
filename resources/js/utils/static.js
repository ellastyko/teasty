/**
 * Simple object check.
 * @param item
 * @returns {[]}
 */
export function loadStatic (item) {
  let collection = [];
  try {
    collection = import ('Static/' + item + '.json');
  }
  catch(e) {
    console.warn(e);
  }

  return collection;
}

