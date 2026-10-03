const normaliser = valeur => valeur.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLocaleLowerCase('fr');
const menu = document.querySelector('.menu-toggle');
const nav = document.querySelector('#navigation');
if (menu && nav) {
  menu.hidden = false;
  const fermer = () => { menu.setAttribute('aria-expanded', 'false'); nav.classList.remove('is-open'); };
  menu.addEventListener('click', () => {
    const ouvert = menu.getAttribute('aria-expanded') !== 'true';
    menu.setAttribute('aria-expanded', String(ouvert));
    nav.classList.toggle('is-open', ouvert);
  });
  nav.addEventListener('click', evenement => { if (evenement.target.closest('a')) fermer(); });
  document.addEventListener('keydown', evenement => {
    if (evenement.key === 'Escape' && menu.getAttribute('aria-expanded') === 'true') { fermer(); menu.focus(); }
  });
}
for (const section of document.querySelectorAll('[data-filter]')) {
  const controles = section.querySelector('.filter-controls');
  const recherche = section.querySelector('[data-filter-search]');
  const selection = section.querySelector('[data-filter-select]');
  const elements = [...section.querySelectorAll('[data-filter-item]')];
  const miseAJour = () => {
    let nombre = 0;
    const termes = normaliser(recherche.value.trim()).split(/\s+/).filter(Boolean);
    for (const element of elements) {
      const visible = (!selection.value || element.dataset.group === selection.value)
        && termes.every(terme => normaliser(element.dataset.search).includes(terme));
      element.hidden = !visible;
      if (visible) nombre++;
    }
    section.querySelector('[data-filter-status]').textContent = nombre + (nombre > 1 ? ' résultats' : ' résultat');
    section.querySelector('[data-filter-empty]').hidden = nombre !== 0;
  };
  controles.hidden = false;
  recherche.addEventListener('input', miseAJour);
  selection.addEventListener('change', miseAJour);
  miseAJour();
}

// Question de démonstration publique.
const quiz = document.querySelector('#demo-quiz');
if (quiz) {
  const reponses = [...quiz.querySelectorAll('[data-answer]')];
  const retour = quiz.querySelector('.quiz-feedback');
  const rejouer = quiz.querySelector('.quiz-reset');
  for (const bouton of reponses) bouton.addEventListener('click', () => {
    const correct = bouton.dataset.answer === 'Au';
    for (const choix of reponses) {
      choix.disabled = true;
      choix.classList.toggle('is-correct', choix.dataset.answer === 'Au');
      choix.classList.toggle('is-incorrect', choix === bouton && !correct);
    }
    retour.textContent = correct ? 'Bien joué! Au vient du latin aurum. À vous le prochain point.' : 'La bonne réponse est Au, du latin aurum. Une découverte de plus!';
    rejouer.hidden = false;
    rejouer.focus();
  });
  rejouer.addEventListener('click', () => {
    for (const choix of reponses) { choix.disabled = false; choix.classList.remove('is-correct', 'is-incorrect'); }
    retour.textContent = 'À votre tour!';
    rejouer.hidden = true;
    reponses[0].focus();
  });
}
