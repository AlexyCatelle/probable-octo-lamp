<?php

//**Exercice :** Créez une classe abstraite `Forme` représentant une forme géométrique. 
//Elle aura une propriété `$nom` qui stockera le nom de la forme. Elle possédera également les méthodes suivantes : 

// - `calculerAire()` (abstraite) qui calcul l'aire de la forme. 
// - `calculerPerimetre()` (abstraite) qui calcul son périmètre. 
// - `infos()` qui donnera les informations de la forme. 

abstract class Forme {
    protected string $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    abstract public function calculerAire(): float;
    abstract public function calculerPerimetre(): float;

    public function infos(): void {
        echo "Forme : {$this->nom}", PHP_EOL;
        echo "Aire : " . $this->calculerAire(), PHP_EOL;
        echo "Périmètre : " . $this->calculerPerimetre(), PHP_EOL;
    }
}

// Vous créerai ensuite 2 classe qui héritent de Forme : 

// - `Rectangle`, avec les propriétés longueur et largeur
class Rectangle extends Forme {
    private float $longueur;
    private float $largeur;

    public function __construct(float $longueur, float $largeur) {
        parent::__construct("Rectangle");
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function calculerAire(): float {
        return $this->longueur * $this->largeur;
    }

    public function calculerPerimetre(): float {
        return 2 * ($this->longueur + $this->largeur);
    }

    public function infos(): void {
        parent::infos();
        echo "Longueur : {$this->longueur}", PHP_EOL;
        echo "Largeur : {$this->largeur}", PHP_EOL;
    }
}

// - `Cercle`, avec la propriété rayon 
class Cercle extends Forme {
    private float $rayon;

    public function __construct(float $rayon) {
        parent::__construct("Cercle");
        $this->rayon = $rayon;
    }

    public function calculerAire(): float {
        return pi() * pow($this->rayon, 2);
    }

    public function calculerPerimetre(): float {
        return 2 * pi() * $this->rayon;
    }

    public function infos(): void {
        parent::infos();
        echo "Rayon : {$this->rayon}\n";
    }
}

//Enfin créez un objet `rectangle` et un objet `cercle` à l'aide de leur constructeur
// puis affichez leur infos (nom, propriété, perimetre, aire). 

$rectangle = new Rectangle(5, 3);
$cercle = new Cercle(4);

echo "Infos du Rectangle", PHP_EOL;
$rectangle->infos();

echo "Info cercle", PHP_EOL;
$cercle->infos();