# Projet MPGHP

Site du Mouvement provincial Génies en herbe / Pantologie, réalisé avec Kirigami. Le dépôt était vide au début de la refonte du 3 octobre 2026.

## Documentation à lire

- [Audit du site actuel](docs/AUDIT.md) : contenus, parcours, services et limites de la vérification.
- [Refonte et design](docs/REFONTE.md) : architecture, direction graphique et migration.
- [Intégration de GEHGen](docs/GEHGEN.md) : capacités vérifiées, propositions et contrat à construire.
- [État du projet](docs/ETAT.md) : ce qui fonctionne et ce qui reste à faire.

## Organisation

`kirigami.yaml` configure la génération. `src/_data/site.json` contient les ligues, ressources et liens vers les services existants. Les sources des pages sont les `src/**/_index.php`; les layouts communs vivent dans `src/_layouts/`. Les fonctions communes sont dans `src/_lib/functions.php`. Le JavaScript est compil? par la t?che esbuild de Kirigami. Le CSS et le JavaScript sont servis localement, sans framework ni ressource tierce dans le navigateur.

## Commandes

`npm install`, `npm run serve`, `npm run export`, `npm run verifier`, `npm test`. Node 24+ requis. L’export `dist/` est généré et ignoré par Git. Les configurations MCP lancent la CLI installée localement; ouvrir le dépôt racine dans le client AI.

## Publication

La base de prévisualisation est `https://mpghp.github.io`. `mpghp.ca` reste le site existant. Ne pas ajouter de CNAME ou basculer ce domaine avant d’avoir préservé l’accès aux services dynamiques. Les liens utilisent `$relroot`; échapper les données avec `h()`.
