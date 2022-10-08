import { loadStatic } from '../../utils/static';
import Translator from './translator';

const el = document
  .querySelector('[http-equiv="content-language"]');

const locale = el
  ? el.getAttribute('content')
  : 'en';

const translator = new Translator(
  loadStatic('translations'),
  locale
);

export default translator;
