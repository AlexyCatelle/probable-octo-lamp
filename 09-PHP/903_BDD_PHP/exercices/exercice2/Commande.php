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
        protected float $Total
    ) {}

    public function getClientId(): int
    {
        return $this->ClientId;
    }

    public function getDate(): string
    {
        return $this->Date;
    }

    public function getTotal(): float
    {
        return $this->Total;
    }
}

class CommandeRepository
{
    public function __construct(private PDO $db) {}

    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM commande");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 6. Créer une méthode qui permet d'ajouter une commande à un client // add commande
    public function addCommande(Commande $commande): bool
    {
        $stmt = $this->db->prepare("INSERT INTO commande (ClientId, Date, Total) VALUES (?, ?, ?)");
        return $stmt->execute([
            $commande->getClientId(),
            $commande->getDate(),
            $commande->getTotal()
        ]);
    }
}
