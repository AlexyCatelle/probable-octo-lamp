<?php

// - Table Client :
//   - ID : identifiant unique du client (entier)
//   - Nom : nom du client (chaîne de caractères)
//   - Prénom : prénom du client (chaîne de caractères)
//   - Adresse : adresse du client (chaîne de caractères)
//   - Code postal : code postal du client (chaîne de caractères)
//   - Ville : ville du client (chaîne de caractères)
//   - Téléphone : numéro de téléphone du client (chaîne de caractères)

class Client
{

    public function __construct(
        public ?int $id,
        protected string $Nom,
        protected string $Prenom,
        protected string $Adresse,
        protected string $CodePostal,
        protected string $Ville,
        protected string $Telephone

    ) {}

    public function getNom(): string
    {
        return $this->Nom;
    }

    public function getPrenom(): string
    {
        return $this->Prenom;
    }

    public function getAdresse(): string
    {
        return $this->Adresse;
    }

    public function getCodePostal(): string
    {
        return $this->CodePostal;
    }

    public function getVille(): string
    {
        return $this->Ville;
    }

    public function getTelephone(): string
    {
        return $this->Telephone;
    }
}

class ClientRepository
{
    public function __construct(private PDO $db) {}

    // 1. Créer une méthode qui permet d'afficher tous les clients // findAll.
    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM client");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Créer une méthode qui permet d'ajouter un client // add

    public function add(Client $client): int
    {
        $stmt = $this->db->prepare(
            "INSERT INTO client (Nom, Prenom, Adresse, CodePostal, Ville, Telephone) 
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $client->getNom(),
            $client->getPrenom(),
            $client->getAdresse(),
            $client->getCodePostal(),
            $client->getVille(),
            $client->getTelephone()
        ]);
        return $this->db->lastInsertId();
    }

    // 3. Créer une méthode qui permet d'éditer un client // edit

    public function edit(Client $client): bool
    {
        $stmt = $this->db->prepare("UPDATE client SET Nom = ?, Prenom = ?, Adresse = ?, CodePostal = ?, Ville = ?, Telephone = ?
                                    WHERE id = ?");
        return $stmt->execute([
            $client->getNom(),
            $client->getPrenom(),
            $client->getAdresse(),
            $client->getCodePostal(),
            $client->getVille(),
            $client->getTelephone(),
            $client->id
        ]);
    }

    // 4. Créer une méthode qui permet de supprimer un client (et ses commandes) // delete client + delete commande (transaction)

    public function delete(int $clientId): bool
    {
        try {
            $this->db->beginTransaction();

            $this->db->prepare("DELETE FROM commande WHERE ClientId = ?")->execute([$clientId]);
            $this->db->prepare("DELETE FROM client WHERE id = ?")->execute([$clientId]);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo "Erreur de suppression : " . $e->getMessage();
            return false;
        }
    }

    // 5. Créer une méthode pour afficher le détail d'un client avec ses commandes // selectById

    public function selectById(int $clientId): array
    {
        $stmtClient = $this->db->prepare("SELECT * FROM client WHERE id = ?");
        $stmtClient->execute([$clientId]);
        $client = $stmtClient->fetch(PDO::FETCH_ASSOC);

        if (!$client) {
            return [];
        }

        $stmtCommandes = $this->db->prepare("SELECT * FROM commande WHERE ClientId = ?");
        $stmtCommandes->execute([$clientId]);
        $commandes = $stmtCommandes->fetchAll(PDO::FETCH_ASSOC);

        $client['commandes'] = $commandes;

        return $client;
    }
}
