/**
 * Filtre des listes (ligues, ressources) : catégorie + recherche sans accents.
 * Balisage attendu : [data-filter] contenant .filter-controls, [data-filter-item]
 * (avec data-group et data-search), [data-filter-status] et [data-filter-empty].
 */

const normalize = (text) => text.normalize('NFD').replace(/[̀-ͯ]/g, '').toLocaleLowerCase('fr');

export function initFilters() {
    for (const section of document.querySelectorAll('[data-filter]')) {
        const controls = section.querySelector('.filter-controls');
        const search = section.querySelector('[data-filter-search]');
        const select = section.querySelector('[data-filter-select]');
        const status = section.querySelector('[data-filter-status]');
        const empty = section.querySelector('[data-filter-empty]');
        const items = [...section.querySelectorAll('[data-filter-item]')];

        const update = () => {
            const terms = normalize(search.value.trim()).split(/\s+/).filter(Boolean);
            let count = 0;

            for (const item of items) {
                const visible = (!select.value || item.dataset.group === select.value)
                    && terms.every((term) => normalize(item.dataset.search).includes(term));
                item.hidden = !visible;
                if (visible) count++;
            }

            status.textContent = `${count} ${count > 1 ? 'résultats' : 'résultat'}`;
            empty.hidden = count !== 0;
        };

        controls.hidden = false;
        search.addEventListener('input', update);
        select.addEventListener('change', update);
        update();
    }
}
