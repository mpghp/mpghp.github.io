# Nouveau site MPGHP

Première proposition de refonte du site du Mouvement provincial Génies en herbe / Pantologie. Le site et sa documentation sont entièrement en français et utilisent Kirigami.

## Prévisualiser

```powershell
npm install
npm run serve
```

Ouvrir l’adresse affichée par Kirigami, normalement `http://127.0.0.1:4321`. Pour préparer une version statique :

```powershell
npm run export
npm run verifier
npm test
```

## Ce qui est inclus

Accueil, découverte, quatre ligues présentes sur le site actuel et une fiche Civile B à confirmer, participation, démarrage d’équipe, calendrier et résultats, ressources, questionnaires, Mouvement, nouvelles historiques, contact et page 404. Navigation adaptable au mobile, filtres de ligues et de ressources, liens d’inscription et de commande existants, métadonnées et plan du site.

Le design s’inspire du PDF de référence fourni : grand titre de revue, typographie à empattements, manches numérotées, accents cyan et vert, et question interactive de démonstration. Les photos officielles restent à fournir.

## Contenu et services

Modifier les ligues, les ressources et les destinations des services dans [src/_data/site.json](src/_data/site.json). Les inscriptions, le contact par formulaire et les commandes continuent d’être traités sur le site actuel. Aucun paiement, compte d’école ni formulaire de saisie personnelle n’est implanté dans cette vitrine.

La saison 2025–2026 est présentée comme historique. Les événements, tarifs et annonces de la nouvelle saison attendent confirmation; aucun calendrier fictif n’est publié.

## GEHGen

La [feuille de route GEHGen](docs/GEHGEN.md) propose catalogue, entraînements, livraison privée et outils d’équipe. L’application privée des rédacteurs n’est pas référencée dans les pages publiques; aucune API ni banque privée n’est copiée dans le site.

## Documentation

[Audit](docs/AUDIT.md) · [Refonte](docs/REFONTE.md) · [GEHGen](docs/GEHGEN.md) · [État du projet](docs/ETAT.md).

La publication et la migration du domaine restent à préparer. Consulter la procédure de bascule avant tout déploiement.
