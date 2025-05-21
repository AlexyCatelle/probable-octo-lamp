<?php

// - Table Commandes :
//   - ID : identifiant unique de la commande (entier)
//   - Client ID : identifiant du client associé à la commande (entier)
//   - Date : date de la commande (date)
//   - Total : montant total de la commande (nombre décimal)

class Commande 
{
    public function __construct(
        public ?int $id,
        protected int $ClientId,
        protected string $Date,
        protected float $total
    )
    {}
}
