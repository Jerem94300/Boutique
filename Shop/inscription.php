<?php
  require_once('include/init.php');




echo '<prev>';
print_r($_POST);
echo '</prev>';


if (isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD'] === 'POST') {

  $data = $connect_db->prepare("SELECT * FROM user WHERE email = :email ");
  $data->bindValue(':email', $_POST['email'],PDO::PARAM_STR);
  $data->execute();
// echo $data->rowCount();
 
  if ($data->rowCount()) {
    $errorVerifEmail = '<small class="text-danger">Email déjà utilisé</small><br>';
  } elseif (empty($_POST['email'])) {
    $errorVerifEmail ='<small class="text-danger">Merci de saisir une adresse email</small><br>';
  } elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
  $errorVerifEmail='<small class="text-danger">Erreur Email ! Ex: exemple@gmail.com</small><br>';
  }

  $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 

  if (empty($_POST['password'])) {
  $errorPassWords= '<small class="text-danger">Merci de saisir un mot de passe</small><br>';
  }elseif (!preg_match($password_regex, $_POST['password'])) {
    $errorSubject= '<small class="text-danger">Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial</small><br>';
  }elseif (($_POST['password']) !== ($_POST['repeat_password'])) {
    $errorRepeatPassWords= '<small class="text-danger">Les mots de passe ne correspondent pas</small><br>';
  }else {
    $validatePassWords= '<small class="text-success">Mot de passe valide</small><br>';
  }


 
}
// if (!isset($error)) {
//   $result = $connect_db->prepare("INSERT INTO user (firstName, lastName, email, address, city, zipcode, password) VALUES (:firstName, :lastName, :email, :address, :city, :zipcode, :password)");
//   $result->execute(array(
//     ':firstName' => $_POST['firstName'],
//     ':lastName' => $_POST['lastName'],
//     ':email' => $_POST['email'],
//     ':address' => $_POST['address'],
//     ':city' => $_POST['city'],
//     ':zipcode' => $_POST['zipcode'],
//     ':password' => $password
//   ));
//   echo '<div class="alert alert-success">Votre compte a bien été créé</div>';

// }

//exo : Controler que l'on receptionne bien les données saisies dans le formulaire
//: Controler la disponibilité de l'email (SELECT + rowCount())
/// Afficher un message d'erreur si le champs email est vide
//controler la validite de l'email(filter_var())
//Afficher un message si le champs mot de passe est vide
//Controler que les mots de passes correspondent



require_once('include/header.php');

?>
  <!-- inner page section -->
  <section class="inner_page_head">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <h3>Créer votre compte</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end inner page section -->
  <!-- why section -->
  <section class="why_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="full">
            <form method="post" action="">
              <fieldset>
                <input
                  type="text"
                  placeholder="Enter votre prénom"
                  name="firstName"
                   />
                <input
                  type="text"
                  placeholder="Enter votre nom"
                  name="lastName"
                   />

                   <?php if (isset($errorVerifEmail )) {
                       echo $errorVerifEmail ;
                  }
           
                  ?>

                <input
                  type="text"
                  placeholder="Entrez votre adresse e-mail"
                  name="email" class=" <?php if (isset($errorVerifEmail )) echo "border-danger" ;?>"value=" <?php if (isset($errorVerifEmail )) echo $_POST['email'] ;?>"
                  />
                <input
                  type="text"
                  placeholder="Entrer votre adresse"
                  name="address"
                   />
                <input
                  type="text"
                  placeholder="Entrer votre ville"
                  name="city"
                   />
                <input
                  type="text"
                  placeholder="Entrer votre code postal"
                  name="zipcode"
                   />
                   <?php if (isset($errorSubject )) {
                       echo $errorSubject ;
                }
           
                ?>

                <?php if (isset($errorPassWords )) {
                       echo $errorPassWords ;
                }
           
                ?>
               
                <input
                  type="password"
                  placeholder="Enter votre mot de passe"
                  name="password" class="<?php if (isset($errorPassWords )) echo "border-danger" ;?>"
                   />
                 
                   <?php if (isset($errorRepeatPassWords )) {
                       echo $errorRepeatPassWords ;
                }
           
                ?>
                
                <input
                  type="password"
                  placeholder="Répétez votre mot de passe"
                  name="repeat_password" class="<?php if (isset($errorRepeatPassWords )) echo "border-danger" ;?>"
                  />

                  <?php if (isset($validatePassWords )) {
                       echo $validatePassWords ;
                  }
           
                ?>
                  
                <input type="submit" name="submit" />
              </fieldset>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end why section -->
  <!-- arrival section -->
  <!-- end arrival section -->
  <!-- footer section -->
  <?php
require_once('include/footer.php');

?>
  <!-- footer section -->
  <!-- jQery -->
  <script src="assets/js-famma/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="assets/js-famma/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="assets/js-famma/bootstrap.js"></script>
  <!-- custom js -->
  <!-- <script src="assets/js-famma/custom.js"></script> -->
</body>

</html>