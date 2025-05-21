<?php

require_once 'config.php';

try {
    // Création de la table client
    $db->exec("CREATE TABLE IF NOT EXISTS client (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Nom VARCHAR(100) NOT NULL,
        Prenom VARCHAR(100) NOT NULL,
        Adresse VARCHAR(255) NOT NULL,
        CodePostal VARCHAR(10) NOT NULL,
        Ville VARCHAR(100) NOT NULL,
        Telephone VARCHAR(20) NOT NULL
    )");

    // Création de la table commande
    $db->exec("CREATE TABLE IF NOT EXISTS commande (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ClientId INT NOT NULL,
        Date DATE NOT NULL,
        Total DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (ClientId) REFERENCES client(id) ON DELETE CASCADE
    )");

    echo "Les tables ont été créées avec succès.", PHP_EOL;

} catch (PDOException $e) {
    echo "Erreur lors de la création des tables : " . $e->getMessage(), PHP_EOL;
    exit;
}
