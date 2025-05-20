
<?php
# Vehicule (interfaces)

// **Exercice :** 

// Créez une classe abstraite `Vehicule` représentant un véhicule. Elle aura deux propriétés :

abstract class Vehicule
{
    // - `$nom` qui stocke le nom du véhicule.
    protected string $nom;
    // - `$marque` qui stocke la marque du véhicule.
    protected string $marque;

    public function __construct(string $nom, string $marque)
    {
        $this->nom = $nom;
        $this->marque = $marque;
    }

    // La classe Vehicule possédera également une méthode `__toString()` qui retourne une description du véhicule.
    public function __toString(): string
    {
        return "Véhicule : $this->nom, Marque : $this->marque";
    }
}

// Ensuite, vous créerez plusieurs interfaces représentant des comportements spécifiques des véhicules :

// - `Motorise` : un véhicule qui peut `démarrer()`.
interface Motorise
{
    public function démarrer(): void;
}

// - `Electrique` : un véhicule qui peut se `recharger()`.
interface Electrique
{
    public function recharger(): void;
}

// - `Volant` : un véhicule qui peut `décoller()` et `atterrir()`.
interface Volant
{
    public function décoller(): void;
    public function atterrir(): void;
}

// - `Flottant` : un véhicule qui peut `naviguer()` sur l'eau.

interface Flottant
{
    public function naviger() : void;
}

// Vous devez implémenter ces interfaces dans différentes classes (qui hériterons toutes de la classe `Vehicule`) 
// et déclarer les méthodes correspondante. Voici les classes à créer :

// - `Voiture` : un véhicule qui implémente l'interface `Motorise`.

class Voiture extends Vehicule implements Motorise {
    public function démarrer(): void
    {
        echo "La voiture démarre.", PHP_EOL;
    }
}

// - `VoitureHybride` : un véhicule qui implémente les interfaces `Motorise` et `Electrique`.

class VoitureHybride extends Vehicule implements Motorise, Electrique {
    public function démarrer(): void
    {
        echo "La voiture Hybride démarre.", PHP_EOL;
    }
    public function recharger(): void
    {
        echo "La voiture Hybride recharge.", PHP_EOL;
    }
}
// - `Hydravion` : un véhicule qui implémente les interfaces `Motorise`, `Volant`, et `Flottant`.

class Hydravion extends Vehicule implements Motorise,Volant, Flottant{
    public function démarrer(): void
    {
        echo "L'hydravion démarre.", PHP_EOL;
    }

    public function décoller(): void
    {
        echo "L'hydravion décolle.", PHP_EOL;
    }

    public function atterrir(): void
    {
        echo "L'hydravion atterrit.", PHP_EOL;
    }

    public function naviger(): void
    {
        echo "L'hydravion navigue.", PHP_EOL;
    }
}
// Enfin, créez des objets de chaque type de véhicule (Voiture, VoitureHybride, Hydravion) en leur donnant des noms et des marques,
//  puis affichez les informations de chaque véhicule et effectuez les actions correspondantes (démarrer, recharger, décoller, etc.).

// Création des objets

$voiture = new Voiture("Clio", "Renault");
$voitureHybride = new VoitureHybride("Prius", "Toyota");
$hydravion = new Hydravion("SeaPlane", "HydroTech");

// Affichage des informations et actions

echo $voiture . PHP_EOL;
$voiture->démarrer();

echo PHP_EOL;

echo $voitureHybride . PHP_EOL;
$voitureHybride->démarrer();
$voitureHybride->recharger();

echo PHP_EOL;

echo $hydravion . PHP_EOL;
$hydravion->démarrer();
$hydravion->naviger();
$hydravion->décoller();
$hydravion->atterrir();
