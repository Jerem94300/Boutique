<?php
/* Exercice : 
	1. Réaliser un formulaire permettant de selectioner un fruit et saisir un poids
	2. Traitement permettant d'afficher le prix en passant par la fonction déclarée "calcul()".
	3. Faire en sorte de garder le dernier fruit selectioné et le dernier poids saisie dans le formulaire lorsque celui-ci est validé.
*/

?>

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
        <h1 class="text-center">Formulaire Fruit</h1>

        <form method="post" action="">
            <div class="mb-3">
                <label for="fruit" class="form-label">Fruit</label>
                <input type="text" name="fruitName" class="form-control" placeholder="Fruit" id="fruit" value="<?php if(isset($_POST['fruitName'])) {echo $_POST['fruitName'];}?>">
             
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Poids</label>
                <input type="text" name="weight" placeholder="Poids" class="form-control " id="weight" value="<?php if(isset($_POST['weight'])) {echo $_POST['weight'];}?>">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label"></label> <?php include("fonction.inc.php");?></label>
                <input type="text" name="price" placeholder="Prix" class="form-control " id="price"><?php echo calcul($_POST['fruitName'], $_POST['weight'])?>
            </div>



            <button type="submit" class="btn btn-primary">Envoi</button>


          
        </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>