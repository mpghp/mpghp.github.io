# Audit du site actuel — 3 octobre 2026

## Périmètre

Consultation publique de [mpghp.ca](https://mpghp.ca/), des principaux parcours et formulaires, puis lecture du dépôt local GEHGen. Aucun formulaire soumis, compte créé, accès à la base de données ou changement en production. Le dépôt du nouveau site ne contenait aucun fichier versionné.

L’analyse des contenus et de la structure est vérifiée. Aucun navigateur contrôlable n’était disponible pour une revue graphique par captures ou une vérification tactile. Les premières décisions visuelles sont donc des propositions de design, pas des conclusions issues d’un test utilisateur.

## Parcours existants

| Parcours | Point d’entrée actuel | Reprise proposée |
|---|---|---|
| Découvrir l’activité | [Présentation du jeu](https://mpghp.ca/content/quest-ce-que-genies-en-herbe) | Explication courte, guide, démarrage d’équipe |
| Choisir une ligue | [Ligues](https://mpghp.ca/ligues) | Fiches uniformes et filtre par public |
| Inscrire une équipe | [Inscription](https://mpghp.ca/content/inscription) | Accès aux formulaires actuels depuis chaque ligue |
| Acheter des séries | [Commande](https://mpghp.ca/content/commande-de-questionnaires) | Présentation claire puis service actuel |
| Calendrier et résultats | Pages et divisions des ligues | Accès par ligue, puis future donnée structurée par saison |
| Gouvernance | [Le Mouvement](https://mpghp.ca/content/le-mouvement) | Histoire, responsables, règlements et finances |
| Entrer en contact | [Contact](https://mpghp.ca/contact) | Courriels et adresse, lien vers le formulaire existant |
| Rédiger des questionnaires | Application GEHGen distincte | Entrée identifiée pour les comptes de rédaction |

## Constats vérifiés

- La page d’accueil présente notamment une annonce primaire du 18 octobre 2025. Elle doit être datée et distinguée des prochaines inscriptions, sans supposer que son statut est encore actuel.
- La [ligue primaire](https://mpghp.ca/content/primaire) décrit la saison 2025–2026. Son [formulaire](https://mpghp.ca/content/inscription-primaire) indique que les soumissions sont fermées.
- La [ligue secondaire](https://mpghp.ca/content/secondaire) expose notamment des divisions 2016–2017 et 2017–2018. Les archives prennent beaucoup de place dans un parcours qui cherche une saison actuelle.
- La [Civile A](https://mpghp.ca/content/ligue-civile-de-montreal) présente la saison 2026–2027 et un formulaire correspondant. Une première lecture de contenus mis en cache renvoyait une ancienne saison; la récupération HTTP directe a permis de corriger ce constat.
- Civile B est absente de la liste actuelle des inscriptions. Son ancienne page et son formulaire renvoient HTTP 404. Sa fiche de la refonte indique cette indisponibilité et dirige vers le contact, sans proposer une inscription active.
- Le service de commande collecte des informations d’école et propose des séries par niveau et saison. Il doit rester opérationnel séparément de la vitrine statique.
- Le formulaire de contact affiche des libellés et un CAPTCHA en anglais. La refonte de la vitrine peut être française sans modifier ce service dans cette première phase.
- L’image exposée comme logo sur certaines pages est celle du thème AdaptiveTheme. Elle n’est pas reprise comme identité officielle.

## Limites et contenu à confirmer

Les liens ont été confrontés au HTML récupéré directement le 3 octobre 2026. Le formulaire secondaire actuel est `/content/inscription-ecole-secondaire`; celui de la Civile A est `/content/formulaire-dinscription-licam-2026-2027`. Les anciennes adresses de retour au secondaire, Civile A 2025–2026 et Civile B renvoient HTTP 404 et ne sont pas proposées. Aucun parcours de soumission n’a été testé. Vérifier les formulaires avec les responsables avant publication.

Obtenir : identité visuelle réelle, photos autorisées, coordonnées des responsables actuels, modalités 2026–2027, calendrier courant, données de résultats, archive complète et état des commandes. L’audit initial ne constitue pas un inventaire exhaustif des pièces jointes ni des contenus privés du CMS.
