<?php

require_once 'config.php';

$db->exec("CREATE TABLE IF NOT EXISTS client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Prenom VARCHAR(100) NOT NULL,
    Adresse VARCHAR(255) NOT NULL,
    CodePostal VARCHAR(10) NOT NULL,
    Ville VARCHAR(100) NOT NULL,
    Telephone VARCHAR(20) NOT NULL
)
");
