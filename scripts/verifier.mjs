import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import assert from 'node:assert/strict';
const depot = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const racine = path.join(depot,'dist');
assert.ok(fs.existsSync(racine), 'Exécuter npm run export avant la vérification.');
const pages = [];
function parcourir(dir) {
  for(const fichier of fs.readdirSync(dir,{withFileTypes:true})) {
    const chemin=path.join(dir,fichier.name);
    if(fichier.isDirectory())parcourir(chemin);
    else if(chemin.endsWith('.html'))pages.push(chemin);
  }
}
parcourir(racine);
const erreurs=[];
let liens=0;
for(const page of pages) {
  const html=fs.readFileSync(page,'utf8');
  if(!html.includes('lang="fr-CA"'))erreurs.push(page+' : langue manquante');
  if((html.match(/<h1\b/g)||[]).length!==1)erreurs.push(page+' : titre principal non unique');
  if(html.includes('<?php')||html.includes('Fatal error')||html.includes('Warning:'))erreurs.push(page+' : erreur PHP dans le résultat');
  for(const match of html.matchAll(/\b(?:href|src)="([^"]+)"/g)) {
    const url=match[1];
    if(/^(https?:|mailto:|tel:|data:|\/\/)/.test(url))continue;
    const [chemin,ancre]=url.split('#');
    if(chemin.includes('?'))continue;
    let destination=chemin?path.resolve(path.dirname(page),decodeURIComponent(chemin)):page;
    if(chemin.startsWith('/'))destination=path.join(racine,chemin);
    if(fs.existsSync(destination)&&fs.statSync(destination).isDirectory())destination=path.join(destination,'index.html');
    liens++;
    if(!fs.existsSync(destination)){erreurs.push(path.relative(racine,page)+' : '+url);continue;}
    if(ancre&&destination.endsWith('.html')&&!fs.readFileSync(destination,'utf8').includes('id="'+decodeURIComponent(ancre)+'"'))erreurs.push(page+' : ancre '+url);
  }
}
for(const fichier of ['_data/site.json','_layouts/header.php','_lib/functions.php','kirigami.yaml','package.json']) {
  if(fs.existsSync(path.join(racine,fichier)))erreurs.push('Fichier privé exporté : '+fichier);
}
const services=JSON.parse(fs.readFileSync(path.join(depot,'src/_data/site.json'),'utf8'));
assert.equal(services.ligues.length,5);
assert.ok(services.ligues.every(ligue=>ligue.formulaires.length>0));
console.log(`${pages.length} pages françaises et ${liens} liens ou assets internes vérifiés.`);
assert.deepEqual(erreurs,[],'Erreurs dans le site généré');
