<?php

// Gestion du cookie de visites
if (isset($_COOKIE['visites'])) {
    $countVisite = $_COOKIE['visites'] + 1;
} else {
    $countVisite = 1;
}
setcookie("visites", $countVisite, time() + 3600);

// Gestion information connexion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["userFirstname"] = $_POST["firstname"] ?? "";
    $_SESSION["userLastname"] = $_POST["lastname"] ?? "";
}

// Gestion de la déconnexion
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 16 : superglobales</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label,
        input,
        button {
            display: block;
            margin: 10px 0;
        }

        input {
            padding: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Exercice 16 : superglobales</h1>
        <nav>
            <a href="..">Retour à l'index</a>
        </nav>
    </header>
    <main>
        <h2>
            <?php if (isset($_SESSION["userFirstname"])): ?>
                Bienvenue <span><?= htmlspecialchars($_SESSION["userFirstname"]) ?></span> !
            <?php else: ?>
                Bienvenue invité !
            <?php endif; ?>
        </h2>

        <?php if (!isset($_SESSION["userFirstname"])): ?>

            <!-- Formulaire de connexion -->
            <form method="post">
                <label>Prénom :
                    <input type="text" name="firstname" required>
                </label>
                <label>Nom :
                    <input type="text" name="lastname" required>
                </label>
                <button>Connexion</button>
            </form>
        <?php else: ?>

            <!-- Bouton logout -->
            <form method="get">
                <button type="submit" name="logout">Se déconnecter</button>
            </form>

        <?php endif; ?>

    </main>
    <footer>
        <p>Nombre de visites : <?= $countVisite ?></p>
    </footer>


</body>

</html>

<!-- - Créer une page PHP incluant : 
    - un message de bienvenue x
    - un formulaire de connexion demandant le nom et le prenom de l'utilisateur x
    - Un cookie `visites` est mis à jour à chaque visite de la page (peu importe l'utilisateur). x

- A la soumission du formulaire : 
    - les logs utilisateurs seront stocké dans la session. x
    - Le message de bienvenue est actualisé selon les logs utilisateurs. x
    - Le formulaire laisse place à un bouton `logout`. 
    - Cliquer sur `logout` mettra fin à la session. 