import assert from 'node:assert/strict';
import fs from 'node:fs';
import vm from 'node:vm';
import { test } from 'node:test';

class Element {
  constructor(donnees = {}) { this.dataset = donnees; this.value = ''; this.hidden = false; this.textContent = ''; this.evenements = {}; this.attributs = {}; }
  addEventListener(nom, fonction) { this.evenements[nom] = fonction; }
  setAttribute(nom, valeur) { this.attributs[nom] = valeur; }
  getAttribute(nom) { return this.attributs[nom]; }
  focus() { this.focusRecu = true; }
}
const code = fs.readFileSync(new URL('../dist/scripts/site.min.js', import.meta.url),'utf8');

test('Les filtres gèrent les accents, le parcours et les résultats vides', () => {
  const controles = new Element(), recherche = new Element(), selection = new Element(), statut = new Element(), vide = new Element();
  const items = [new Element({group:'scolaire',search:'Secondaire Écoles secondaires'}),new Element({group:'adulte',search:'Civile A Cégeps et universités'})];
  const carte = {'.filter-controls':controles,'[data-filter-search]':recherche,'[data-filter-select]':selection,'[data-filter-status]':statut,'[data-filter-empty]':vide};
  const section = {querySelector: cle => carte[cle],querySelectorAll: () => items};
  vm.runInNewContext(code,{document:{querySelector:()=>null,querySelectorAll:()=>[section]}});
  assert.equal(statut.textContent,'2 résultats');
  recherche.value='cegeps';recherche.evenements.input();assert.equal(items[0].hidden,true);assert.equal(items[1].hidden,false);assert.equal(statut.textContent,'1 résultat');
  selection.value='scolaire';selection.evenements.change();assert.equal(vide.hidden,false);assert.equal(statut.textContent,'0 résultat');
  recherche.value='';selection.value='';selection.evenements.change();assert.ok(items.every(item=>!item.hidden));assert.equal(vide.hidden,true);
});
test('Le menu se ferme avec Échap et rend le focus au bouton', () => {
  const bouton = new Element(), nav = new Element(), evenements = {};let ouvert = false;
  bouton.setAttribute('aria-expanded','false');nav.classList={toggle:(_nom,valeur)=>ouvert=valeur,remove:()=>ouvert=false};
  vm.runInNewContext(code,{document:{querySelector:cle=>cle==='.menu-toggle'?bouton:cle==='#navigation'?nav:null,querySelectorAll:()=>[],addEventListener:(nom,fonction)=>evenements[nom]=fonction}});
  bouton.evenements.click();assert.equal(ouvert,true);assert.equal(bouton.getAttribute('aria-expanded'),'true');
  evenements.keydown({key:'Escape'});assert.equal(ouvert,false);assert.equal(bouton.getAttribute('aria-expanded'),'false');assert.equal(bouton.focusRecu,true);
});
