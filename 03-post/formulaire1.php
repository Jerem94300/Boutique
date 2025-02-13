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
  // on pioche dans la supeglobale pour affihcer le nom et prenom
  // autres syntaxe : si nous appelons un array entre "" il ne faut pas mettre de quotes '' dans les crochets(ne fonctionne pas avec un tableau multidimensionnel)
  echo "Nom : " . $_POST['nom'] . '<br>';
  echo "Prenom : $_POST[prenom]<br>";

  if (empty($_POST['nom'])) {
    //si le champ nom est vide alors en entre dans la condition IF
  $errorLastName= '<small class="text-danger">Merci de saisir votre nom</small><br>';
  //declaration du message d'erreur
  }


  if (empty($_POST['prenom'])) {
    $errorFirstName='<small class="text-danger">Merci de saisir votre prénom</small><br>';
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
        <h1 class="text-center">Formulaire 1</h1>
        
        <!-- $_POST -->
         <!-- method : comment vont circuler les données GET ou POST -->
          <!-- attribut name: correspond aux indices du tableau Array $_POST, si on ne le declare pas , on ne recupere pas la valeur de champs -->

        <form method="post" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Saisir votre nom" id="nom">
                <?php
                // La variable $errorLastName n'est définit que lorsque nous avons validé le formulaire et que le champs est vide
                // si la variable est defini je rentre dans la condition IF et affiche son contenu 
                if (isset($errorLastName)) {
                 echo $errorLastName;
                }
                
                ?>
             
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" placeholder="Saisir votre prenom" class="form-control" id="prenom">
                <?php if (isset($errorFirstName)) {
                       echo $errorFirstName;
                }
           
                ?>
            </div>
            
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>