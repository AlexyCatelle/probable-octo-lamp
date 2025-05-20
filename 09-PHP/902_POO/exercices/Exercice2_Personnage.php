<?php

// ===================================
// POO: Création d'une classe Personnage
// ===================================

// **Exercice :** Créer une classe `Personnage` avec :

// - trois propriétés `name`, `health` et `attack`.
// - les getters et setters nécessaires. 
// - un destructeur qui affichera la fuite du personnage.
// - une méthode `attack()` qui prendra un `Personnage` en paramètre.
//     - Cette méthode devra :
//         - diminuer les points de vie de l'adversaire par le montant de l'attribut `attack`.
//         - afficher le nom de l'attaquant et de l'adversaire.
//         - indiquer le montant de vie restant de l'adversaire.
// - une méthode `isAlive()` qui renverra un booléen pour indiquer si le personnage est encore en vie (HP > 0).

class Personnage {
    private string $name;
    private int $health;
    private int $attack;

    public function __construct(string $name, int $health, int $attack) {
        $this->name = $name;
        $this->health = $health;
        $this->attack = $attack;
    }

    // Getters
    public function getName(): string {
        return $this->name;
    }

    public function getHealth(): int {
        return $this->health;
    }

    public function getAttack(): int {
        return $this->attack;
    }

    // Setters
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setHealth(int $health): void {
        $this->health = $health;
    }

    public function setAttack(int $attack): void {
        $this->attack = $attack;
    }

    // Méthode attack
    public function attack(Personnage $adversaire): void {
        $adversaire->health -= $this->attack;

        if ($adversaire->health < 0) {
            $adversaire->health = 0;
        }

        echo "{$this->name} attaque {$adversaire->name} !" . PHP_EOL;
        echo "Il reste {$adversaire->health} PV à {$adversaire->name}." . PHP_EOL . PHP_EOL;
    }

    // Méthode isAlive
    public function isAlive(): bool {
        return $this->health > 0;
    }

    // Destructeur
    public function __destruct() {
        echo "{$this->name} disparaît." . PHP_EOL;
    }
}

// ===================================
// Test de la classe Personnage
// ===================================

// Créer ensuite deux objets `p1` et `p2` à partir de cette classe, définir leurs propriétés,
// et dans une boucle appeler leur méthode `attack()` et `isAlive()`.
// Tant que les deux personnages sont en vie, continuer le combat jusqu'à obtention d’un vainqueur.
// L’autre personnage sera détruit par son destructeur.

// === DEBUT ===
// Gimli a attaqué Legolas
// Il reste 5pv à Legolas 
// Legolas a attaqué Gimli
// Il reste 15pv à Gimli  
// Gimli a attaqué Legolas
// Il reste 0pv à Legolas
// Legolas disparait.
// Gimli gagne le combat !!!
// === FIN DU COMBAT ===
// Gimli disparait.

$p1 = new Personnage("Eddie", 50, 20);
$p2 = new Personnage("Tommy", 40, 15);

echo "=== DEBUT DU COMBAT ===" . PHP_EOL . PHP_EOL;

while ($p1->isAlive() && $p2->isAlive()) {
    $p1->attack($p2);
    if (!$p2->isAlive()) break;

    $p2->attack($p1);
    if (!$p1->isAlive()) break;
}

if ($p1->isAlive()) {
    echo "{$p1->getName()} gagne le combat ! {$p2->getName()} est mort !" . PHP_EOL;
} elseif ($p2->isAlive()) {
    echo "{$p2->getName()} gagne le combat ! {$p1->getName()} est mort !" . PHP_EOL;
}

echo "=== FIN DU COMBAT ===" . PHP_EOL;
