<?php
/**
 * Type « home » : toute la page d'accueil, composée à partir de _home.yaml et _quiz.yaml.
 * Les ligues et la dernière nouvelle viennent des pages sous ligues/ et nouvelles/.
 */

$leagues = array_filter(pages_in('ligues'), fn($league) => ($league->featured ?? '') !== 'non');
$news = pages_in('nouvelles');
usort($news, fn($a, $b) => strcmp($b->date ?? '', $a->date ?? ''));
$latest = $news[0] ?? null;
?>
<section class="masthead wrap">
    <p class="eyebrow"><?php echo e($home->surtitre); ?></p>
    <h1><?php echo e($home->titre); ?></h1>
    <div class="masthead__line">
        <p><em><?php echo e($home->devise); ?></em></p>
        <p><?php echo e($home->mention); ?></p>
    </div>
</section>

<section class="hero wrap">
    <div>
        <p class="eyebrow"><?php echo e($home->accroche->surtitre); ?></p>
        <h2><?php echo inline($home->accroche->titre); ?></h2>
        <p class="lead"><?php echo e($home->accroche->texte); ?></p>
        <p class="actions">
            <a class="button" href="<?php echo $relroot . e($home->accroche->principal->lien); ?>"><?php echo e($home->accroche->principal->label); ?></a>
            <a class="button button--outline" href="<?php echo $relroot . e($home->accroche->secondaire->lien); ?>"><?php echo e($home->accroche->secondaire->label); ?></a>
        </p>
    </div>
    <?php quiz($quiz); ?>
</section>

<section class="rounds wrap" aria-labelledby="rounds-title">
    <header>
        <p class="eyebrow"><?php echo e($home->manches->surtitre); ?></p>
        <h2 id="rounds-title"><?php echo e($home->manches->titre); ?></h2>
    </header>
    <ol>
        <?php foreach ($home->manches->liste as $round): ?>
            <li class="round">
                <div>
                    <p class="eyebrow"><?php echo e($round->surtitre); ?></p>
                    <h3><?php echo e($round->titre); ?></h3>
                    <p><?php echo e($round->texte); ?></p>
                </div>
                <a href="<?php echo $relroot . e($round->lien); ?>"><?php echo e($round->label); ?></a>
            </li>
        <?php endforeach; ?>
    </ol>
</section>

<section class="bottom wrap">
    <div>
        <p class="eyebrow"><?php echo e($home->ligues->surtitre); ?></p>
        <h2><?php echo e($home->ligues->titre); ?></h2>
        <ul class="league-rows">
            <?php foreach ($leagues as $league): ?>
                <li>
                    <a href="<?php echo $relroot . 'ligues/' . e(child_url($league)); ?>">
                        <strong><?php echo e($league->title); ?></strong>
                        <span><?php echo e($league->eyebrow ?? ''); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a class="text-link" href="<?php echo $relroot; ?>ligues/"><?php echo e($home->ligues->lien); ?></a>
    </div>
    <div class="news-teaser">
        <p class="eyebrow"><?php echo e($home->nouvelles->surtitre); ?></p>
        <h2><?php echo e($home->nouvelles->titre); ?></h2>
        <?php if ($latest): ?>
            <article>
                <p class="eyebrow">
                    <time datetime="<?php echo e($latest->date); ?>"><?php echo e(date_fr($latest->date)); ?></time>
                    <?php echo !empty($latest->eyebrow) ? '· ' . e($latest->eyebrow) : ''; ?>
                </p>
                <h3><a href="<?php echo $relroot . 'nouvelles/' . e(child_url($latest)); ?>"><?php echo e($latest->title); ?></a></h3>
                <p><?php echo e($latest->abstract ?? ''); ?></p>
            </article>
        <?php endif; ?>
        <?php foreach ($home->nouvelles->liens as $link): ?>
            <a class="text-link" href="<?php echo $relroot . e($link->lien); ?>"><?php echo e($link->label); ?></a>
        <?php endforeach; ?>
    </div>
</section>

<section class="closing">
    <div class="wrap">
        <p class="eyebrow"><?php echo e($home->conclusion->surtitre); ?></p>
        <p class="closing__statement"><?php echo inline($home->conclusion->texte); ?></p>
        <a class="button" href="<?php echo $relroot . e($home->conclusion->lien); ?>"><?php echo e($home->conclusion->label); ?></a>
    </div>
</section>
