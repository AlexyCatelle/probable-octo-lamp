<?php

# Exercice 15 : fonctions anonymes

// Créer une fonction `doublerValeur` qui prend en paramètre un tableau d'entiers.

function doublerValeur (int...$entiers) : void {

    $doubleArray = [];

  //À l'intérieur de cette fonction, créez une fonction anonyme qui prendra un entier en paramètre et le multipliera par 2.
    $doublage = function($a){
        return $a*2;
    };
  
    // Utilisez cette fonction anonyme pour doubler chaque valeur contenue dans le tableau passé en argument.

    foreach ($entiers as $entier){
        $resultat =$doublage($entier);

      $doubleArray[] = $resultat ;  
    };

    echo"Tableau doublé : ", PHP_EOL;
    foreach ($doubleArray as $double){
    echo $double, PHP_EOL;};
};



// La fonction `doublerValeur` devra retourner un nouveau tableau contenant les valeurs doublées.

//Affichez les valeurs du tableau retourné. 

$dataArray = [118,911,8,9,11,29];

doublerValeur(...$dataArray);