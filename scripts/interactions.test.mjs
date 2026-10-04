import assert from 'node:assert/strict';
import { test } from 'node:test';
import { initFilters } from '../src/scripts/filter.js';
import { initMenu } from '../src/scripts/menu.js';
import { initQuiz } from '../src/scripts/quiz.js';

// Faux élément DOM : juste ce que les scripts du site utilisent.
class Node {
    constructor(dataset = {}) {
        this.dataset = dataset;
        this.value = '';
        this.hidden = false;
        this.disabled = false;
        this.textContent = '';
        this.listeners = {};
        this.attributes = {};
        this.classes = new Set();
        this.classList = {
            toggle: (name, on) => (on ? this.classes.add(name) : this.classes.delete(name)),
            remove: (...names) => names.forEach((name) => this.classes.delete(name)),
        };
    }
    addEventListener(name, fn) { this.listeners[name] = fn; }
    setAttribute(name, value) { this.attributes[name] = value; }
    getAttribute(name) { return this.attributes[name]; }
    hasAttribute(name) { return name in this.attributes; }
    focus() { this.focused = true; }
}

test('Les filtres gèrent les accents, le parcours et les résultats vides', () => {
    const controls = new Node();
    const search = new Node();
    const select = new Node();
    const status = new Node();
    const empty = new Node();
    const items = [
        new Node({ group: 'scolaire', search: 'Secondaire Écoles secondaires' }),
        new Node({ group: 'adulte', search: 'Civile A Cégeps et universités' }),
    ];
    const parts = {
        '.filter-controls': controls,
        '[data-filter-search]': search,
        '[data-filter-select]': select,
        '[data-filter-status]': status,
        '[data-filter-empty]': empty,
    };
    const section = { querySelector: (key) => parts[key], querySelectorAll: () => items };
    globalThis.document = { querySelectorAll: () => [section] };

    initFilters();
    assert.equal(status.textContent, '2 résultats');

    search.value = 'cegeps';
    search.listeners.input();
    assert.equal(items[0].hidden, true);
    assert.equal(items[1].hidden, false);
    assert.equal(status.textContent, '1 résultat');

    select.value = 'scolaire';
    select.listeners.change();
    assert.equal(empty.hidden, false);
    assert.equal(status.textContent, '0 résultat');

    search.value = '';
    select.value = '';
    select.listeners.change();
    assert.ok(items.every((item) => !item.hidden));
    assert.equal(empty.hidden, true);
});

test('Le menu se ferme avec Échap et rend le focus au bouton', () => {
    const toggle = new Node();
    const nav = new Node();
    const documentListeners = {};
    toggle.setAttribute('aria-expanded', 'false');
    globalThis.document = {
        querySelector: (key) => (key === '.menu-toggle' ? toggle : null),
        getElementById: () => nav,
        addEventListener: (name, fn) => { documentListeners[name] = fn; },
    };

    initMenu();
    assert.equal(toggle.hidden, false);

    toggle.listeners.click();
    assert.equal(toggle.getAttribute('aria-expanded'), 'true');
    assert.ok(nav.classes.has('is-open'));

    documentListeners.keydown({ key: 'Escape' });
    assert.equal(toggle.getAttribute('aria-expanded'), 'false');
    assert.ok(!nav.classes.has('is-open'));
    assert.equal(toggle.focused, true);
});

test('Le quiz valide la réponse, bloque les choix et permet de rejouer', () => {
    const right = new Node();
    const wrong = new Node();
    right.setAttribute('data-correct', '');
    const feedback = new Node();
    feedback.textContent = 'À votre tour!';
    const reset = new Node();
    reset.hidden = true;
    const quiz = new Node({ win: 'Bravo', lose: 'Perdu' });
    const parts = { '[data-quiz-feedback]': feedback, '[data-quiz-reset]': reset };
    quiz.querySelector = (key) => parts[key];
    quiz.querySelectorAll = () => [wrong, right];
    globalThis.document = { querySelector: () => quiz };

    initQuiz();

    wrong.listeners.click();
    assert.equal(feedback.textContent, 'Perdu');
    assert.ok(wrong.classes.has('is-incorrect'));
    assert.ok(right.classes.has('is-correct'));
    assert.ok(wrong.disabled && right.disabled);
    assert.equal(reset.hidden, false);

    reset.listeners.click();
    assert.equal(feedback.textContent, 'À votre tour!');
    assert.ok(!wrong.disabled && !right.disabled);
    assert.equal(reset.hidden, true);

    right.listeners.click();
    assert.equal(feedback.textContent, 'Bravo');
});
