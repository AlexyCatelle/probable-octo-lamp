<?php

# Étudiant


include 'env.php';
$db = null;

try {
  $db = new PDO("mysql:host=localhost;", "root", $DB_PASSWORD);
  echo "La connexion est établie !", PHP_EOL;
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  exit;
}

// Une fois la connection réalisé , nous créons notre BDD 'php'.  
$db?->exec("CREATE DATABASE IF NOT EXISTS php CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
echo "Notre base de donnée est créé !", PHP_EOL;

// Maintenant nous tentons de nous connecter à la BDD que nous venons de créer directement.
try {
  $db = new PDO("mysql:host=localhost;dbname=php", "root", $DB_PASSWORD);
  echo "La connexion est établie avec notre BDD!", PHP_EOL;
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage(), PHP_EOL;
  exit; // Ne continue pas si la connexion échoue.
}

## Objectif

// L'objectif de cet exercice est d'apprendre à se connecter à une base de données et à récupérer des données en utilisant PDO.

## Sujet

// Vous devez créer une application de gestion des étudiants qui permet de visualiser et de modifier leurs informations.
//La base de données contient une table nommée "etudiant" avec les colonnes suivantes :
// - ID : identifiant unique de l'étudiant (entier)
// - Nom : nom de l'étudiant (chaîne de caractères)
// - Prénom : prénom de l'étudiant (chaîne de caractères)
// - Date de naissance : date de naissance de l'étudiant (date)
// - Adresse email : adresse e-mail de l'étudiant (chaîne de caractères)

/* 
    Création d'une table en BDD. 
*/

$request = "CREATE TABLE IF NOT EXISTS etudiants (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Nom VARCHAR(50) NOT NULL, 
    Prenom VARCHAR(50) NOT NULL, 
    Date_de_naissance DATE NOT NULL,
    Adresse_mail VARCHAR(50) NOT NULL
)";

$db->exec($request);

class Etudiant
{
  public function __construct(
    public ?int $id,
    protected string $Nom,
    protected string $Prenom,
    protected string $Date_de_naissance,
    protected string $Adresse_mail

  ) {}

  public function getNom(): string
  {
    return $this->Nom;
  }

  public function getPrenom(): string
  {
    return $this->Prenom;
  }

  public function getDateNaissance(): string
  {
    return $this->Date_de_naissance;
  }

  public function getAdresseMail(): string
  {
    return $this->Adresse_mail;
  }
}

class EtudiantRepository
{
  public function __construct(private PDO $db) {}
  // 1. Créer une function qui permet d'afficher tous les étudiants

  public function readAllEtudiants(): array
  {
    $stmt = $this->db->query("SELECT * FROM etudiants");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  // 2. Créer une function qui permet d'ajouter un étudiant

  public function addOneEtudiant(Etudiant $etudiant): void
  {
    $stmt = $this->db->prepare(
      "INSERT INTO etudiants (Nom, Prenom, Date_de_naissance, Adresse_mail)
             VALUES (:nom, :prenom, :date, :email)"
    );
    $stmt->execute([
      'nom'    => $etudiant->getNom(),
      'prenom' => $etudiant->getPrenom(),
      'date'   => $etudiant->getDateNaissance(),
      'email'  => $etudiant->getAdresseMail()
    ]);
    echo "Étudiant ajouté.\n";
  }

  // 3. Créer une function qui permet d'éditer un étudiant

  public function updateEtudiant(Etudiant $etudiant): bool
  {
    if ($etudiant->id === null) {
      return false;
    }

    $stmt = $this->db->prepare("UPDATE etudiants SET Nom = ?, Prenom = ?, Date_de_naissance = ?, Adresse_mail = ? WHERE id = ?");
    return $stmt->execute([
      $etudiant->getNom(),
      $etudiant->getPrenom(),
      $etudiant->getDateNaissance(),
      $etudiant->getAdresseMail(),
      $etudiant->id
    ]);
  }

  // 4. Créer une function qui permet de supprimer un étudiant

  public function deleteEtudiant(int $id): bool
  {
    $stmt = $this->db->prepare("DELETE FROM etudiants WHERE id = ?");
    return $stmt->execute([$id]);
  }
}

// TESTS START

$repo = new EtudiantRepository($db);
$etudiants = $repo->readAllEtudiants();
echo "Liste des étudiants :\n";
print_r($etudiants);

echo "\n--- TEST AJOUT ---\n";

$etudiant = new Etudiant(null, "Dupont", "Jean", "2000-05-20", "jean.dupont@email.com");
$repo->addOneEtudiant($etudiant);

$etudiants = $repo->readAllEtudiants();
echo "Liste des étudiants :\n";
print_r($etudiants);

// On récupère le dernier ID inséré pour la suite
$dernierEtudiant = end($etudiants);
$lastId = $dernierEtudiant['id'];


echo "\n--- TEST MISE À JOUR ---\n";

$etudiantModifie = new Etudiant($lastId, "Durand", "Jean", "2000-05-20", "jean.durand@email.com");

if ($repo->updateEtudiant($etudiantModifie)) {
  echo "Étudiant ID $lastId mis à jour avec succès.\n";
} else {
  echo "Échec de la mise à jour.\n";
}

$etudiants = $repo->readAllEtudiants();
echo "Liste des étudiants :\n";
print_r($etudiants);

echo "\n--- TEST SUPPRESSION ---\n";

if ($repo->deleteEtudiant($lastId)) {
  echo "Étudiant ID $lastId supprimé avec succès.\n";
} else {
  echo "Échec de la suppression.\n";
}

$etudiants = $repo->readAllEtudiants();
echo "Liste des étudiants :\n";
print_r($etudiants);

// TESTS END

// ## Bonus

// Pour aller plus loin, vous pouvez implémenter les fonctionnalités suivantes :

// - Ajouter une validation des champs pour éviter les données invalides
// - Ajouter une méthode de recherche pour permettre à l'utilisateur de chercher un étudiant en fonction de son nom ou de son prénom
// - Créer une IHM pour tester le programme

// ```
//        _             _ _             _
//    ___| |_ _   _  __| (_) __ _ _ __ | |_ ___
//   / _ \ __| | | |/ _` | |/ _` | '_ \| __/ __|
//  |  __/ |_| |_| | (_| | | (_| | | | | |_\__ \
//   \___|\__|\__,_|\__,_|_|\__,_|_| |_|\__|___/

// 1. Voir tous les étudiants
// 2. Ajouter un étudiant
// 3. Modifier un étudiant
// 4. Supprimer un étudiant
// 0. Quitter
// ```
