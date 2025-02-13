<?php



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
            <a href="exercice2.2.php?sexe=homme" class="text-white text-decoration-none">Homme</a>
        </div>

        <div class="card bg-primary p-3">
            <a href="exercice2.2.php?sexe=femme" class="text-white text-decoration-none">Femme</a>
        </div>

   
    </div>

    <?php
if($_GET['sexe'] != 'femme' ){
  echo "Vous etes un $_GET[sexe] <br>";
} 
else{
  echo "Vous etes une $_GET[sexe] <br>";
} 







?>

    
  </div>
   




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>