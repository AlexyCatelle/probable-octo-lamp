<?php


# Calcul de moyenne

class OutOfGradeException extends Exception {}

// Ecrivez une fonction `calculMoyenne()` qui prend un tableau de notes en argument et qui renvoie la moyenne des notes.

function calculMoyenne(array $notes)
{

    // - Si le tableau est vide, la fonction doit lever une exception de type `InvalidArgumentException` avec le message:
    // "Le tableau de notes ne peut pas être vide".
    if (empty($notes)) {
        throw new InvalidArgumentException("Le tableau de notes ne peut pas être vide");
    }

    //- Si au moins une note est inférieure à 0 ou supérieure à 20, la fonction doit lever une exception personnalisé `OutOfGradeException` avec le message :
    //"Les notes doivent être entre 0 et 20.".

    foreach ($notes as $note) {
        if ($note < 0 || $note > 20) {
            throw new OutOfGradeException("Les notes doivent être entre 0 et 20.");
        }
    }


    $somme = array_sum($notes);
    $moyenne = $somme / count($notes);
    return $moyenne;
}

try {
    $notesValides = [12, 15.5, 18];
    echo "Moyenne : " . calculMoyenne($notesValides) . PHP_EOL;

    $notesInvalides = [14, -3, 17];
    echo "Moyenne : " . calculMoyenne($notesInvalides) . PHP_EOL;
} catch (InvalidArgumentException | OutOfGradeException $e) {
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}
