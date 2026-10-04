<?php
/**
 * Type « page » : ferme le texte, ajoute la colonne latérale (@aside) puis la liste (@list) si elles existent.
 */
?>
    </div>
    <?php if (!empty($aside)): ?>
        <aside class="callout"><?php echo $aside; ?></aside>
    <?php endif; ?>
</div>
<?php if (!empty($list)) { include dirname(__DIR__) . '/lists/' . basename($list) . '.php'; } ?>
