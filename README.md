# Site du MPGHP

Proposition de refonte du site du Mouvement provincial Génies en herbe / Pantologie, construite
avec Kirigami. Le site et sa documentation sont en français.

## Prévisualiser

```powershell
npm install
npm run serve
```

Ouvrir l'adresse affichée par Kirigami (normalement `http://127.0.0.1:4321`). Pour une version
statique et ses vérifications :

```powershell
npm run export
npm run verifier
npm test
```

## Modifier le contenu

Chaque page est un `_index.md` dans `src/` : un en-tête (`@title`, `@eyebrow`, `@heading`,
`@abstract`) suivi de texte en Markdown. Les ligues (`src/ligues/*/`) et les nouvelles
(`src/nouvelles/*/`) sont des dossiers qu'on peut ajouter ou supprimer. Les réglages communs
sont dans `src/_data/site.yaml`, les textes de l'accueil dans `src/_home.yaml`. Voir
[docs/STRUCTURE.md](docs/STRUCTURE.md) et [docs/STUDIO.md](docs/STUDIO.md).

Les inscriptions, le contact et les commandes restent traités par le site actuel (`mpghp.ca`) :
cette vitrine ne collecte ni paiement ni donnée personnelle.

## Documentation

[Structure](docs/STRUCTURE.md) · [Studio](docs/STUDIO.md) · [Refonte](docs/REFONTE.md) ·
[Audit](docs/AUDIT.md) · [GEHGen](docs/GEHGEN.md) · [État](docs/STATUS.md) · [À faire](docs/TODO.md)

La publication et la migration du domaine restent à préparer (voir `docs/REFONTE.md`).
