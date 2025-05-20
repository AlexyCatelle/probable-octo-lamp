<?php

// Commentaire sur une ligne.
# Commentaire sur une ligne (bash).

/*
    Commentaire
    sur 
    plusieurs lignes.
*/

// Affiche dans le terminale.
echo "hello ";

// passe à la ligne.
echo ("world\n");

// /n et \t ne sont pas pris en charge avec ''.
echo'\tTout le monde\n';

// Declaration de variables.
$chaine = "\nma Variable qui est une chaine de charactère";
$nombreEntier = 10;
$nombreDecimal = 10.5;
$booleen = true;

// variable globale qui permet de passer à la ligne.
echo $chaine . PHP_EOL;

echo $nombreEntier . PHP_EOL;

// On déclare une constante avec le mot-clé 'const'.
const MA_CONSTANTE = "Ceci est une constante";
// MA_CONSTANTE = "je change ma constante";

// On déclare une constante avec le mot-clé 'define', obsolète.
define("IS_ACTIVE", true);

// var_dump permet d'afficher le type et la valeur d'une variable.
var_dump(IS_ACTIVE);

// echo concatene les chaine passée en parametre.
$hello ="Hello ";
$world= "world!!";
echo PHP_EOL, $hello, $world, PHP_EOL;
echo "Ceci est un helloworld : $hello$world", PHP_EOL;

// Concatenation se fait avec le '.'
$concatenat = $hello . $world;
echo $concatenat . PHP_EOL;

// Récupére uniquement le type d'une variable.
echo "Type de mon booléen : ", gettype($booleen), PHP_EOL;

// La fonction print() qui permet d'afficher le contenue d'une variable. 
print($concatenat);
echo PHP_EOL;

// Récupére la saisie de l'utilisateur;
//Elle prend en paramètre une chaine de charactère qui l'affiche à l'utilisateur.
$prenom = readline("Veuillez entrer votre prénom : ");
echo $prenom, PHP_EOL;

//Pour changer le type de notre saisi, nous devons le cast directement (typeSouhaité)readline();
$age =(int)readline("Veuillez entrer votre age :");
echo "Votre age est $age ans.", PHP_EOL;

$pseudo = "totoDu59";
$motDePasse = "topSecret";

// Concatenation avec le '.';
echo $pseudo . " : " . $motDePasse, PHP_EOL;

// Interpolation
echo "pseudo : $pseudo, mot de passe : $motDePasse", PHP_EOL;

// On peut détruire une variable directement avec la méthode 'unset()'.

unset($motDePasse);