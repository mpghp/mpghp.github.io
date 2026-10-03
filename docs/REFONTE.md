# Refonte du site

## Objectif

Permettre à une personne curieuse de comprendre le jeu, à une école de préparer une équipe, et à une équipe de retrouver rapidement sa ligue, ses ressources et ses services.

## Architecture de la première proposition

Accueil → Découvrir → Démarrer une équipe; Ligues → fiche de ligue → formulaire actuel; Ressources → guides et documents; Questionnaires → commande actuelle; Calendrier et résultats → page actuelle de la ligue; Le Mouvement → histoire et gouvernance; Contact; Nouvelles et archives.

Les cinq parcours de ligues sont primaire, secondaire, civile A, civile B et virtuelle. Une fiche de ligue ne doit pas mélanger sa présentation durable avec les dates d’une saison passée.

## Direction graphique

Blanc lumineux, cyan `#007fa3`, vert vif `#75d52e` et bleu profond `#103749`. Titres sans empattement, cartes arrondies et boutons en pilule. Une illustration de buzzer vert évoque le jeu. Les polices système évitent les requêtes à un fournisseur externe.

La marque typographique et le slogan proposés ne sont pas présentés comme une identité institutionnelle approuvée. Ajouter les vrais assets lorsque disponibles. La structure responsive prévoit une navigation mobile, le clavier, un lien d’évitement, la réduction des animations et une expérience lisible sans JavaScript.

## Fonctionnalités suivantes

| Priorité | Fonction | Données et travail nécessaires |
|---|---|---|
| 1 | Calendrier par ligue et saison, téléchargement iCalendar | Dates et lieux confirmés, annulations et fuseau America/Toronto |
| 1 | Résultats et classements filtrables | Format de scores, règles de classement, source officielle |
| 1 | Actualités éditables et vraies archives | Export du CMS, dates, pièces jointes, images autorisées |
| 1 | Ressources et FAQ par parcours | Relecture par les responsables et centralisation des documents |
| 2 | Catalogue de questionnaires lié à GEHGen | Export public contrôlé; voir GEHGEN.md |
| 2 | Entraînement et découverte interactive | Lot de questions explicitement diffusables, règles pédagogiques |
| 3 | Espace école et livraison privée | Service authentifié, droits, commandes et autorisations |

## Conservation des services

Les destinations de l’ancien site sont centralisées dans `src/_data/site.json`. On ne simule pas un formulaire d’inscription ou une commande réussie. GEHGen conserve son hôte séparé et ses comptes existants.

## Migration et publication

1. Valider contenus, design et services sur la prévisualisation GitHub Pages; `baseurl` utilise actuellement `https://mpghp.github.io`, sans CNAME.
2. Inventorier les anciennes URLs et documents, puis décider de leur nouvelle destination. Prévoir des redirections ou pages de transition compatibles avec l’hébergement choisi.
3. Préserver un hôte réel pour le backend actuel avant de faire pointer `mpghp.ca` vers une vitrine statique. Sans cette étape, les liens vers les formulaires de ce même domaine cesseraient de fonctionner.
4. Vérifier les sessions, HTTPS et parcours des services sur leur hôte conservé, puis mettre à jour les destinations centralisées. Un sous-domaine envisagé n’est pas une URL déjà opérationnelle.
5. Régler `baseurl` et les redirections après accord sur la bascule, exporter, puis vérifier les liens et métadonnées sur le domaine final.

Aucun changement DNS, déploiement, suppression de l’ancien site ou redirection globale n’est effectué dans la première proposition.

## Évolution graphique — palette du logo fourni

À la demande du responsable, le design adopte une direction jeune et moderne inspirée de l’image Génies en herbe / Pantologie : cyan `#007fa3`, vert `#75d52e`, blanc et bleu profond `#103749`. Les teintes sont une interprétation visuelle de la référence. Cartes arrondies, boutons en pilule, titres sans empattement, aplats lumineux et illustration de buzzer verte remplacent la première proposition éditoriale. Les textes blancs utilisent le cyan soutenu; le vert lumineux accompagne des textes foncés. Les animations discrètes respectent la préférence de mouvement réduit. Le logo joint sert de référence chromatique; sa typographie historique n’est pas reproduite pour les titres du site.

## Direction retenue après le PDF de référence

Le responsable a rejeté l’apparence trop institutionnelle de la proposition précédente. La nouvelle version s’inspire des trois pages du PDF fourni : grand titre de revue, titres à empattements, numéros de manches avec décalage cyan et vert, navigation sobre, listes de ligues et question interactive. Les formes en pilule, cartes arrondies et illustration de buzzer sont remplacées par cette composition. Le cyan et le vert de la référence de marque restent les accents. Les photos réservées dans le PDF attendent de vrais assets autorisés; aucun emplacement fictif ni image d’événement inventée n’est publié. La question de sciences est une démonstration fixe indépendante de GEHGen, pas une question du jour synchronisée. Les dates et promesses d’inscription du PDF ne remplacent pas les données vérifiées.
