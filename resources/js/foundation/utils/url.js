const PLACEHOLDER_URL = 'https://yoursite.com';

const URL_REGEX = '^(https?:\\/\\/)?'+ // protocol
  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
  '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
  '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
  '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
  '(\\#[-a-z\\d_]*)?$'; // fragment locator

/**
 * Check if value is valid url
 * @param value
 * @return {boolean}
 */
const isValidUrl = (value) => {
  const pattern = new RegExp(URL_REGEX, 'i');
  return !!pattern.test(value);
};

export {
  isValidUrl,
  PLACEHOLDER_URL
};