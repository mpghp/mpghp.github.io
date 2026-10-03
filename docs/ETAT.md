# État de la refonte

## Réalisé — première proposition du 3 octobre 2026

Audit public initial, architecture, direction graphique, première vitrine Kirigami française, cinq fiches de ligue, accès aux services actuels, filtre de ligues et ressources, métadonnées, page 404 et documentation française. Configurations MCP reprises des starters du moteur Kirigami local.

GEHGen est analysé en lecture seule. Une feuille de route priorisée distingue catalogue statique, entraînement et livraison privée. Aucune référence à l’application privée des rédacteurs ne figure dans les pages publiques.

## À terminer avant publication

- Revue visuelle réelle sur ordinateur et mobile, avec navigation clavier et tests des filtres dans un navigateur.
- Validation de l’identité graphique et des textes par le MPGHP; réception du vrai logo et des photographies autorisées.
- Confirmation de la saison courante, responsables, tarifs, événements et résultats.
- Inventaire exhaustif et migration des archives et pièces jointes; plan des anciennes URLs.
- Vérification complète des services d’inscription, contact et commande par leurs responsables.
- Préservation de leur hôte avant bascule du domaine; configuration et procédure de publication.
- Définition et implantation séparée du premier export public GEHGen, si retenu.

La première proposition n’est pas un site déployé ni une migration complète des archives de Drupal. Les éléments manquants sont visibles dans ce suivi plutôt que remplacés par des données fictives.

## Vérifications réalisées

- Export Kirigami réussi : 17 pages françaises; 374 liens, ancres et fichiers internes contrôlés.
- Deux tests du JavaScript exporté réussis : filtres avec accents et résultats vides; menu avec Échap et retour du focus. Ces tests ne remplacent pas une revue dans un navigateur.
- Vérification HTTP des inscriptions actuellement référencées et des documents de gouvernance; aucune soumission de formulaire. Les anciennes URLs indisponibles ont été retirées.
- Aperçu local démarré sur `http://127.0.0.1:4347/`; accueil, CSS et JavaScript répondent HTTP 200.
- Aucun fichier GEHGen modifié; aucune publication ni bascule du domaine effectuée.

## Ajustement demandé du design

Palette cyan, vert et blanc inspirée du logo transmis, typographie sans empattement, cartes arrondies et boutons en pilule appliqués à toutes les pages. L’illustration de buzzer est recolorée en vert. La revue visuelle dans un navigateur reste à réaliser.

## Revue Playwright — 3 octobre 2026

Accueil inspecté par captures à 1440 × 1000 et 390 × 844. Aucun débordement horizontal constaté sur accueil, ligues et ressources à 390 px. Recherche sans accent (cegeps) : un résultat. Menu mobile : ouverture, fermeture avec Échap et retour du focus au bouton vérifiés. Filtre Documents : trois résultats; recherche sans correspondance : zéro résultat; effacement : trois résultats. La revue des autres pages, des formulaires externes et sur appareils physiques reste à faire.

## Nouvelle proposition inspirée du PDF

Accueil reconstruit selon la référence fournie : grand titre de revue, manches numérotées, ligues en liste et question de démonstration interactive. La palette cyan et verte est conservée. Photos officielles à fournir. Export : 17 pages et 379 références internes vérifiées; deux tests du menu et des filtres réussis. Revue Playwright : captures ordinateur et mobile, réponse correcte et incorrecte, blocage des choix après réponse, bouton Rejouer et retour du focus vérifiés. Aucun débordement horizontal sur l’accueil à 390 et 320 px après correction du grand texte final. La question est indépendante de GEHGen. Aucun déploiement.

## Logo officiel

Le fichier fourni src/images/mpghp-logo.png remplace la signature typographique dans l’en-tête et le pied de page. Ses proportions et ses couleurs sont conservées; les dimensions s’adaptent au mobile.

## Retrait des références publiques à l’outil de rédaction

Lien du pied de page, présentation sur la page Questionnaires et destination dans les données du site retirés. La page Questionnaires conserve le service de commande existant et propose les ressources publiques.

## Image de partage

Image PNG de 1200 × 630, fond blanc et logo centré avec marges, dans src/images/mpghp-og.png. Configurée via seo.image dans kirigami.yaml pour les métadonnées Open Graph et Twitter générées par Kirigami.

## Workflow GitHub Pages

Le workflow .github/workflows/pages.yml génère, vérifie et publie dist sur GitHub Pages lors des pushes sur main ou d’un lancement manuel. Dans les paramètres du dépôt GitHub, choisir GitHub Actions comme source de Pages. Aucun push ni lancement distant effectué ici; aucun changement du domaine mpghp.ca.
