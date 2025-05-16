<?php

class Chien {
    private string $nom;
    private string $race; 
    private int $age;
    public static string $nomDuChenil = 'Esprit Dog';
    public static int $nbChiens = 0;

    public function __construct($nom, $race, $age) {
        $this->nom = $nom;
        $this->race = $race;
        $this->age = $age; 
        self::$nbChiens++;
    }

    public function __toString(){
        return  "Nom : " . $this->getNom() . 
                ", Race : " . $this->getRace() . 
                ", Age : " . $this->getAge() . 
                ", Nom du Chenil : " . self::$nomDuChenil . PHP_EOL; 
    }

    public function __destruct(){
        self::$nbChiens--;  
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getRace() {
        return $this->race;
    }

    public function setRace($race) {
        $this->race = $race;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

$chien1 = new Chien('Rico', 'Husky', 2);
$chien2 = new Chien('Rex', 'Berger Allemand', 6);

echo "Avant modification : " . $chien1, PHP_EOL;

$chien1->setNom("Démon");
$chien1->setRace("Malamute");
$chien1->setAge("1");

echo "Après modificiation : " . $chien1, PHP_EOL;
echo $chien2, PHP_EOL;

Chien::$nomDuChenil = "SPA";

echo "Après modification du chenil : " . $chien1, PHP_EOL;
echo $chien2, PHP_EOL;