<?php

# Exercice 10 : tableaux associatifs

// Demandez à l'utilisateur les informations suivantes : nom, prénom, âge et statut étudiant (boolean).
$userLastname = readline("Entrez votre nom : ");
$userFirstname = readline("Entrez votre prénom : ");
$userAge = readline("Entrez votre âge : ");
$userStatut = readline ("Etes-vous étudiant ? ");
// Créez un tableau associatif contenant ces informations.

$dataArray = [
"nom" => $userLastname,
"prénom" => $userFirstname,
"age" => $userAge,
"statut" => $userStatut
];

//Parcourez le tableau et affichez chaque information à l'écran.

foreach($dataArray as $k){
    echo $k, PHP_EOL;
};