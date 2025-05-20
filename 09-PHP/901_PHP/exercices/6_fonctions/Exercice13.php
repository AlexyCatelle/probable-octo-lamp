<?php

# Exercice 13 : fonctions 

// Créer une fonction prixTTC qui prendra deux arguments : un prix et un taux en pourcentage de TVA.

function prixTTC (int $prixHT, int $TVA): int{

// Calculer le prix TTC dans cette fonction et retourner le résultat. 
$prixTTC = $prixHT + ( $prixHT * $TVA / 100);

return print("\n$prixTTC");
}
;

//Afficher le résultat TTC en appelant la fonction avec des valeurs d'exemple.

prixTTC(100,5);
prixTTC(118,8);
prixTTC(911,97);