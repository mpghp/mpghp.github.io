<?php
/**
 * Accès aux réglages communs (src/_data/site.yaml) et petits utilitaires de gabarit.
 */

/** Réglages du site, lus une seule fois. */
function site(): object
{
    static $site;
    return $site ??= YAML::parseFile(dirname(__DIR__) . '/_data/site.yaml');
}

/** Échappe une valeur pour l'afficher dans du HTML. */
function e(mixed $value): string
{
    return str_htmlesc((string) $value);
}

/** Markdown en ligne : `*mot*` devient <em>, sans paragraphe englobant. */
function inline(string $text): string
{
    return trim(preg_replace('#^<p>(.*)</p>$#s', '$1', trim(MD::toHtml($text))));
}

/** Date ISO (2025-10-18) en français : « 18 octobre 2025 ». */
function date_fr(string $iso): string
{
    $months = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    [$year, $month, $day] = array_map('intval', explode('-', $iso)) + [0, 1, 1];
    return ($day === 1 ? '1er' : $day) . ' ' . $months[$month - 1] . ' ' . $year;
}

/** Adresse d'une page enfant, relative à la page qui la liste. */
function child_url(object $child): string
{
    return basename(dirname($child->file)) . '/';
}

/** Les pages sous $folder (dossier relatif à la racine du site), pour les listes de l'accueil. */
function pages_in(string $folder): array
{
    return FS::getChildren(PREPROS::$config->root . '/' . $folder . '/_index.md');
}

register_tag('year', fn() => date('Y'));
