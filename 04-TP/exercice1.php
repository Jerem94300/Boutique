<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>

<?php

if ($_POST ) {

    echo "Nom : " . $_POST['lastName'] . '<br>';
    echo "Prenom : " . $_POST['firstName'] . '<br>';
    echo "Mot de passe : " . $_POST['password'] . '<br>';
    echo "Email : " . $_POST['email'] . '<br>';
    echo "Numero de tel : " . $_POST['phone'] . '<br>';
    echo "Adresse : " . $_POST['adress'] . '<br>';
    echo "Ville : " . $_POST['city'] . '<br>';
    echo "Code postale : " . $_POST['zipcode'] . '<br>';
    echo "Sexe : " . $_POST['sexe'] . '<br>';
    echo "Description : " . $_POST['textarea'] . '<br>';

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
        <h1 class="text-center">Exercice 1</h1>

        <form method="post" action="">
            <div class="mb-3">
                <label for="lastName" class="form-label">Nom</label>
                <input type="text" name="lastName" class="form-control" placeholder="Saisir votre nom" id="nom">
             
     
             
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prenom</label>
                <input type="text" name="firstName" placeholder="Saisir votre prenom" class="form-control " id="firstName">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" placeholder="Saisir votre mot de passe" class="form-control" id="password">

            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" placeholder="Saisir votre Email" class="form-control" id="email">

            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="text" name="phone" placeholder="Saisir votre numero de téléphone" class="form-control" id="phone">

       
            </div>

            <div class="mb-3">
                <label for="adress" class="form-label">Adresse</label>
                <input type="text" name="adress" placeholder="Saisir votre adresse" class="form-control" id="adress">
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" name="city" placeholder="Saisir votre ville" class="form-control" id="city">

            </div>

            <div class="mb-3">
                <label for="zipcode" class="form-label">Code postal</label>
                <input type="text" name="zipcode" placeholder="Saisir votre code postal" class="form-control" id="zipcode">
            </div>

            <div class="mb-3">
                <label for="sexe" class="form-label">Sexe</label>
                <select name="sexe" id="sexe">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>

            <div class="mb-3 d-flex ">
                <label for="textarea" class="form-label align-items-center p-3">Ma description</label>
                <textarea class="w-50" name="textarea" id="textarea" placeholder ="Ma description"></textarea>
            </div>

            


            
            <button type="submit" class="btn btn-primary">Envoi</button>
           
        </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>