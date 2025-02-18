<?php
require_once('include/init.php');

//eviter les erreur en cas de modification d'id dans URL
//si l'id est defini dans l'URL 
if(isset($_GET['id'])){

  $data = $connect_db->prepare("SELECT * FROM product WHERE id_product = :id" );
  $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $data->execute();

//si la requete ne retourne aucuns resultat, on redirige vers index
if (!$data->rowCount()) {
  header("location: index.php");
}


$product = $data->fetch(PDO::FETCH_ASSOC);

// echo '<pre>'; print_r($product); echo'</pre>';

}else{
  //sinon on redirige vers l'index
  header("location: index.php");
}






//afficher le produit selectionné dans gestion_boutique selon l'id


require_once('include/header.php');


?>
  <!-- inner page section -->
  <section class="inner_page_head">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <h3>Informations article</h3>
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
        <h2><span><?= $product['title']?></span></h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
          <div class="box">
            <div class="img-box">
              <img src="<?= $product['picture']?>" alt="<?= $product['title']?>" />
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
          <div class="detail-box">
            <h5><?= ucfirst($product['title'])?></h5>
            <h6>Référence : <?= $product['reference']?></h6>
            <h6>Catégorie : <?= $product['category']?></h6>
            <h6>Taille : <?= $product['size']?></h6>
            <h6>Genre : <?= $product['public']?></h6>
            <h6>Couleur : <?= $product['color']?></h6>
            <h6>Description : <?= $product['description']?></h6>

            <h5><strong><?= $product['price']?> €</strong></h5>

            <?php if ($product['stock'] > 0): ?>

              <form method="post" action="panier.php" class="d-flex align-items-center justify-content-start gap-2">
                    <input type="hidden" name="id_product" value = "<?= $product['id_product']?> ">
                      <!-- <label for="quantity">Quantité</label> -->
                      <select class="form-control col-2 mr-2" id="quantity" name="quantity">
                        <?php for ($i = 1; $i <= $product['stock'] && $i <= 10; $i++): ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor;?>
                      </select>
                    <input type="submit" name="add_cart" value="Ajouter au panier" class="m-0">
              </form>
              <?php else : ?>
                
                <strong class="error-color-danger">Produit en rupture de stock</strong>

            <?php endif;?>
          </div>
      
        
        </div>

      

      </div>
      <div class="btn-box">
        <a href="product.php"> Voir tous les produits </a>
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