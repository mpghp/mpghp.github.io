# Structure des sources

## Pages

Toutes les pages sont des `_index.md` : des annotations `@tag valeur` en tête, puis du Markdown.
Le HTML est généré par les gabarits ; le corps d'une page ne contient pas de HTML brut.

| Annotation | Rôle |
|---|---|
| `@title` | Titre de la page (`<title>`, liens, fil d'Ariane) |
| `@eyebrow` | Rubrique affichée au-dessus du titre |
| `@heading` | Titre affiché en grand (sinon `@title`) ; `*mot*` met un mot en évidence |
| `@abstract` | Résumé : chapeau de la page et description pour les moteurs de recherche |
| `@date` | Date ISO (`2025-10-18`), affichée en français |
| `@aside _aside.md` | Colonne latérale en Markdown (rubrique, titre, texte, lien final = bouton) |
| `@list leagues\|resources\|news` | Liste ajoutée sous le texte (voir `src/_layouts/lists/`) |
| `@type page` | Mise en page (obligatoire sauf si héritée par `@@type`) |

L'accueil (`src/_index.md`) utilise `@type home` : tout son contenu vient de `src/_home.yaml` et
de `src/_quiz.yaml`.

## Collections

- `src/ligues/*/_index.md` : une ligue par dossier. En-tête : `@eyebrow` (public), `@group`
  (`scolaire`, `adulte` ou `distance`, sert au filtre), `@tagline`, `@abstract`, `@position`
  (ordre), `@featured non` (la cacher de l'accueil). Le corps contient présentation, liens
  d'inscription et contact. `ligues/_index.md` donne `@@type page` à toutes les ligues.
- `src/nouvelles/*/_index.md` : une nouvelle par dossier, triée par `@date` décroissante.
  L'accueil affiche la plus récente.
- `src/ressources/_items.yaml` : cartes de ressources (`titre`, `categorie`, `texte`, `lien`).
  Un lien relatif part du dossier `ressources/`.

## Données et réglages

- `src/_data/site.yaml` : navigation, bouton d'action, avis de saison, pied de page.
- `src/_home.yaml`, `src/_quiz.yaml` : textes de l'accueil et question de démonstration.

La rubrique active de la navigation vient du premier segment de l'adresse (`/ligues/primaire/`
→ `ligues`), sans annotation.

## Gabarits (`src/_layouts/`, `src/_lib/`)

- `header.php`, `footer.php` : document, navigation, pied de page (`prepros.before/after`).
- `types/page.*.php`, `types/home.before.php` : les deux types de page de `kirigami.yaml`.
- `lists/*.php` : listes ajoutées par `@list`.
- `_lib/site.php` (réglages, `e()`, `inline()`, dates), `_lib/components.php` (filtre, quiz),
  `_lib/shortcodes.php` (`{% saison %}`).

## Styles et scripts

`src/styles/site.scss` réunit `partials/` : `_conf` (jetons canva), `_base`, `_layout`,
`_components`, `_home`. Les numéros de manche sont des compteurs CSS, l'étoile et les flèches
des pseudo-éléments. `src/scripts/site.js` charge `menu.js`, `filter.js` et `quiz.js`, testés
par `scripts/interactions.test.mjs`.

## Page 404

`src/_404.php` (seul fichier PHP de page) : `@base true` ajoute `<base href>` pour que les
styles et liens fonctionnent à n'importe quelle profondeur d'URL.
