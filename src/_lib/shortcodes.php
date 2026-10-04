<?php
/**
 * Shortcodes Markdown du site.
 *
 *   {% saison %}  avis « choisissez la bonne saison » (texte dans _data/site.yaml)
 */

md_register_plugin('saison', function (): string {
    $saison = site()->saison;
    return '<div class="notice"><strong>' . e($saison->titre) . '</strong><p>' . e($saison->texte) . '</p></div>';
});
