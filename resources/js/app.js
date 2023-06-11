import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import './toast';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
