<!-- Creer un formulaire HTML avec les champs correspondants aux colonnes de la table employes -->
 <!-- Controler avec print_r -->
  <!-- Creer le script permettant d'inserer un employe dans la BDD à la validation du formulaire -->



  <?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

if ($_POST ) {



$postForm= $pdo->exec("INSERT INTO employes VALUES(NULL, '$_POST[firstName]', '$_POST[lastName]', '$_POST[sexe]', '$_POST[service]', '$_POST[date]', '$_POST[salaire]')");

    echo "Nombre d'enregistrements  : " . $postForm . '<br>';
   

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
        <h1 class="text-center">Formulaire Employes</h1>

        <form method="post" action="">
       
             
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prenom</label>
                <input type="text" name="firstName" placeholder="Saisir votre prenom" class="form-control " id="firstName">
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Nom</label>
                <input type="text" name="lastName" placeholder="Saisir votre prenom" class="form-control " id="lastName">
            </div>

            <div class="mb-3">
                <label for="sexe" class="form-label">Sexe</label>
                <select name="sexe" id="sexe">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="service" class="form-label">Service</label>
                <input type="text" name="service" placeholder="Saisir votre service" class="form-control" id="service">

            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date d'embauche</label>
                <input type="date" name="date" placeholder="Saisir votre date d'embauche" class="form-control" id="date">

       
            </div>

            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire</label>
                <input type="text" name="salaire" placeholder="Saisir votre salaire" class="form-control" id="salaire">
            </div>

            
            <button type="submit" class="btn btn-primary">Envoi</button>
           
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>