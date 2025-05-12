<?php
# Exercice 9 : do while et switch

// Demandez à l'utilisateur d'entrer une note entre 0 et 20.
$grade = (int)readline("Choissisez une note entre 0 et 20 : ");
// Si l'utilisateur rentre une note négative ou supérieur à 20, affichez une message d'erreur et redemandez une saisie à l'utilisateur. 

while ($grade < 0 || $grade > 20 )
{
echo "Erreur : note invalide.", PHP_EOL;
$grade = (int)readline("Choissisez une note entre 0 et 20 : ");
}

// Affichez une appréciation en fonction de la note : "Insuffisant" (0-9), "Passable" (10-11), "Assez bien" (12-13), "Bien" (14-15), "Très bien" (16-17), "Excellent" (18-20).

switch ($grade){
    case ($grade <= 9):
        echo "Insuffisant", PHP_EOL;
        break;
    case ($grade === 10 || $grade === 11):
        echo "Passable", PHP_EOL;
        break;
    case ($grade === 12 || $grade === 13):
        echo "Assez bien", PHP_EOL;
        break;
    case ($grade === 14 || $grade === 15):
        echo "Bien", PHP_EOL;
        break;
    case ($grade === 16 || $grade === 17):
        echo "Très bien", PHP_EOL;
        break;
    case ($grade > 17):
        echo "Excellent", PHP_EOL;
        break;
    };