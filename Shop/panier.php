<?php
require_once('include/init.php');

// echo '<pre>'; print_r($_POST); echo'</pre>';

if (isset($_POST['add_cart'])) {
 $data = $connect_db->prepare("SELECT * FROM product WHERE id_product = :id");
 $data->bindValue(':id', $_POST['id_product'], PDO::PARAM_INT);
 $data->execute();

 $product = $data->fetch(PDO::FETCH_ASSOC);
//  echo '<pre>'; print_r($product); echo'</pre>';

 addProductToCart($product['id_product'],$product['title'],$product['picture'],$product['reference'],$_POST['quantity'],$product['price']);
//  echo '<pre>'; print_r($_SESSION); echo'</pre>';

header('location:panier.php');
}

if(isset($_POST['payForCart'])){
  echo 'Paiement effectué';

  for ($i=0; $i < count($_SESSION['cart']['id_product']); $i++) { 
    $data = $connect_db->query("SELECT* FROM product WHERE id_product = ".$_SESSION['cart']['id_product'][$i]);
    $product = $data->fetch(PDO::FETCH_ASSOC);

    echo '<pre>'; print_r($product); echo'</pre>';
   
  }

}

require_once('include/header.php');


?>
  <!-- inner page section -->
  <section class="inner_page_head">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <h3>Votre panier</h3>
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
        <h2>Validez vos<span> Achats !</span></h2>
      </div>
      <div class="row">

      <table class="table ">
        <thead class= "text-center">
          <th>Titre</th>
          <th>Image</th>
          <th>Référence</th>
          <th>Quantité</th>
          <th>Prix unitaire</th>
          <th>Prix total</th>
        </thead>
        <tbody>
          
        <?php if (empty($_SESSION['cart']['id_product'])): ?>

          <tr>
            <td colspan="6" class="text-center">Votre panier est vide</td>
          </tr>

          <?php else:


           for ($i=0; $i < count($_SESSION['cart']['id_product']); $i++): ?>

            <tr class="text-center">
              <td><?= ucfirst($_SESSION['cart']['title'][$i]); ?></td>
              <td><img src="<?= $_SESSION['cart']['picture'][$i]?>" class="picture_product" alt="<?= $_SESSION['cart']['title'][$i]?>"></td>
              <td><?= $_SESSION['cart']['reference'][$i];?></td>
              <td><?= $_SESSION['cart']['quantity'][$i];?></td>
              <td><?= $_SESSION['cart']['price'][$i];?>€</td>

              <td><strong><?= $_SESSION['cart']['quantity'][$i]*$_SESSION['cart']['price'][$i];?>€</strong></td>

              <td><a href=""class="btn btn-danger" ><i class="fa-solid fa-trash"></i></a></td>



            </tr>
            <?php endfor; ?>

            <tr>
              <th>MONTANT TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th class="text-center "><?= totalAmount(); ?>€</th>
            </tr>

            <?php endif; ?>
        </tbody>




    
      </table>
    
      </div>

      <?php if (!empty($_SESSION['cart']['id_product'])): ?>

        <div class="btn-box">
          <?php if(userConnected()):?>
            <form action="" method="post">
              <input type="submit" name="payForCart" value="Valider le panier" class="btn btn-success">
            </form>
            <?php else: ?>
              <p>Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> pour valider votre panier</p>
          <?php endif; ?>
        </div>

      <?php endif; ?>


      <div class="btn-box">
        <a href="product.php"> Continuez vos achats </a>
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