<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    echo "Marque : " . $_POST['brand'] . '<br>';
    echo "Modele : " . $_POST['model'] . '<br>';
 

}

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

        <form method="post" action="exercice1.3bis.php">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" placeholder="Titre" id="title">
             
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Couleur</label>
                <input type="text" name="color" placeholder="Couleur" class="form-control " id="color">
            </div>

            <div class="mb-3">
                <label for="size" class="form-label">Taille</label>
                <input type="text" name="size" placeholder="Taille" class="form-control" id="size">

            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Poids</label>
                <input type="text" name="weight" placeholder="Poids" class="form-control" id="wieght">

            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" name="price" placeholder="Prix" class="form-control" id="price">

       
            </div>

            <div class="mb-3 d-flex  align-items-center">
                <label for="textarea" class="form-label align-items-center p-3">Description</label>
                <textarea class="w-50" name="textarea" id="textarea" placeholder ="Description"></textarea>
            </div>


            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" name="stock" placeholder="Stock" class="form-control" id="stock">
            </div>

            <div class="mb-3">
                <label for="supplier" class="form-label">Fournisseur</label>
                <input type="text" name="supplier" placeholder="Fournisseur" class="form-control" id="supplier">

            </div>


            <button type="submit" class="btn btn-primary">Envoi</button>
           
        </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>