<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';


/*
  La superglobale permet de recuperer toutes les données saisies dans un formulaire ( ne pas oublier les attribut 'name et method), sous forme de tableau array. les Indices correspondent aux valeurs des attributs 'name' du formulaire

  au pemier chargement de la page, $_POST est vide donc il renvoi FALSE, si nous validons le formulaire, les données sont envoyés a $_POST et renvoi TRUE
*/

// exo : afficher sur la page web le nom et le prenom dans le formulaire en passant par la superglobal $_POST 

//  echo $_POST['nom'];
//  echo $_POST['prenom'];

if ($_POST ) {
  $border = 'border border-danger';



  if (iconv_strlen($_POST['pseudo']) < 3 ||  iconv_strlen($_POST['pseudo'])>10 ) {
    $errorPseudo='<small class="text-danger">Taille du pseudo non conforme</small><br>';
    $error = true;

   }

   if (empty($_POST['password'])) {
    $errorPassword='<small class="text-danger">Merci de saisir votre mot de passe</small><br>';
    $error = true;

   }

  
   if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    $errorEmail='<small class="text-danger">Erreur Email ! Ex: exemple@gmail.com</small><br>';
    $error = true;

   }
 
}
 

?>



<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O3-POST-FORMULAIRE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Formulaire 2</h1>

        <?php if (isset($validateForm )) {
                       echo $validateForm ;
                }
           
                ?>

        <form method="post" action="">
         
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" placeholder="Pseudo" class="form-control  <?php if (isset($errorPseudo)) {echo $border;}?>" id="pseudo">

                <?php if (isset($errorPseudo)) {
                       echo $errorPseudo;
                }
           
                ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" placeholder="Saisir votre mot de passe" class="form-control  <?php if (isset($errorPassword)) {echo $border;}?>" id="password">

                <?php if (isset($errorPassword)) {
                       echo $errorPassword;
                }
           
                ?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" placeholder="Saisir votre Email" class="form-control   <?php if (isset($errorEmail)) {echo $border;}?>" id="email">

                <?php if (isset($errorEmail)) {echo $errorEmail;}?>
            </div>

        

            
            <button type="submit" class="btn btn-primary">Valider</button>
           
        </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>