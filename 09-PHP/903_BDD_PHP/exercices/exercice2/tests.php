<?php

require_once 'config.php';
require_once 'Client.php';
require_once 'Commande.php';

$clientRepo = new ClientRepository($db);
$commandeRepo = new CommandeRepository($db);

// Afficher les clients
print_r($clientRepo->findAll());

// Créer un client
$client = new Client(null, "Martin", "Paul", "123 rue A", "75000", "Paris", "0612345678");
$clientId = $clientRepo->add($client);

// Ajouter une commande
$commande = new Commande(null, $clientId, date("Y-m-d"), 150.00);
$commandeRepo->addCommande($commande);

// Voir les détails du client
$details = $clientRepo->selectById($clientId);
print_r($details);

// Voir toutes les commandes
print_r($commandeRepo->findAll());

// Afficher les clients
print_r($clientRepo->findAll());

// Modifier le client
$client = new Client($clientId, "Pierre", "Saumon", "456 rue B", "59000", "Lille", "0698765432");
$clientRepo->edit($client);

// Afficher les clients
print_r($clientRepo->findAll());

// Supprimer un client par l'ID
$clientRepo->delete($clientId);

// Afficher les clients
print_r($clientRepo->findAll());