<?php


if ($_GET) {

    echo "vous avez choisis les $_GET[fruit]";
    echo calcul($_GET['fruits'], 1000);
  
 
}






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
    <h1 class="text-center my-3">Lien PHP</h1>

    <div class="cards gap-3 justify-content-between">
        <div class="card bg-success p-3">
            <a href="?fruit=cerises" class="text-white text-decoration-none">Cerises</a>
        </div>

        <div class="card bg-primary p-3">
            <a href="?fruit=bananes" class="text-white text-decoration-none">Bananes</a>
        </div>

        <div class="card bg-danger p-3">
            <a href="?fruit=pommes" class="text-white text-decoration-none">Pommes</a>
        </div>

        <div class="card bg-secondary p-3">
            <a href="?fruit=peches" class="text-white text-decoration-none">Pêches</a>
        </div>
    </div>


    
  </div>
   




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>