<?php
/**
 * @title Ressources
 * @section ressources
 * @abstract Guides, documents et questionnaires pour accompagner votre équipe.
 */
?>
<section class="page-heading wrap"><p class="eyebrow">Ressources</p><h1>Le savoir,<br>bien accompagné.</h1><p class="lead">Les points de départ pour jouer, organiser et préparer une équipe.</p></section><section class="section wrap" data-filter><div class="filter-controls" hidden><label>Type de ressource<select data-filter-select><option value="">Toutes les ressources</option><option value="guide">Guides</option><option value="document">Documents</option><option value="questionnaire">Questionnaires</option></select></label><label>Rechercher<input type="search" data-filter-search placeholder="Un guide, un document…"></label></div><p role="status" class="filter-status" data-filter-status></p><div class="resource-grid"><?php foreach(donnees_site()['ressources'] as $ressource): $url = str_starts_with($ressource['url'],'https://') ? $ressource['url'] : $relroot.$ressource['url']; ?><a class="resource-card" data-filter-item data-group="<?= h($ressource['type']) ?>" data-search="<?= h($ressource['titre'].' '.$ressource['texte']) ?>" href="<?= h($url) ?>"><p class="eyebrow"><?= h($ressource['type']) ?></p><h2><?= h($ressource['titre']) ?></h2><p><?= h($ressource['texte']) ?></p><span aria-hidden="true">↗</span></a><?php endforeach; ?></div><p data-filter-empty hidden>Aucune ressource ne correspond.</p></section>
