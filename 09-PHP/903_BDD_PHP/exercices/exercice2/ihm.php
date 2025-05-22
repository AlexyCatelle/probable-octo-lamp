<?php

require_once 'config.php';
require_once 'Client.php';
require_once 'Commande.php';

$clientRepo = new ClientRepository($db);
$commandeRepo = new CommandeRepository($db);

function menu()
{
    echo "
   ____                                          _           
  / ___|___  _ __ ___  _ __ ___   __ _ _ __   __| | ___  ___ 
 | |   / _ \\| '_ ` _ \\| '_ ` _ \\ / _` | '_ \\ / _` |/ _ \\/ __|
 | |__| (_) | | | | | | | | | | | (_| | | | | (_| |  __/\\__ \\
  \\____\\___/|_| |_| |_|_| |_| |_|\\__,_|_| |_|\\__,_|\\___||___/

1. Afficher les clients
2. Créer un client
3. Modifier un client
4. Supprimer un client
5. Afficher les détails d'un client
6. Ajouter une commande
7. Modifier une commande
8. Supprimer une commande
0. Quitter

> ";
}

function prompt($msg)
{
    echo $msg . ": ";
    return trim(fgets(STDIN));
}

do {
    menu();
    $choice = prompt("Choix");

    switch ($choice) {
        case 1: // Afficher tous les clients
            $clients = $clientRepo->findAll();
            foreach ($clients as $c) {
                echo "{$c['id']} - {$c['Nom']} {$c['Prenom']}\n";
            }
            break;

        case 2: // Créer un client
            $client = new Client(
                null,
                prompt("Nom"),
                prompt("Prénom"),
                prompt("Adresse"),
                prompt("Code Postal"),
                prompt("Ville"),
                prompt("Téléphone")
            );
            $id = $clientRepo->add($client);
            echo "Client ajouté avec l'ID $id\n";
            break;

        case 3: // Modifier un client
            $id = (int) prompt("ID du client à modifier");
            $client = new Client(
                $id,
                prompt("Nom"),
                prompt("Prénom"),
                prompt("Adresse"),
                prompt("Code Postal"),
                prompt("Ville"),
                prompt("Téléphone")
            );
            $clientRepo->edit($client);
            echo "Client modifié.\n";
            break;

        case 4: // Supprimer un client (et ses commandes)
            $id = (int) prompt("ID du client à supprimer");
            $clientRepo->delete($id);
            echo "Client (et commandes) supprimés.\n";
            break;

        case 5: // Détails d’un client
            $id = (int) prompt("ID du client");
            $client = $clientRepo->selectById($id);
            if (!$client) {
                echo "Client introuvable.\n";
                break;
            }
            echo "Nom: {$client['Nom']} {$client['Prenom']}\n";
            echo "Adresse: {$client['Adresse']}, {$client['CodePostal']} {$client['Ville']}\n";
            echo "Téléphone: {$client['Telephone']}\n";
            echo "Commandes:\n";
            foreach ($client['commandes'] as $cmd) {
                echo "- {$cmd['id']} | {$cmd['Date']} | {$cmd['Total']} €\n";
            }
            break;

        case 6: // Ajouter une commande
            $clientId = (int) prompt("ID du client");
            $date = prompt("Date (YYYY-MM-DD)");
            $total = (float) prompt("Montant total");
            $commande = new Commande(null, $clientId, $date, $total);
            $commandeRepo->addCommande($commande);
            echo "Commande ajoutée.\n";
            break;

        case 7: // Modifier une commande
            $id = (int) prompt("ID de la commande");
            $clientId = (int) prompt("ID du client");
            $date = prompt("Nouvelle date (YYYY-MM-DD)");
            $total = (float) prompt("Nouveau montant");
            $commandeRepo->editCommande(new Commande($id, $clientId, $date, $total));
            echo "Commande modifiée.\n";
            break;

        case 8: // Supprimer une commande
            $id = (int) prompt("ID de la commande à supprimer");
            $commandeRepo->deleteCommande($id);
            echo "Commande supprimée.\n";
            break;

        case 0:
            echo "Au revoir !\n";
            exit;

        default:
            echo "Choix invalide.\n";
    }

    echo "\n";
} while (true);
