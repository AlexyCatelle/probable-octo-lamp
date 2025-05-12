<?php

# Exercice 4 : elseif

// Demandez à l'utilisateur d'entrer un nombre.

$nombre = (int)readline("Entrez un nombre : ");

// Vérifiez si le nombre est positif, négatif ou nul et affichez un message correspondant.

if ($nombre > 0){
    echo "$nombre est positif.";
}
else if ($nombre < 0){
    echo "$nombre est négatif.";
}
else {
    echo "$nombre est nul.";
}
;
