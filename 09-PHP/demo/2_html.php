<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo dune page PHP</title>
    <style>
        *{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Demo d'une page PHP</h1>
    <?php $prenom = "Kiky" ?>

    <h2>Bonjour, <?= $prenom ?></h2>

    <p> La taille du prénom est de <?= strlen($prenom) ?> caractères.
    </p>
    <p>
        <?= '<a href="https://google.com">Lien</a>' ?>
    </p>

    <button onclick="handleClick('<?=$prenom?>')">Cliquez-moi</button>
    
    <h2>Var dump</h2>

    <?php var_dump($prenom) ?>

    <script>
       function handleClick(message){
alert("le bouton a été selectionné par : <?= $prenom?>");
       };

    </script>

</body>
</html>