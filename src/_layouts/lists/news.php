<?php
/**
 * Liste de nouvelles (annotation @list news) : après le texte de la page, les nouvelles (pages enfants), de la plus récente
 * à la plus ancienne. Annotations de chaque nouvelle : @date, @eyebrow, @abstract.
 */

$news = FS::getChildren();
usort($news, fn($a, $b) => strcmp($b->date ?? '', $a->date ?? ''));
?>
<section class="wrap section news-list">
    <?php foreach ($news as $item): ?>
        <article>
            <p class="eyebrow">
                <?php if (!empty($item->date)): ?>
                    <time datetime="<?php echo e($item->date); ?>"><?php echo e(date_fr($item->date)); ?></time>
                <?php endif; ?>
                <?php echo !empty($item->eyebrow) ? '· ' . e($item->eyebrow) : ''; ?>
            </p>
            <h2><a href="<?php echo e(child_url($item)); ?>"><?php echo e($item->title); ?></a></h2>
            <p><?php echo e($item->abstract ?? ''); ?></p>
        </article>
    <?php endforeach; ?>
</section>
