# CLAUDE.md

Site du Mouvement provincial Génies en herbe / Pantologie (MPGHP), construit avec
[Kirigami](https://github.com/php-kirigami/kirigami) : des gabarits PHP et des pages
Markdown compilés en HTML statique par PHP-WASM dans Node. Les sources vivent dans `src/`
(`kirigami.root`), la configuration unique est `kirigami.yaml`.

Le détail évolutif est dans `docs/`, un fichier par sujet :

| Fichier | Contenu |
|---|---|
| [docs/STRUCTURE.md](docs/STRUCTURE.md) | Organisation des sources, types de page, annotations, données |
| [docs/STUDIO.md](docs/STUDIO.md) | Ce que les propriétaires du site modifient dans Kiri Studio |
| [docs/REFONTE.md](docs/REFONTE.md) | Objectifs, parcours, direction graphique, migration et publication |
| [docs/AUDIT.md](docs/AUDIT.md) | Audit du site actuel (mpghp.ca) |
| [docs/GEHGEN.md](docs/GEHGEN.md) | Intégration possible de GEHGen (application séparée) |
| [docs/STATUS.md](docs/STATUS.md) | Ce qui est livré et vérifié |
| [docs/TODO.md](docs/TODO.md) | Ce qui reste à faire avant publication |

## Conventions non négociables

- **Langue** : le site et sa documentation sont en français (exception demandée par le
  responsable du projet). Les identifiants imposés par Kirigami restent en anglais.
  Parler au responsable en français.
- **Contenu en Markdown, sans HTML brut** : un auteur écrit un `_index.md`, pas du HTML.
  Une mise en page répétée devient un type de page, un shortcode ou un composant dans
  `src/_lib/`, jamais du balisage copié d'une page à l'autre.
- **Pas de `style=""`**, tailles en `rem`/`em` (jamais `px` pour les polices et les
  espacements), pseudo-éléments (`::before`/`::after`) plutôt que du balisage décoratif.
- **Liens relatifs** : `$relroot` dans les gabarits, `../page/` dans le Markdown. Le domaine
  n'apparaît que dans `baseurl`.
- **Indentation de 4 espaces** (voir `.editorconfig`), tabulations interdites.
- **Rester léger** : aucune dépendance sans nécessité.
- Ne jamais modifier à la main les HTML générés (`src/**/index.html`, `dist/`).
- Aucune donnée privée de GEHGen dans ce dépôt public. Aucun déploiement, changement de
  domaine (`mpghp.ca`) ni CNAME sans instruction explicite.
- Ne pas publier de tarifs, dates ou inscriptions ouvertes sans confirmation de la saison.

## Commandes

`npm install`, `npm run serve` (aperçu), `npm run export` (génère `dist/`),
`npm run verifier` (liens, h1, erreurs PHP : après l'export), `npm test` (scripts du navigateur).
Node 24+. Les configurations MCP lancent la CLI installée localement.

Pour les API exactes, lire les README installés : `node_modules/@kirigami/php-prepros/README.md`
(pages, annotations, types, tags), `node_modules/@kirigami/kirigami/README.md` (`kirigami.yaml`,
Studio), `node_modules/@kirigami/canva/README.md` (jetons de design, prose).

## Avant de travailler

1. Lire `docs/STATUS.md` et `docs/TODO.md`.
2. En fin de tâche : consigner le livré dans `STATUS.md`, retirer de `TODO.md` ce qui est fait.
