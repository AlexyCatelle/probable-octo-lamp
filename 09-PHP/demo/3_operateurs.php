<?php

// Opérateurs arithmétiques :

echo 1 + 1, PHP_EOL;
echo 1 - 1, PHP_EOL;
echo 1 * 1, PHP_EOL;
echo 1 / 1, PHP_EOL;
echo 1 ** 1, PHP_EOL; // puissance
echo 4 % 2, PHP_EOL; // modulo

// Opérateurs d'affectation :

$monEntier = 1;
$monEntier +=1;
$monEntier -=1;
$monEntier *=1;
$monEntier /=1;

echo "Mon entier vaut : ", $monEntier, PHP_EOL;

$maChaine ="Hello";
$maChaine .= " world !";
echo "maChaine vaut : ", $maChaine, PHP_EOL;

// Les opérateurs logiques :

var_export(1 == "1"); // true
echo PHP_EOL;

var_export(1 === "1"); // false
echo PHP_EOL;

var_export(1 > 2); // false
echo PHP_EOL;

var_export(1 >= 2); // false
echo PHP_EOL;

var_export(1 != "1"); // false
echo PHP_EOL;

var_export(1 !== "1"); // true
echo PHP_EOL;

// Les opérateurs d'incrémentation/décrémentation
$compteur = 0;

// Incrémente la valeur de 1 après la lecture de l'instruction
echo "Incrémentation compteur++ : ", $compteur++, PHP_EOL; 
echo $compteur, PHP_EOL;
// Incrémente la valeur de 1 avant la lecture de l'instruction
echo "Incrémentation ++compteur : ", ++$compteur, PHP_EOL; 
echo $compteur,PHP_EOL;

// Décrémente la valeur de 1 après la lecture de l'instruction
echo "Décrémentation compteur++ : ", $compteur--, PHP_EOL; 
echo $compteur, PHP_EOL;
// Décrémente la valeur de 1 avant la lecture de l'instruction
echo "Décrémentation ++compteur : ", --$compteur, PHP_EOL; 
echo $compteur,PHP_EOL;

// OU

$resultat = true || false ; // true
var_export($resultat);
echo PHP_EOL;

$resultat = false && true; // false
var_export($resultat);
echo PHP_EOL;

$resultat = false XOR true; // false mais c'est censé etre true
var_export($resultat);
echo PHP_EOL;