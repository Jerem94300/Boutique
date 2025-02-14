<?php
require_once('include/init.php');



$currentProduct = $connect_db->query("SELECT * FROM product WHERE id_product == $_GET['id']");

echo '<pre>'; print_r($currentProduct); echo'</pre>';





//afficher le produit selectionné dans gestion_boutique selon l'id


require_once('include/header.php');


?>
  <!-- inner page section -->
  <section class="inner_page_head">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <h3>Product Grid</h3>
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
        <h2>Our <span>products</span></h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
          <div class="box">
            <div class="img-box">
              <img src="assets/images-famma/p1.png" alt="" />
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
          <div class="detail-box">
          <?php foreach ($products as $arrayProduct):  ?>
          <?php foreach ($arrayProduct as $key => $value): ;?>
        
        
           
            <h5>
              <?php if(isset($_GET['id']) && $_GET['id'] == isset($key['id_product'])): ?>
              <?= $key['title'];?>
            </h5>

            <h6>$75</h6>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
          <?php endforeach; ?>

          
           <!-- Inserer un formulaire avec un bouton select pour selectionner la quantite -->
          <form method="post" action="">
          <div class="form-group">
              <label for="quantity">Quantité</label>
              <select class="form-control" id="quantity" name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
        </form>
        
        </div>

      

      </div>
      <div class="btn-box">
        <a href=""> View All products </a>
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