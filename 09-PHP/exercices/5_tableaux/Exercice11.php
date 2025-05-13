<?php

# Exercice 11 : tableaux et parcours de chaine

//Créez un tableau contenant quelques prénoms.

$nameList = [
"Buck",
"Eddie",
"Hen",
"Karen",
"Chimney",
"Maddie",
"Bobby",
"Athena",
"Ravi",
"Chris",
"Harry",
"May",
"Mara",
"Denny"
];

// Parcourez le tableau avec une boucle foreach et affichez chaque prénom à l'écran.

foreach ($nameList as $name){
echo $name, PHP_EOL;
};

//Ajoutez un test pour vérifier si le prénom contient la lettre "a" et affichez un message supplémentaire si c'est le cas.
foreach ($nameList as $name){

    if (stripos($name, 'a') !== false) {
        echo "→ $name contient la lettre 'a'." . PHP_EOL;
    };

    };
