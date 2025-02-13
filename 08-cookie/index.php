<?php

// Array
// (
//     [country] => italie
//     [PHPSESSID] => d57e318cbe2160e4f90b79f4961a0768
// )

// le fichier cookie est stocké coté client, coté navigateur, il contient des données non sensibles (derniers articles consultés , préference du site etc..) ici le cookie a une duree de vie valable a un an, si l'internaute se connectte tous les mois verra ses choic gardé a l'infini
// setcookie() est une fonction predefinie permettant de créer  un fichier  cookie cependant il n'y a pas de fonction predefinie permettant de la supprimer. pour rendre un cookie inactif, une fois la duree de vie atteind il est automatiquement supprimé

// le fichier de session et de cookie sont lié [PHPSESSID] => d57e318cbe2160e4f90b79f4961a0768



if (isset($_GET['country'])) {
    $pays = $_GET['country'];
} elseif (isset($_COOKIE['country'])) {
    $pays = $_COOKIE['country'];
} else {
    $pays = 'france';
}

$un_an = 365 * 24 * 3600;
setcookie("country", $pays, time() + $un_an);
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lien php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <h1 class="text-center my-3">Cookie</h1>

    <div class="cards gap-3 justify-content-between">
        <div class="card bg-success p-3">
            <a href="?country=france" class="text-white text-decoration-none">France</a>
        </div>

        <div class="card bg-primary p-3">
            <a href="?country=italie" class="text-white text-decoration-none">Italie</a>
        </div>

        <div class="card bg-danger p-3">
            <a href="?country=espagne" class="text-white text-decoration-none">Espagne</a>
        </div>

        <div class="card bg-secondary p-3">
            <a href="?country=angleterre" class="text-white text-decoration-none">Angleterre</a>
        </div>
    </div>

    <?php
    echo '<pre>'; print_r($_COOKIE); echo '</pre>';

    switch ($pays) {
        case 'france':
            echo "Vous visitez un site en français";
            break;
        case 'italie':
            echo "Vous visitez un site en italien";
            break;
        case 'espagne':
            echo "Vous visitez un site en espagnol";
            break;
        case 'angleterre':
            echo "Vous visitez un site en anglais";
            break;
    }
    ?>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
