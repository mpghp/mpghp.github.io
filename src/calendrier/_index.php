<?php
/**
 * @title Calendrier et résultats
 * @section calendrier
 * @abstract Accéder aux informations publiées par les ligues.
 */
?>
<section class="page-heading wrap"><p class="eyebrow">Calendrier et résultats</p><h1>Le rendez-vous<br>de votre ligue.</h1><p class="lead">Retrouvez les pages actuelles de votre ligue pour les rencontres, les activités et les résultats.</p></section><section class="section wrap"><div class="notice"><strong>Choisissez la bonne saison</strong><p>Les informations de 2025–2026 restent des archives. La présence d’un formulaire ne signifie pas que les inscriptions sont ouvertes. Consultez les responsables pour les modalités actuelles.</p></div><ul class="directory-list"><?php foreach(donnees_site()['ligues'] as $ligue): ?><li><div><h2><?= h($ligue['nom']) ?></h2><p><?= h($ligue['public']) ?></p></div><a class="text-link" href="<?= h(service_url($ligue['anciennePage'])) ?>">Page de la ligue ↗</a></li><?php endforeach; ?></ul></section>
