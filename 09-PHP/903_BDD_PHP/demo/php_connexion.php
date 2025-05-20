<?php

include 'env.php';
$db = null;

try {
    $db = new PDO("mysql:host=localhost;", "root", "$DB_PASSWORD");
    echo "La connexion est établie !", PHP_EOL;
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Une fois la connection réalisé , nous créons notre BDD 'php'.  
$db?->exec("CREATE DATABASE IF NOT EXISTS php CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
echo "Notre base de donnée est créé !", PHP_EOL;

// Maintenant nous tentons de nous connecter à la BDD que nous venons de créer directement.
try {
    $db = new PDO("mysql:host=localhost;dbname=php", "root", "$DB_PASSWORD");
    echo "La connexion est établie avec notre BDD!", PHP_EOL;
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage(), PHP_EOL;
    exit; // Ne continue pas si la connexion échoue.
}
