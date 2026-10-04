# Kiri Studio

Le bloc `studio:` de `kirigami.yaml` rend le dépôt éditable par les responsables du site.
Studio modifie les fichiers référencés par les annotations des pages et les collections.

## Ce que le propriétaire voit

- **Pages** : chaque `_index.md` s'ouvre avec un formulaire d'en-tête (titre, rubrique, titre
  affiché, résumé) et le texte en Markdown. Le type de page et les balises techniques
  (`@type`, `@@type`) sont masqués.
- **Colonnes latérales** : les `_aside.md` apparaissent sous la page qui les référence.
- **Collections** (`create: true`) : « Ligues » et « Nouvelles » permettent d'ajouter ou de
  supprimer une fiche. Une nouvelle commence avec la date du jour ; une ligue avec un groupe.
- **Données** : « Réglages du site » (`src/_data/site.yaml`), textes de l'accueil et
  ressources, modifiables comme du YAML.
- **Médias** : `pageMedia: [images, files]` garde les images et documents d'une page à côté
  d'elle.

## Règles pour garder le site éditable

- Du texte en Markdown, jamais de HTML dans le corps d'une page.
- Une donnée par endroit : un avis ou un libellé répété devient un réglage ou un shortcode.
- Une nouvelle page de collection hérite de `@@type page` de son dossier parent ; ne pas lui
  ajouter de balise technique.
- Les liens internes sont relatifs (`../ligues/`).

Référence complète : `node_modules/@kirigami/kirigami/README.md`, section `studio:`.
