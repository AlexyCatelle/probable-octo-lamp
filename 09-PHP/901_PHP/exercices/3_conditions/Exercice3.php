<?php

# Exercice 3 : Les structures conditionnelles (if..else)

//Demandez à l'utilisateur d'entrer son âge.

$age = (int)readline("Veuillez rentrer votre âge: ");

// Vérifiez si l'utilisateur est majeur ou mineur et affichez un message correspondant.

if ($age <= 18){
    echo"Vous êtes majeur";
} else {
    echo "Vous êtes mineur";
};