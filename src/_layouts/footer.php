<?php
/**
 * prepros.after : pied de page et fermeture du document.
 */
$pied = site()->pied;
?>
    </main>
    <footer class="site-footer">
        <div class="wrap site-footer__grid">
            <div>
                <a class="brand" href="<?php echo $relroot; ?>" aria-label="MPGHP — Accueil">
                    <img src="<?php echo $relroot; ?>images/mpghp-logo.png" alt="Génies en herbe / Pantologie" width="193" height="103" loading="lazy">
                </a>
                <p><?php echo e($pied->slogan); ?></p>
                <p class="site-footer__small"><?php echo e($pied->mention); ?></p>
            </div>
            <?php foreach ($pied->colonnes as $column): ?>
                <nav aria-label="<?php echo e($column->titre); ?>">
                    <h2><?php echo e($column->titre); ?></h2>
                    <?php foreach ($column->liens as $link): ?>
                        <a href="<?php echo $relroot . e($link->path); ?>"><?php echo e($link->label); ?></a>
                    <?php endforeach; ?>
                </nav>
            <?php endforeach; ?>
        </div>
        <div class="wrap site-footer__bottom">
            <span>© <year></year> MPGHP</span>
            <span><?php echo e($pied->devise); ?></span>
            <a href="https://github.com/php-kirigami/kirigami">Réalisé avec Kirigami</a>
        </div>
    </footer>
</body>
</html>
