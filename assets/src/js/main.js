import '../fonts/OpenSans-Regular.woff2';
import '../fonts/OpenSans-Italic.woff2';

import '../sass/main.scss';

import './common/custom-select.js';
import './common/focus.js';
import './common/screen-width.js';
import './common/screen-height.js';
import './common/css-variables.js';

import './layouts/cookies-notice.js';
import './layouts/site-header.js';
import './layouts/site-menu.js';
import './layouts/site-top-gradient.js';

import './common/on-screen.js';

import { initModals } from './common/modals.js';

(() => {
    initModals();
})();
