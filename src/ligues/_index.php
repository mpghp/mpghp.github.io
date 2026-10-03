<?php
/**
 * @title Les ligues
 * @section ligues
 * @abstract Primaire, secondaire, ligues civiles et jeu à distance.
 */
?>
<section class="page-heading wrap"><p class="eyebrow">Les ligues</p><h1>Trouvez votre<br>terrain de jeu.</h1><p class="lead">À l’école ou après le secondaire, en présence ou à distance : explorez les possibilités de participation.</p></section><section class="section wrap" data-filter><div class="filter-controls" hidden><label>Votre parcours<select data-filter-select><option value="">Toutes les ligues</option><option value="scolaire">À l’école</option><option value="adulte">Après le secondaire</option><option value="distance">À distance</option></select></label><label>Rechercher une ligue<input type="search" data-filter-search placeholder="Nom ou public…"></label></div><p class="filter-status" role="status" data-filter-status></p><div class="league-grid"><?php foreach(donnees_site()['ligues'] as $ligue) carte_ligue($ligue,$relroot); ?></div><p data-filter-empty hidden>Aucune ligue ne correspond. <a href="<?= h($relroot) ?>contact/">Contactez-nous.</a></p></section>
