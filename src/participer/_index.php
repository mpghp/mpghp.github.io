<?php
/**
 * @title Participer
 * @section ligues
 * @abstract Choisir une ligue et accéder aux inscriptions actuelles.
 */
?>
<section class="page-heading wrap"><p class="eyebrow">Participer</p><h1>La prochaine équipe,<br>c’est la vôtre.</h1><p class="lead">Choisissez votre parcours. Les inscriptions restent traitées par les responsables habituels.</p></section><section class="section wrap"><div class="notice"><strong>Choisissez la bonne saison</strong><p>Les informations de 2025–2026 restent des archives. La présence d’un formulaire ne signifie pas que les inscriptions sont ouvertes. Consultez les responsables pour les modalités actuelles.</p></div><div class="league-grid"><?php foreach(donnees_site()['ligues'] as $ligue) carte_ligue($ligue,$relroot); ?></div></section>
