# État du projet

## 2026-10-03 — nettoyage de la première proposition

Le code produit lors de la première proposition (blocs Markdown contenant du HTML, CSS minifié
à la main en pixels, liens relatifs en dur, données dans un seul JSON) a été refait :

- Pages en Markdown pur (`_index.md`) avec en-tête, colonnes latérales en `_aside.md`, deux
  types de page (`page`, `home`) et trois listes (`@list`).
- Ligues et nouvelles en collections Studio ; ressources, accueil et quiz en YAML ; avis de
  saison en shortcode `{% saison %}` ; réglages communs dans `src/_data/site.yaml`.
- Styles en Sass sur les jetons de `@kirigami/canva`, unités `rem`, compteurs et
  pseudo-éléments ; scripts en modules ES (`menu`, `filter`, `quiz`) testés.
- Gabarits indentés de 4 espaces, workflow renommé `page.yml`, documentation réorganisée.

Vérifié : export Kirigami (18 pages), `npm run verifier` (398 liens et fichiers internes), trois
tests de scripts, captures de l'accueil, des ligues et de Découvrir dans Chrome.

## Contenu en place

Accueil, découverte, cinq ligues (la Civile B est à confirmer), participation, démarrage
d'équipe, calendrier, ressources, questionnaires, Mouvement, nouvelle historique, contact, 404.
Le logo officiel et l'image de partage (`src/images/`) sont intégrés. GEHGen est analysé en
lecture seule ([GEHGEN.md](GEHGEN.md)) ; aucune référence à l'application privée n'est publique.
