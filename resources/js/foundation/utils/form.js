function objectToFormData (obj, form, namespace) {
  const fd = form || new FormData();
  let formKey;

  for (const property in obj) {
    if (obj.hasOwnProperty(property) && obj[property]) {
      if (namespace) {
        formKey = namespace + '[' + property + ']';
      } else {
        formKey = property;
      }

      // if the property is an object, but not a File, use recursivity.
      if (obj[property] instanceof Date) {
        fd.append(formKey, obj[property].toISOString());
      } else if (typeof obj[property] === 'object' && !(obj[property] instanceof File)) {
        objectToFormData(obj[property], fd, formKey);
      } else { // if it's a string or a File object
        fd.append(formKey, obj[property]);
      }
    }
  }

  return fd;
}

/**
 * Create form data to store files on the server
 * Wraps object wit a form to work with multipart form (upload files).
 * @param data
 * @param method
 * @return {*|FormData}
 */
const createFormData = (data, method) => {
  const formData = objectToFormData(data);

  // Set method (POST, PATCH, DELETE etc.)
  if (method) {
    formData.append('_method', method);
  }

  return formData;
};

export {
  createFormData
};
