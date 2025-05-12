<?php

# Exercice 7 : for

//Demandez à l'utilisateur d'entrer un nombre.

$number = (int)readline("Entrez un nombre : ");
// Utilisez la boucle `for` pour parcourir tous les nombres de 1 à `N`.

for ($i = 0; $i<= $number; $i++){
    // Si le nombre est un multiple de 3 ou de 5, affichez-le. 
if($i%3 === 0 || $i%5 === 0 ){
    echo " $i est un multiple de 3 ou 5.", PHP_EOL;
}
;
};
