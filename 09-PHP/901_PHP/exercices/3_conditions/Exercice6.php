<?php

// Exercice 6 : Les ternaires

// Déclaration d'un nombre
$nombre = rand(1,100);

// Vérification avec opérateur ternaire
$message = " Le nombre $nombre est ";
$message .= ($nombre % 2 === 0) ? "pair." : "impair.";

// Affichage du résultat
echo $message;
