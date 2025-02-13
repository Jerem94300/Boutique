<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>


<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Exercice 1.3</h1>

        <form method="post" action="">
            <div class="mb-3">
                <label for="brand" class="form-label">Marque</label>
                <input type="text" name="brand" class="form-control" placeholder="Marque" id="brand">
             
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Modele</label>
                <input type="text" name="model" placeholder="Modele" class="form-control " id="color">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Couleur</label>
                <input type="text" name="color" placeholder="Couleur" class="form-control" id="color">

            </div>

            <div class="mb-3">
                <label for="km" class="form-label">KM</label>
                <input type="text" name="km" placeholder="Km" class="form-control" id="km">

            </div>

            <div class="mb-3">
                <label for="fuel" class="form-label">Carburant</label>
                <input type="text" name="fuel" placeholder="Carburant" class="form-control" id="fuel">

       
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Année</label>
                <input type="text" name="year" placeholder="Année" class="form-control" id="year">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" name="price" placeholder="Prix" class="form-control" id="price">

            </div>

            <div class="mb-3">
                <label for="power" class="form-label">Puissance</label>
                <input type="text" name="power" placeholder="Puissance" class="form-control" id="power">

            </div>

            <div class="mb-3">
                <label for="option" class="form-label">Option</label>
                <input type="text" name="option" placeholder="Option" class="form-control" id="option">

            </div>


            <button type="submit" class="btn btn-primary">Envoi</button>
           
        </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>