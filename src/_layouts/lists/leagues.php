<?php
/**
 * Liste de ligues (annotation @list leagues) : après le texte de la page, filtre et cartes des ligues
 * (les pages enfants). Annotations de chaque ligue : @eyebrow, @group, @tagline, @abstract.
 */

$groups = ['' => 'Toutes les ligues', 'scolaire' => 'À l’école', 'adulte' => 'Après le secondaire', 'distance' => 'À distance'];
?>
<section class="wrap section" data-filter>
    <?php filter_controls('Votre parcours', $groups, 'Rechercher une ligue', 'Nom ou public…'); ?>
    <div class="card-grid">
        <?php foreach (FS::getChildren() as $league): ?>
            <article class="card" data-filter-item data-group="<?php echo e($league->group ?? ''); ?>"
                data-search="<?php echo e($league->title . ' ' . ($league->eyebrow ?? '')); ?>">
                <p class="eyebrow"><?php echo e($league->eyebrow ?? ''); ?></p>
                <h2><a href="<?php echo e(child_url($league)); ?>"><?php echo e($league->title); ?> <span aria-hidden="true">↗</span></a></h2>
                <p><?php echo e($league->abstract ?? ''); ?></p>
                <span class="card__foot"><?php echo e($league->tagline ?? ''); ?></span>
            </article>
        <?php endforeach; ?>
    </div>
    <p data-filter-empty hidden>Aucune ligue ne correspond. <a href="../contact/">Contactez-nous.</a></p>
</section>
