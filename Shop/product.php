<?php
require_once('include/init.php');

// 1 selectionner l'ensemble des produit de la table product

$data = $connect_db->query("SELECT id_product, picture, category, title, price   FROM product");

// echo '<pre>'; print_r($data); echo'</pre>';

// 2 executer une methode (fetch/fetchAll) pour rendre le resultat exploitable sous forme d'array

$products = $data->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>'; print_r($products); echo'</pre>';

// 3 Traitement pour l'affichage (boucle)


//exo: Afficher les produits stockés en BDD
// 1 selectionner l'ensemble des produit de la table product
// 2 executer une methode (fetch/fetchAll) pour rendre le resultat exploitable sous forme d'array
// 3 Traitement pour l'affichage (boucle)
// 4 Prévoir un lien qui redirige vers la page fiche_produit.php pour chaque produits, avec un envoi de l'id_product dans l'URL

require_once('include/header.php');

?>
  <!-- inner page section -->
  <section class="inner_page_head">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <h3>Grille de produits</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end inner page section -->
  <!-- product section -->
  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Nos <span>produits</span></h2>
      </div>
      <div class="row">
    
        <?php foreach ($products as $arrayProduct): ?>
          <div class=" col-sm-6 col-md-4 col-lg-3">
            <div class="box">
              <div class="option_container">
                <div class="options">
                  <a href="fiche_produit.php?id=<?= $arrayProduct['id_product'] ?>" class="option1">Voir le produit</a>
                  <a href="" class="option2">Acheter maintenant</a>
                </div>
              </div>
              <div class="img-box">
                <img src=<?= $arrayProduct['picture'] ?> alt="<?= $arrayProduct['title'] ?>" />
              </div>
              <div class="detail-box">
                <h5><?= $arrayProduct['title'] ?></h5>
                <h6><?= $arrayProduct['price'].'€' ?></h6>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
      <div class="btn-box">
        <a href=""> Voir tous les produits </a>
      </div>
    </div>
  </section>
  <!-- end product section -->
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