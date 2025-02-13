<?php
echo '<prev>';
print_r($_POST);
echo '</prev>';


/*
  La superglobale permet de recuperer toutes les données saisies dans un formulaire ( ne pas oublier les attribut 'name et method), sous forme de tableau array. les Indices correspondent aux valeurs des attributs 'name' du formulaire

  au pemier chargement de la page, $_POST est vide donc il renvoi FALSE, si nous validons le formulaire, les données sont envoyés a $_POST et renvoi TRUE
*/

// exo : afficher sur la page web le nom et le prenom dans le formulaire en passant par la superglobal $_POST 

//  echo $_POST['nom'];
//  echo $_POST['prenom'];

if ($_POST ) {
  $border = 'border border-danger';


  if (empty($_POST['nom'])) {
    //si le champ nom est vide alors en entre dans la condition IF
  $errorLastName= '<small class="text-danger">Merci de saisir votre nom</small><br>';
  $error = true;
  }


  if (empty($_POST['prenom'])) {
    $errorFirstName='<small class="text-danger">Merci de saisir votre prénom</small><br>';
   }elseif (iconv_strlen($_POST['prenom'] < 3)) {
    $errorFirstName='<small class="text-danger">Votre prénom est trop court</small><br>';
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
 



   if (iconv_strlen($_POST['phone']) != 10 || !is_numeric($_POST['phone'])) {
    $phone='<small class="text-danger">Format invalide! Ex: 0245778923</small><br>';
    $error = true;

   }


   if (empty($_POST['adress'])) {
    $adress='<small class="text-danger">Merci de saisir votre adresse</small><br>';
    $error = true;

   }


  if (iconv_strlen($_POST['postcode']) != 5 || !is_numeric($_POST['postcode'])) {
    $errorPostcode='<small class="text-danger">Format invalide! Ex: 02400</small><br>';
    $error = true;

   }


   if (empty($_POST['city'])) {
    $city='<small class="text-danger">Merci de saisir votre ville</small><br>';
    $error = true;

   }
 

   if (!isset($error)){

   $validateForm = '<div class="alert alert-success text-center my-3">Formulaire conforme</div><br>';

   //requete d'insertion dans la BDD
   //redirection de page

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
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control    <?php
                if (isset($errorLastName)) {
                 echo $border;
                }
                
                ?>" placeholder="Saisir votre nom" id="nom">
                <?php
                if (isset($errorLastName)) {
                 echo $errorLastName;
                }
                
                ?>
             
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" placeholder="Saisir votre prenom" class="form-control  <?php if (isset($errorFirstName)) {echo $border;}?>" id="prenom">

                <?php if (isset($errorFirstName)) {
                       echo $errorFirstName;
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

            <div class="mb-3">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="text" name="phone" placeholder="Saisir votre numero de téléphone" class="form-control  <?php if (isset($phone)) {echo $border;}?>" id="phone">

                <?php if (isset($phone)) {
                       echo $phone;
                }
           
                ?>
            </div>

            <div class="mb-3">
                <label for="adress" class="form-label">Adresse</label>
                <input type="text" name="adress" placeholder="Saisir votre adresse" class="form-control  <?php if (isset($adress)) {echo $border;}?>" id="adress">

                <?php if (isset($adress)) {
                       echo $adress;
                }
           
                ?>
            </div>

            <div class="mb-3">
                <label for="postcode" class="form-label">Code postal</label>
                <input type="text" name="postcode" placeholder="Saisir votre code postal" class="form-control  <?php if (isset($errorPostcode)) {echo $border;}?>" id="postcode">

                <?php if (isset($errorPostcode)) {
                       echo $errorPostcode;
                }
           
                ?>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" name="city" placeholder="Saisir votre ville" class="form-control   <?php if (isset($city)) {echo $border;}?>" id="city">

                <?php if (isset($city)) {
                       echo $city;
                }
           
                ?>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Valider</button>
           
        </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>