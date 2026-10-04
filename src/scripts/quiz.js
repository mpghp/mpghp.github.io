/**
 * Question de démonstration. Balisage généré par quiz() dans _lib/components.php :
 * la bonne réponse porte [data-correct], les messages sont dans data-win / data-lose.
 */
export function initQuiz() {
    const quiz = document.querySelector('[data-quiz]');
    if (!quiz) return;

    const choices = [...quiz.querySelectorAll('.quiz__options button')];
    const feedback = quiz.querySelector('[data-quiz-feedback]');
    const reset = quiz.querySelector('[data-quiz-reset]');
    const startMessage = feedback.textContent;

    for (const choice of choices) {
        choice.addEventListener('click', () => {
            const won = choice.hasAttribute('data-correct');

            for (const other of choices) {
                other.disabled = true;
                other.classList.toggle('is-correct', other.hasAttribute('data-correct'));
                other.classList.toggle('is-incorrect', other === choice && !won);
            }

            feedback.textContent = won ? quiz.dataset.win : quiz.dataset.lose;
            reset.hidden = false;
            reset.focus();
        });
    }

    reset.addEventListener('click', () => {
        for (const choice of choices) {
            choice.disabled = false;
            choice.classList.remove('is-correct', 'is-incorrect');
        }

        feedback.textContent = startMessage;
        reset.hidden = true;
        choices[0].focus();
    });
}
