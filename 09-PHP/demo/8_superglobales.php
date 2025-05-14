<?php
session_start(); 

// Permet de mettre fin à une session. 
// session_destroy(); 

$test = "coucou"; 

// La session dure aussi longtemps que l'utilisateur est actif sinon $_SESSION se vide après une période d'inactivité ou que le navigateur à été fermé pendant une certaine période. 
$_SESSION["session_test"] = "Ceci est une session test"; 
setcookie("cookie_test", "Ceci est un cookie", time()+3600); // Le cookie 'cookie_test' sera stocké pendant 1heure.  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobales PHP</title>
    <style>
        body {font-family: Arial; background: whitesmoke; padding: 20px;}
        h1 {text-align: center;}
        pre {background: white; padding:10px; border: 1px solid; overflow: auto;}
    </style>
</head>
<body>
    <h1>Superglobales PHP</h1>
    <p>$_GET et $_POST sont des variables superglobales. On va les utiliser pour récupérer des valeurs via dans l'URL (get) ou dans le corps de notre requête (post)</p>
    
    <a href="..">Retour à l'index</a>
    <hr>

    <h2>1. Formulaire GET</h2>
    <form method="get">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="age" placeholder="age">
        <button type="submit">Envoyer en GET</button>
    </form>

    <h2>2. Formulaire POST</h2>
    <form method="post" action="">
        <input type="text" name="post_text" placeholder="Entrez quelque chose en POST">
        <button type="submit">Envoyer en POST</button>
    </form>

    <h2>3. Upload de fichier (POST & FILES)</h2>
        <form method="post" enctype ="multipart/form-data">
        <input type="file" name="fichier">
        <button type="submit">Upload</button>
    </form>

    <?php
        // $_GET est un tableau contenant les paramètres de l'URL (si l'url contient ?nom=test alors nous aurons ["nom" => "test"]) 
        // Vérifier qu'un élément existe dans la superglobale $_GET
        // $var = $_GET["var"] ?? "nom par défaut"; 
        // $var = isset($_GET["var"]) ? $_GET["var"] : "var par défaut"; 
        $var = !empty($_GET["var"]) ? $_GET["var"] : "var par défaut"; // Empty va également vérifier que le contenue n'est pas vide. 
        
        $nom = !empty($_GET["nom"]) ? $_GET["nom"] : "nom par défaut";
        $age = !empty($_GET["age"]) ? $_GET["age"] : "age par défaut";
    ?>
    <h2>$_GET</h2>
    <pre>
        <?php 
        print_r($_GET); 
        print("Nom : ".$nom.PHP_EOL);
        print("Age : ".$age.PHP_EOL);
        print("Variable inconnue : " . $var)
        ?>
    </pre>

    <h2>$_POST</h2>
    <h3>
        <?php 
            if(empty($_POST))
                echo "Vous êtes arrivé avec une requête GET"; 
            else 
                 echo "Vous êtes arrivé avec une requête POST"; 
        ?>
    </h3>
    <pre>
        <?php print_r($_POST); ?>
    </pre>
    
    <h2>$_FILES</h2>
    <pre><?php print_r($_FILES); ?></pre>

    <h2>$_COOKIE</h2>
    <pre><?php print_r($_COOKIE); ?></pre>

    <h2>$_SESSION</h2>
    <pre><?php print_r($_SESSION); ?></pre>

    <h2>$_SERVER</h2>
    <pre><?php print_r($_SERVER); ?></pre>

    <h2>$_ENV</h2>
    <pre><?php print_r($_ENV); ?></pre>

    <h2>$_REQUEST</h2>
    <pre><?php 
    // $_REQUEST regroupe toutes les données passé dans la requête (GET + POST) 
    print_r($_REQUEST); 
    ?></pre>

    <h2>$GLOBALS</h2>
    <pre><?php print_r($GLOBALS); ?></pre>

</body>
</html>