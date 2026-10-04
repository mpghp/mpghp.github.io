<?php
/**
 * Composants réutilisables par les gabarits (filtres, quiz).
 */

/** Champs de filtre : choix d'une catégorie et recherche libre. */
function filter_controls(string $selectLabel, array $options, string $searchLabel, string $placeholder): void
{
    ?>
    <div class="filter-controls" hidden>
        <label>
            <?php echo e($selectLabel); ?>
            <select data-filter-select>
                <?php foreach ($options as $value => $label): ?>
                    <option value="<?php echo e($value); ?>"><?php echo e($label); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            <?php echo e($searchLabel); ?>
            <input type="search" data-filter-search placeholder="<?php echo e($placeholder); ?>">
        </label>
    </div>
    <p class="filter-status" role="status" data-filter-status></p>
    <?php
}

/** Question de démonstration. Réponses et messages viennent de _quiz.yaml. */
function quiz(object $quiz): void
{
    ?>
    <div class="quiz" data-quiz data-win="<?php echo e($quiz->bravo); ?>" data-lose="<?php echo e($quiz->perdu); ?>">
        <div class="quiz__head">
            <p class="eyebrow"><?php echo e($quiz->etiquette); ?></p>
            <span><?php echo e($quiz->categorie); ?></span>
        </div>
        <h2 id="quiz-question"><?php echo e($quiz->question); ?></h2>
        <p class="quiz__hint"><?php echo e($quiz->consigne); ?></p>
        <div class="quiz__options" role="group" aria-labelledby="quiz-question">
            <?php foreach ($quiz->choix as $i => $choice): ?>
                <button type="button"<?php echo $choice === $quiz->reponse ? ' data-correct' : ''; ?>>
                    <span><?php echo chr(65 + $i); ?></span> <?php echo e($choice); ?>
                </button>
            <?php endforeach; ?>
        </div>
        <p class="quiz__feedback" role="status" aria-live="polite" data-quiz-feedback><?php echo e($quiz->depart); ?></p>
        <button class="quiz__reset" type="button" data-quiz-reset hidden>Rejouer ↺</button>
        <noscript><p><?php echo e($quiz->perdu); ?></p></noscript>
    </div>
    <?php
}
