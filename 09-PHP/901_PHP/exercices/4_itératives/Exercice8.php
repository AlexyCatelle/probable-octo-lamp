<?php

# Exercice 8 : while

#Calculez la somme des nombres pairs compris entre 0 et 100 en utilisant une boucle while .
$sum = 0;
$i=0;

while ($i <= 100){
if ($i%2 === 0){
    $sum= $sum + $i;
    echo "$i est pair. Le nouveau total est $sum .", PHP_EOL;
}
$i++;
};


