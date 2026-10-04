// Vérifie l'export (dist/) : langue, un seul h1, aucune erreur PHP, liens et ancres internes,
// et absence de fichiers privés. À lancer après `npm run export`.

import assert from 'node:assert/strict';
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..', 'dist');
assert.ok(fs.existsSync(root), 'Exécuter npm run export avant la vérification.');

const pages = fs.readdirSync(root, { recursive: true })
    .filter((file) => file.endsWith('.html'))
    .map((file) => path.join(root, file));

const errors = [];
let links = 0;

for (const page of pages) {
    const name = path.relative(root, page);
    const html = fs.readFileSync(page, 'utf8');

    if (!html.includes('lang="fr-CA"')) errors.push(`${name} : langue manquante`);
    if ((html.match(/<h1\b/g) || []).length !== 1) errors.push(`${name} : titre principal non unique`);
    if (/<\?php|Fatal error|Warning:/.test(html)) errors.push(`${name} : erreur PHP dans le résultat`);
    if (/\sstyle="/.test(html)) errors.push(`${name} : attribut style en ligne`);

    for (const [, url] of html.matchAll(/\b(?:href|src)="([^"]+)"/g)) {
        if (/^(https?:|mailto:|tel:|data:|\/\/)/.test(url)) continue;

        const [target, anchor] = url.split('#');
        if (target.includes('?')) continue;

        let destination = target ? path.resolve(path.dirname(page), decodeURIComponent(target)) : page;
        if (fs.existsSync(destination) && fs.statSync(destination).isDirectory()) {
            destination = path.join(destination, 'index.html');
        }

        links++;
        if (!fs.existsSync(destination)) {
            errors.push(`${name} : ${url}`);
        } else if (anchor && destination.endsWith('.html')
            && !fs.readFileSync(destination, 'utf8').includes(`id="${decodeURIComponent(anchor)}"`)) {
            errors.push(`${name} : ancre ${url}`);
        }
    }
}

for (const file of ['_data', '_layouts', '_lib', '_index.md', '_home.yaml', 'kirigami.yaml', 'package.json']) {
    if (fs.existsSync(path.join(root, file))) errors.push(`Fichier privé exporté : ${file}`);
}

console.log(`${pages.length} pages et ${links} liens ou fichiers internes vérifiés.`);
assert.deepEqual(errors, [], 'Erreurs dans le site généré');
