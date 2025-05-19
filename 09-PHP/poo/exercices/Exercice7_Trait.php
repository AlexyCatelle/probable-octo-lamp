<?php

# Navire (trait)

// **Exercice :** 


// Créé les trait suivant :
// `Barre` qui implementera une méthode `virerDeBord()`,

trait Barre
{
    public function virerDeBord()
    {
        echo "Vire de bord à la barre.", PHP_EOL;
    }
}

// un trait `Voile` qui contient un attribut `nbVoile` et 2 méthodes (`hisser()` et `retracter()`) 

trait Voile
{
    protected int $nbVoile;

    public function hisser()
    {
        echo "Hisse les voiles.", PHP_EOL;
    }

    public function retracter()
    {
        echo "Retracte les voiles.", PHP_EOL;
    }
}

// un trait `Gouvernail` qui implementera également une méthode `virerDeBord()`.

trait Gouvernail
{
    public function virerDeBord()
    {
        echo "Vire de bord au gouvernail.", PHP_EOL;
    }
}

// Créer une classe `Navire` qui a pour attribue un `nom` et une `longueur`. 
class Navire
{
        use Voile, Barre, Gouvernail {
        Barre::virerDeBord insteadof Gouvernail;
        Gouvernail::virerDeBord as virerDeBordGouvernail;
        Barre::virerDeBord as virerDeBordBarre;
    }

    protected string $nom;
    protected float $longueur;

    public function __construct(string $nom, float $longueur)
    {
        $this->nom = $nom;
        $this->longueur = $longueur;
    }

    public function naviguer()
    {
        echo "{$this->nom} est en train de naviger.", PHP_EOL;
    }
}

//Créer une classe `BateauAMoteur` qui a pour attribue une puissance de moteur : `nom` et `puissance`(CV). 
class BateauAMoteur
{
    use Barre;

    protected string $nom;
    protected float $puissance;

    public function __construct(string $nom, float $puissance)
    {
        $this->nom = $nom;
        $this->puissance = $puissance;
    }

    public function naviguer()
    {
        echo "{$this->nom} est en train de naviger.", PHP_EOL;
    }
}

// Enfin créer un objet Navire et un objet BateauAMoteur puis utilisez chacune de ses méthodes. 


// Création des objets
$navire = new Navire("Le Vent du Large", 25.5, 3);
$bateauMoteur = new BateauAMoteur("Le Tonnerre", 200.0);

// Utilisation des méthodes du navire
$navire->naviguer();
$navire->hisser();
$navire->retracter();
$navire->virerDeBord(); // méthode de Barre (préférée)
$navire->virerDeBordGouvernail(); // méthode alternative de Gouvernail
$navire->virerDeBordBarre(); // méthode de Barre

echo PHP_EOL;

// Utilisation des méthodes du bateau à moteur
$bateauMoteur->naviguer();
$bateauMoteur->virerDeBord();