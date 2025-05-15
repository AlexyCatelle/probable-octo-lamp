<?php

# POO: Création d'un rectangle

// Exercice : Créer une classe `Rectangle` avec deux propriétés `largeur` et `hauteur`,
// et deux méthodes `perimetre()` et `surface()`. Créer ensuite un objet `monRectangle`
// à partir de cette classe, définir ses propriétés `largeur` et `hauteur`,
// et appeler ses méthodes `perimetre()` et `surface()`.

class Rectangle
{
    public int $largeur;
    public int $hauteur;

    public function __construct(int $largeur, int $hauteur)
    {
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }

    public function perimetre(): int
    {
        return 2 * ($this->largeur + $this->hauteur);
    }

    public function surface(): int
    {
        return $this->largeur * $this->hauteur;
    }
}

$monRectangle = new Rectangle(10, 5);

echo "Périmètre : " . $monRectangle->perimetre(), PHP_EOL;
echo "Surface : " . $monRectangle->surface(), PHP_EOL;
