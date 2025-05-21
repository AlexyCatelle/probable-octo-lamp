<?php

require_once 'config.php';
require_once 'Client.php';
require_once 'Commande.php';

$clientRepo = new ClientRepository($db);
$commandeRepo = new CommandeRepository($db);

// Liste de clients fictifs
$clients = [
    new Client(null, "Dupont", "Alice", "10 rue de Paris", "75001", "Paris", "0601010101"),
    new Client(null, "Martin", "Bruno", "20 avenue Victor Hugo", "69000", "Lyon", "0602020202"),
    new Client(null, "Durand", "Carla", "5 boulevard Haussmann", "31000", "Toulouse", "0603030303"),
    new Client(null, "Moreau", "David", "12 rue Nationale", "13000", "Marseille", "0604040404"),
];

// Insérer les clients et créer des commandes associées
foreach ($clients as $client) {
    $clientId = $clientRepo->add($client);

    // Générer 1 à 3 commandes par client
    $nombreCommandes = rand(1, 3);
    for ($i = 0; $i < $nombreCommandes; $i++) {
        $montant = rand(50, 500) + (rand(0, 99) / 100);
        $date = date('Y-m-d', strtotime("-" . rand(0, 365) . " days"));

        $commande = new Commande(null, $clientId, $date, $montant);
        $commandeRepo->addCommande($commande);
    }
}

echo "Faux clients et commandes insérés avec succès.\n";
