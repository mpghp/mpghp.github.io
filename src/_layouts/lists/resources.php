<?php
/**
 * Liste de ressources (annotation @list resources) : après le texte de la page, filtre et cartes de ressources.
 * Les ressources viennent du fichier YAML de @items (titre, categorie, texte, lien).
 */

$kinds = ['' => 'Toutes les ressources', 'guide' => 'Guides', 'document' => 'Documents', 'questionnaire' => 'Questionnaires'];
?>
<section class="wrap section" data-filter>
    <?php filter_controls('Type de ressource', $kinds, 'Rechercher', 'Un guide, un document…'); ?>
    <div class="card-grid">
        <?php foreach ($items as $item): ?>
            <a class="card" href="<?php echo e($item->lien); ?>" data-filter-item data-group="<?php echo e($item->categorie); ?>"
                data-search="<?php echo e($item->titre . ' ' . $item->texte); ?>">
                <p class="eyebrow"><?php echo e($kinds[$item->categorie] ?? $item->categorie); ?></p>
                <h2><?php echo e($item->titre); ?></h2>
                <p><?php echo e($item->texte); ?></p>
                <span class="card__foot" aria-hidden="true">↗</span>
            </a>
        <?php endforeach; ?>
    </div>
    <p data-filter-empty hidden>Aucune ressource ne correspond.</p>
</section>
