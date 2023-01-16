/**
 * For duration in seconds to the '00:00:00' format.
 *
 * @param duration - seconds
 *
 * @return {string}
 */
const formatDuration = (duration) => {
  const date = new Date(0);
  date.setSeconds(duration);

  return date.toISOString().substr(11, 8);
};

export {
  formatDuration,
};
