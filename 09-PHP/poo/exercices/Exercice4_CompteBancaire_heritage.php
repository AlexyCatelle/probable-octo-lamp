<?php

# Compte bancaire

// **Exercice :** Créer une classe `CompteBancaire` avec les propriétés suivantes :
// `titulaire` (chaîne de caractères),
// `solde` (nombre à virgule flottante)
// `devise` (chaîne de caractères). 

class CompteBancaire
{
    protected string $titulaire;
    protected float $solde;
    public string $devise;

    //La classe doit avoir un constructeur qui prend en paramètres le nom du titulaire,
    // le solde initial et la devise, et qui initialise les propriétés correspondantes. 

    public function __construct($titulaire, $solde, $devise)
    {
        $this->titulaire = $titulaire;
        $this->solde = $solde;
        $this->devise = $devise;
    }

    //La classe doit également avoir un destructeur qui affiche un message lorsque l'objet est détruit. 
    public function __destruct()
    {
        echo "Le compte de {$this->titulaire} est fermé.", PHP_EOL;
    }

    // Start GETTER et SETTER
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    public function getDevise()
    {
        return $this->devise;
    }

    public function setDevise($devise)
    {
        $this->devise = $devise;
    }
    // End GETTER et SETTER

    //La classe doit également avoir les méthodes suivantes :
    // - `deposer($montant)` : ajoute le montant spécifié au solde du compte.

    public function deposer(float $montant): void
    {

        if ($montant > 0) {
            $this->solde += $montant;
            echo "{$montant} {$this->devise} déposés sur le compte de {$this->titulaire}.", PHP_EOL;
        } else {
            echo "Erreur : le montant à déposer doit être supérieur à 0.", PHP_EOL;
        }
    }
}

$compte1 = new CompteBancaire("Alice", 1000.00, "€");

$compte1->deposer(-100); // Montant invalide
$compte1->deposer(0);    // Montant invalide
$compte1->deposer(150);  // OK


// - `retirer($montant)` : retire le montant spécifié du solde du compte, à condition que le solde soit suffisant.
// - `afficherSolde()` : affiche le solde du compte avec la devise. */

/* Créez ensuite un objet `compte` à partir de la classe `CompteBancaire` en utilisant le constructeur pour initialiser ses propriétés.
 Déposez ensuite de l'argent sur le compte en utilisant la méthode `deposer()`,
 retirez de l'argent du compte en utilisant la méthode `retirer()`,
 et affichez le solde du compte en utilisant la méthode `afficherSolde()`.
 Enfin, détruisez l'objet `compte` en utilisant la fonction `unset()` pour déclencher l'appel du destructeur.
*/

/* Créez ensuite deux autres classes `CompteEpargne` et `CompteCourant` qui héritent de la classe `CompteBancaire`.
 La classe `CompteEpargne` doit avoir une propriété `tauxInteret` (nombre à virgule flottante) 
 et une méthode `calculerInterets()` qui calcule les intérêts générés par le solde du compte en utilisant le taux d'intérêt. 
 La classe `CompteCourant` doit avoir une propriété `decouvertAutorise` (nombre à virgule flottante)
  et une méthode `retirerAvecDecouvert($montant)` qui permet de retirer de l'argent même si le solde est insuffisant,
   à condition que le montant ne dépasse pas le découvert autorisé.
*/

/*Créez ensuite un objet `compteEpargne` à partir de la classe `CompteEpargne` 
et un objet `compteCourant` à partir de la classe `CompteCourant`. 
Déposez ensuite de l'argent sur les deux comptes en utilisant la méthode `deposer()`,
 calculez les intérêts générés par le compte d'épargne en utilisant la méthode `calculerInterets()`, 
 retirez de l'argent du compte courant en utilisant la méthode `retirerAvecDecouvert($montant)`, 
et affichez le solde des deux comptes en utilisant la méthode `afficherSolde()`. 
Enfin, détruisez les objets `compteEpargne` et `compteCourant` en utilisant la fonction `unset()` pour déclencher l'appel du destructeur.
*/