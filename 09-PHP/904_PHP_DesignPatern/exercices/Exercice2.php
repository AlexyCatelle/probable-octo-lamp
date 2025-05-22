<?php

//Exercice : Decorator - Personnalisation de texte

// Objectif :
// Créez un système de personnalisation de texte où différents décorateurs ajoutent des transformations au texte, comme :
// 1. Conversion en majuscules ou minuscules.
// 2. Ajout d'un préfixe ou d'un suffixe.

// Tâches :
// 1. Implémentez une interface `Text` avec une méthode `transform()`.
// 2. Créez un décorateur abstrait et plusieurs décorateurs concrets (pour changer la casse, ajouter des préfixes, etc.).
// 3. Testez dans une classe principale.


// Interface Text
interface Text {
    public function transform(): string;
}

// Composant de base : PlainText
class PlainText implements Text {
    private $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    public function transform(): string {
        return $this->text;
    }
}

// Décorateur abstrait
abstract class TextDecorator implements Text {
    protected $component;

    public function __construct(Text $component) {
        $this->component = $component;
    }

    public function transform(): string {
        return $this->component->transform();
    }
}

// Décorateur : Majuscules
class UpperCaseDecorator extends TextDecorator {
    public function transform(): string {
        return strtoupper(parent::transform());
    }
}

// Décorateur : Minuscules
class LowerCaseDecorator extends TextDecorator {
    public function transform(): string {
        return strtolower(parent::transform());
    }
}

// Décorateur : Préfixe
class PrefixDecorator extends TextDecorator {
    private $prefix;

    public function __construct(Text $component, string $prefix) {
        parent::__construct($component);
        $this->prefix = $prefix;
    }

    public function transform(): string {
        return $this->prefix . parent::transform();
    }
}

// Décorateur : Suffixe
class SuffixDecorator extends TextDecorator {
    private $suffix;

    public function __construct(Text $component, string $suffix) {
        parent::__construct($component);
        $this->suffix = $suffix;
    }

    public function transform(): string {
        return parent::transform() . $this->suffix;
    }
}

// TEST

$text = new PlainText("Bonjour le monde");

// Enchaînement des décorateurs
$text = new UpperCaseDecorator($text);
$text = new PrefixDecorator($text, "[ ");
$text = new SuffixDecorator($text, " ]");

echo $text->transform();  // Affiche : [ BONJOUR LE MONDE ]

