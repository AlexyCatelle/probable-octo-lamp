<?php

# Exercice 5 : Opérateurs logiques et conditions

// Créez deux variables entières `$age1` et `$age2` pour représenter les âges de deux personnes.
$age1 = 33;
$age2 = 17;

// Déterminez si ces deux personnes peuvent accéder à un événement en fonction des conditions suivantes :

// Si elles ont toutes les deux 18 ans ou plus, elles peuvent accéder à l'événement.
if ($age1 >= 18 && $age2 >= 18) {
    echo "Accès accordé.";
}
// Si l'une des deux personnes a moins de 18 ans mais est accompagnée d'une personne de 25 ans ou plus, elles peuvent accéder à l'événement.
else if (
    $age1 >= 25 || $age2 >= 25
) {
    echo "Accès accordé avec accompagnement.";
}
// Sinon, elles ne peuvent pas accéder à l'événement.
else {
    echo "Accès refusé.";
};