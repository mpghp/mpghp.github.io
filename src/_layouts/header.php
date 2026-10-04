<?php
/**
 * prepros.before : ouverture du document, bandeau d'en-tête et navigation.
 * Le <head> (titre, SEO, feuille de style, script) est complété par Kirigami.
 */

// Rubrique active : premier segment de l'adresse de la page (ligues, ressources…).
$section = explode('/', trim($absurl, '/'))[0];
?>
<!doctype html>
<html lang="fr-CA">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#007fa3">
    <?php if (!empty($base)): ?>
        <base href="<?php echo e($baseurl); ?>/">
    <?php endif; ?>
</head>
<body>
    <a class="skip-link" href="#contenu">Aller au contenu</a>
    <header class="site-header">
        <div class="wrap site-header__inner">
            <a class="brand" href="<?php echo $relroot; ?>" aria-label="MPGHP — Accueil">
                <img src="<?php echo $relroot; ?>images/mpghp-logo.png" alt="Génies en herbe / Pantologie" width="193" height="103">
            </a>
            <button class="menu-toggle" type="button" hidden aria-expanded="false" aria-controls="navigation">Menu ☰</button>
            <nav id="navigation" aria-label="Navigation principale">
                <ul>
                    <?php foreach (site()->navigation as $link): ?>
                        <li>
                            <a href="<?php echo $relroot . e($link->path); ?>"<?php echo $section === trim($link->path, '/') ? ' aria-current="page"' : ''; ?>><?php echo e($link->label); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <a class="button button--small" href="<?php echo $relroot . e(site()->action->path); ?>"><?php echo e(site()->action->label); ?></a>
        </div>
    </header>
    <main id="contenu">
