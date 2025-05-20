<?php
// 1. Créez un tableau associatif `$articles` contenant les informations suivantes :
// - Nom
// - Prix
// - Quantité en stock

session_start();

$articles = [
    1 => ["nom" => "Clavier mécanique", "prix" => 79.99, "stock" => 15],
    2 => ["nom" => "Souris sans fil", "prix" => 39.90, "stock" => 30],
    3 => ["nom" => "Écran 24 pouces", "prix" => 149.00, "stock" => 8],
    4 => ["nom" => "Casque audio", "prix" => 59.50, "stock" => 20]
];

// 2. Créez une variable `$panier` initialisée à un tableau vide.
if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}

// 3. Créez une structure conditionnelle qui vérifie si l'utilisateur a soumis un formulaire
// pour ajouter un article au panier. Si c'est le cas, récupérez le nom de l'article
// et la quantité souhaitée à partir des données du formulaire.

// 4. Vérifiez si l'article existe dans le tableau `$articles` et si la quantité demandée est
// disponible en stock. Si c'est le cas, ajoutez l'article et sa quantité au tableau `$panier`.
// Sinon, affichez un message d'erreur indiquant que l'article n'est pas disponible
// ou que la quantité demandée est insuffisante.

$message = "";
if (isset($_POST["ajouter"])) {
    $id = intval($_POST["article"]);
    $quantite = intval($_POST["quantite"]);

    if (isset($articles[$id])) {
        if ($quantite > 0 && $quantite <= $articles[$id]["stock"]) {
            if (!isset($_SESSION["panier"][$id])) {
                $_SESSION["panier"][$id] = 0;
            }
            $_SESSION["panier"][$id] += $quantite;
            $message = "Article ajouté au panier.";
        } else {
            $message = "Stock insuffisant pour cet article.";
        }
    } else {
        $message = "Article invalide.";
    }
}

// 5. Créez une structure conditionnelle qui vérifie si l'utilisateur a soumis un formulaire
// pour supprimer un article du panier. Si c'est le cas, récupérez le code de l'article
// à partir des données du formulaire et supprimez-le du tableau `$panier`.

if (isset($_POST["supprimer"])) {
    $id = intval($_POST["articleASupprimer"]);
    if (isset($_SESSION["panier"][$id])) {
        unset($_SESSION["panier"][$id]);
        $message = "Article supprimé du panier.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice récapitulatif: Les formulaires</title>
    <style>
        * {
            max-width: 100wh;
        }

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
        <h1>PHP Market</h1>
        <p>
            Objectif : Créer un script PHP qui simule un panier d'achats en ligne.
            Le panier doit permettre d'ajouter, de supprimer et d'afficher les articles
            sélectionnés par l'utilisateur.
        </p>
        <nav><a href="..">Retour à l'index</a></nav>
    </header>

    <main>

        <?php if ($message): ?>
            <p><strong><?= htmlspecialchars($message) ?></strong></p>
        <?php endif; ?>

        <section>
            <!-- 6. Créez une boucle itérative qui parcourt le tableau `$panier`
            et affiche les articles sélectionnés par l'utilisateur,
            ainsi que leur prix total. -->
            <h2>Panier</h2>
            <?php if (empty($_SESSION["panier"])): ?>
                <p>Le panier est vide.</p>
            <?php else: ?>
                <ul>
                    <?php
                    $total = 0;
                    foreach ($_SESSION["panier"] as $id => $quantite):
                        $nom = $articles[$id]["nom"];
                        $prix = $articles[$id]["prix"];
                        $sousTotal = $quantite * $prix;
                        $total += $sousTotal;
                    ?>
                        <li><?= $nom ?> × <?= $quantite ?> = <?= number_format($sousTotal, 2) ?> €</li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Total : <?= number_format($total, 2) ?> €</strong></p>
            <?php endif; ?>
        </section>

        <section>
            <!-- 7. Affichez un formulaire HTML permettant à l'utilisateur
            de sélectionner un article, d'entrer une quantité et de cliquer
            sur un bouton "Ajouter au panier". -->
            <h2>Ajouter un article au panier</h2>
            <form method="POST">
                <label for="article">Article :</label>
                <select name="article" id="article">
                    <?php foreach ($articles as $id => $article): ?>
                        <option value="<?= $id ?>"><?= $article["nom"] ?> - <?= number_format($article["prix"], 2) ?> € (Stock : <?= $article["stock"] ?>)</option>
                    <?php endforeach; ?>
                </select>

                <label for="quantite">Quantité :</label>
                <input type="number" name="quantite" min="1" value="1" required>

                <button type="submit" name="ajouter">Ajouter au panier</button>
            </form>
        </section>

        <section>
            <!-- 8. Affichez un autre formulaire HTML permettant à l'utilisateur
            de sélectionner un article dans son panier et de cliquer sur un
            bouton "Supprimer du panier". -->
            <h2>Supprimer un article du panier</h2>
            <?php if (!empty($_SESSION["panier"])): ?>
                <form method="POST">
                    <label for="articleASupprimer">Choisissez un article à supprimer :</label>
                    <select name="articleASupprimer" id="articleASupprimer">
                        <?php foreach ($_SESSION["panier"] as $id => $qty): ?>
                            <option value="<?= $id ?>"><?= $articles[$id]["nom"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="supprimer">Supprimer</button>
                </form>
            <?php else: ?>
                <p>Rien à supprimer.</p>
            <?php endif; ?>
        </section>

    </main>

</body>
</html>
