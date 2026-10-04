/** Menu mobile : le bouton n'existe qu'avec JavaScript ; Échap ferme et rend le focus au bouton. */
export function initMenu() {
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.getElementById('navigation');
    if (!toggle || !nav) return;

    const setOpen = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        nav.classList.toggle('is-open', open);
    };

    toggle.hidden = false;
    toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));
    nav.addEventListener('click', (event) => event.target.closest('a') && setOpen(false));
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            setOpen(false);
            toggle.focus();
        }
    });
}
