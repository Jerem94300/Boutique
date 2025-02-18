<?php
require_once('include/init.php');
// echo  '<pre>'; print_r($_SESSION); echo'</pre>';

if(!userConnected()){
  header('location:index.php');

}




// exo créer une fiche utilisateur quii regroupe les informations personnelles de l'utilisateur en passant par le fichier session




require_once('include/header.php');




?>
    <!-- end header section -->
  <!-- inner page section -->
  <section class="inner_page_head">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <h3>Mes informations personnelles</h3>
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
          <div class="full ">

          <div class="card border-primary bg-primary text-white  mb-3 text-center">
            <div class="card-header d-flex bg-primary text-white text-center justify-content-between">
              <h4 class="card-title">Prénom :</h4>
              <p> <?php echo $_SESSION['user']['firstName'] ?></p>
            </div>
            <div class="card-header d-flex bg-primary text-white text-center justify-content-between">
              <h4 class="card-title">Nom :</h4>
              <p> <?php echo $_SESSION['user']['lastName'] ?></p>
            </div>
            <div class="card-header d-flex bg-primary text-white text-center justify-content-between">
              <h4 class="card-title">Email :</h4>
              <p> <?php echo $_SESSION['user']['email'] ?></p>
            </div>
            <div class="card-header d-flex bg-primary text-white text-center justify-content-between">
              <h4 class="card-title">Ville :</h4>
              <p> <?php echo $_SESSION['user']['city'] ?></p>
            </div>
            <div class="card-header d-flex bg-primary text-white text-center justify-content-between">
              <h4 class="card-title">Code Postale :</h4>
              <p> <?php echo $_SESSION['user']['zipcode'] ?></p>
            </div>
            <div class="card-header d-flex bg-primary text-white text-center justify-content-between">
              <h4 class="card-title">Adresse :</h4>
              <p> <?php echo $_SESSION['user']['address'] ?></p>
            </div>

            <?php if(adminConnected()):?>
              <p> <?php echo "Vous êtes administrateur"?></p>

              <?php endif; ?>
          </div>



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

</body>

</html>