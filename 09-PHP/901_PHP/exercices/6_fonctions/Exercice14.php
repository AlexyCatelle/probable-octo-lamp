<?php

# Exercice 14 : fonctions avec rest parameters

// Créez une fonction `calculMoyenne` qui prendra plusieurs nombre en argument et retourne la moyenne de ces nombres.
 
function calculMoyenne(int...$notes) : float|null{

    // Si aucun argument n'est passé, la fonction retournera `null`.

    if (empty($notes)) {
        return null;
    }

    $sumNotes = 0;
    $countNotes = 0;

    foreach ($notes as $note){
        $sumNotes += $note;
        $countNotes++;
        echo $sumNotes, PHP_EOL;
        echo $countNotes,PHP_EOL;

    };

    return round($sumNotes/$countNotes,2);
};

print(calculMoyenne(18,30,50));
print(calculMoyenne());

// Créer une fonction `afficherMoyenne` qui prendra la moyenne calculé en argument est affichera le résultat. 

function afficherMoyenne(float|null $moyenne) : void {

   // Si la moyenne est null, affichez un message indiquant qu'aucun nombre n'a été donné.
    if($moyenne === null){

   echo "aucun nombre donné", PHP_EOL;
    }
   
   else {
    echo "La moyenne est de $moyenne", PHP_EOL;

   }
};



afficherMoyenne(calculMoyenne(18,30,50));
afficherMoyenne(calculMoyenne());
//Bonus:  La fonction doit utiliser un argument `moyenne` passé par **référence**.
// Cela signifie que la fonction doit mettre à jour la valeur de `moyenne` directement, sans avoir à retourner une valeur.
