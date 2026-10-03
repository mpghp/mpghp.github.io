<?php
function donnees_site(): array {
    static $donnees;
    return $donnees ??= json_decode(file_get_contents(dirname(__DIR__) . '/_data/site.json'), true, 512, JSON_THROW_ON_ERROR);
}
function h(mixed $valeur): string { return htmlspecialchars((string)$valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function service_url(string $chemin): string { return rtrim(donnees_site()['services']['ancienSite'], '/') . $chemin; }
function trouver_ligue(string $slug): array {
    foreach(donnees_site()['ligues'] as $ligue) if($ligue['slug'] === $slug) return $ligue;
    throw new RuntimeException('Ligue introuvable : '.$slug);
}
function carte_ligue(array $ligue, string $racine): void { ?>
<article class="league-card" data-filter-item data-group="<?= h($ligue['type']) ?>" data-search="<?= h($ligue['nom'].' '.$ligue['public']) ?>"><p class="eyebrow"><?= h($ligue['public']) ?></p><h3><a href="<?= h($racine.'ligues/'.$ligue['slug'].'/') ?>"><?= h($ligue['nom']) ?> <span aria-hidden="true">↗</span></a></h3><p><?= h($ligue['texte']) ?></p><span class="card-bottom"><?= h($ligue['accroche']) ?></span></article>
<?php }
