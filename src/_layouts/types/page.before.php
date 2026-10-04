<?php
/**
 * Type « page » : en-tête de page (retour, rubrique, titre, résumé), puis le texte.
 * Annotations : @eyebrow, @heading (titre affiché, sinon @title), @abstract, @date,
 * @aside (colonne latérale en Markdown), @list (liste ajoutée sous le texte : leagues, resources, news).
 */

$heading = $heading ?? $title;
$aside = $aside ?? '';

// Lien de retour vers la page parente, sauf pour les pages de premier niveau.
$parent = dirname(dirname(PREPROS::$file));
$parentPage = realpath($parent) !== realpath(PREPROS::$config->root) ? FS::indexFile($parent) : null;
$parentInfo = $parentPage ? FS::phpFileInfo($parentPage) : null;
?>
<header class="page-head wrap">
    <?php if ($parentInfo): ?>
        <nav class="breadcrumb" aria-label="Fil d’Ariane">
            <a href="../">← <?php echo e($parentInfo->title); ?></a>
        </nav>
    <?php endif; ?>
    <p class="eyebrow">
        <?php if (!empty($date)): ?>
            <time datetime="<?php echo e($date); ?>"><?php echo e(date_fr($date)); ?></time>
            <?php echo !empty($eyebrow) ? '· ' : ''; ?>
        <?php endif; ?>
        <?php echo e($eyebrow ?? ''); ?>
    </p>
    <h1><?php echo inline($heading); ?></h1>
    <?php if (!empty($abstract)): ?>
        <p class="lead"><?php echo e($abstract); ?></p>
    <?php endif; ?>
</header>
<div class="wrap section<?php echo $aside ? ' section--split' : ''; ?>">
    <div class="prose">
