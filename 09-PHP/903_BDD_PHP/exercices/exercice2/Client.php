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
    
    
    // 3. Créer une méthode qui permet d'éditer un client // edit
}
