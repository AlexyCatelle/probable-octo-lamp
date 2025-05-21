<?php

require_once 'config.php';
require_once 'Client.php';

$client = new ClientRepository($db);

// Afficher les clients
print_r($client->findAll());