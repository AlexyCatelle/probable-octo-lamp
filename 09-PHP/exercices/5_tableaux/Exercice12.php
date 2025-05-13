<?php

# Exercice 12 : tableaux et boucle while



 

 $notesArray = [];

do{
    //Demandez à l'utilisateur de saisir une note ou de taper "fin".
    $userInput = readline("Veuillez entrer une note ou 'fin' : "); 

    // Chaque note sera sauvegardé dans un tableau.
    if(is_numeric($userInput))
    {
        echo "la note est $userInput",PHP_EOL;
        $notesArray[] = $userInput;

    }

    // Quand l'utilisateur tapera "fin", affichez l'ensemble des notes du tableau.
    elseif ($userInput === 'fin'){
        
        echo "l'ensemble des notes est : ";
        foreach($notesArray as $note){
            echo "\n$note";
            };
    break;
    }

    else{
    echo "Erreur de saisie", PHP_EOL;
    };

}while(true); 

