# Refonte du site

## Objectif

Permettre à une personne curieuse de comprendre le jeu, à une école de préparer une équipe, et
à une équipe de retrouver rapidement sa ligue, ses ressources et ses services.

## Parcours

Accueil → Découvrir → Démarrer une équipe ; Ligues → fiche de ligue → formulaire actuel ;
Ressources → guides et documents ; Questionnaires → commande actuelle ; Calendrier et
résultats → page actuelle de la ligue ; Le Mouvement → histoire ; Contact ; Nouvelles et
archives.

Les cinq parcours de ligue sont primaire, secondaire, civile A, civile B et virtuelle. Une fiche
de ligue ne mélange pas sa présentation durable avec les dates d'une saison passée : l'avis
`{% saison %}` rappelle que 2025–2026 est une archive.

## Direction graphique

Inspirée d'une revue : grand titre à empattement (Georgia), numéros de manches décalés cyan et
vert, listes sobres, question de démonstration interactive. Palette du logo : cyan `#007fa3`,
vert `#75d52e`, fond crème `#f4f3ef`. Les jetons sont dans `src/styles/partials/_conf.scss`
(canva) ; polices système, aucune requête à un fournisseur externe. Navigation mobile, clavier,
lien d'évitement et lisibilité sans JavaScript sont prévus. Les photos officielles restent à
fournir : aucune image d'événement fictive n'est publiée.

## Fonctionnalités suivantes

| Priorité | Fonction | Données et travail nécessaires |
|---|---|---|
| 1 | Calendrier par ligue et saison, téléchargement iCalendar | Dates et lieux confirmés, annulations, fuseau America/Toronto |
| 1 | Résultats et classements filtrables | Format de scores, règles de classement, source officielle |
| 1 | Actualités éditables et vraies archives | Export du CMS, dates, pièces jointes, images autorisées |
| 1 | Ressources et FAQ par parcours | Relecture par les responsables, centralisation des documents |
| 2 | Catalogue de questionnaires lié à GEHGen | Export public contrôlé ; voir GEHGEN.md |
| 2 | Entraînement et découverte interactive | Lot de questions explicitement diffusables |
| 3 | Espace école et livraison privée | Service authentifié, droits, commandes |

## Conservation des services

Les liens vers l'ancien site (`https://mpghp.ca/...`) sont écrits directement dans les pages
Markdown concernées. On ne simule pas un formulaire d'inscription ou une commande réussie.
GEHGen conserve son hôte séparé et ses comptes.

## Migration et publication

1. Valider contenus, design et services sur la prévisualisation GitHub Pages (`baseurl` est
   `https://mpghp.github.io`, sans CNAME).
2. Inventorier les anciennes URL et documents, puis décider de leur destination (redirections ou
   pages de transition compatibles avec l'hébergement).
3. Préserver un hôte réel pour le backend actuel avant de pointer `mpghp.ca` vers une vitrine
   statique, sinon les liens vers les formulaires de ce domaine cesseraient de fonctionner.
4. Vérifier sessions, HTTPS et parcours sur l'hôte conservé, puis mettre à jour les liens.
5. Régler `baseurl` et les redirections après accord sur la bascule, exporter, puis vérifier
   liens et métadonnées sur le domaine final.

Le workflow `.github/workflows/page.yml` construit (KiriBuild) et publie `dist/` sur GitHub Pages à
chaque push sur `main` (Réglages du dépôt → Pages → Source : GitHub Actions). Aucun changement
DNS ni déploiement n'a été fait.
