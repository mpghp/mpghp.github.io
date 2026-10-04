/**
 * Point d'entrée de la tâche `js` → scripts/site.min.js
 * Amélioration progressive : le site reste complet sans JavaScript.
 */

import { documentReady } from '@kirigami/canva/helpers';
import { initMenu } from './menu.js';
import { initFilters } from './filter.js';
import { initQuiz } from './quiz.js';

documentReady(() => {
    initMenu();
    initFilters();
    initQuiz();
});
