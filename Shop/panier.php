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

header('location: panier.php');
}

// // supprimer un produit du panier

// if (isset($_GET['action']) && $_GET['action'] == 'delete') {
//   removeProductFromCart($_GET['id']);
//   header('location: panier.php');
// }

// //vider le panier

// if (isset($_GET['action']) && $_GET['action'] == 'empty') {
//   unset($_SESSION['cart']);
// }



if(isset($_POST['payForCart'])){

  for ($i=0; $i < count($_SESSION['cart']['id_product']); $i++) { 
    $data = $connect_db->query("SELECT* FROM product WHERE id_product = ".$_SESSION['cart']['id_product'][$i]);
    $product = $data->fetch(PDO::FETCH_ASSOC);

    // echo '<pre>'; print_r($product); echo'</pre>';

   
      //si la quantité en stock en BDD est inférieure
    if($product['stock'] < $_SESSION['cart']['quantity'][$i] ){

      $error = '';
      $error .= '<div class="alert alert-danger text-center">Stock restant du produit : ' .$_SESSION['cart']['title'][$i]. ': <strong>' .$product['stock']. '</strong></div>';

      $error .= '<div class="alert alert-warning text-center mt-2">Quantité commandée : <strong>' .$_SESSION['cart']['quantity'][$i].'</strong></div>';

      if ($product['stock'] > 0) {
        //le stock est inferieur à la quantité demandée, on met à jour la quantité dans le panier
        $_SESSION['cart']['quantity'][$i] = $product['stock'];
        $error .= '<div class="alert alert-success text-center mt-2">La quantité du produit ' .$_SESSION['cart']['title'][$i]. ' a été mise à jour à <strong>' .$product['stock']. '</strong></div>';


      }else{
        //le stock est à 0, on supprime le produit du panier
        $error .= '<div class="alert alert-danger text-center mt-2">Le produit ' .$_SESSION['cart']['title'][$i]. ' a été supprimé du panier car il n\'est plus disponible en stock</div>';

        removeProductFromCart($_SESSION['cart']['id_product'][$i]);
        $i--; //on décrémente la boucle après la suppression car array_splice supprime l'article dans le tableau et remontent les indices inférieures vers les indices superieurs cela permets de ne pas oublier de controler un article qui aurait changé d'indice
      
      }


    }

  }

      // Requete d'insertion commande

      if (empty($error)) {
        $data = $connect_db->exec("INSERT INTO `order` (user_id, rising, date, state) VALUE (" . $_SESSION['user']['id_user'] . ", " . totalAmount(). ", NOW(), 'treatment')");

        //on recupere le dernier id généré en BDD l'id de la commande inséré en BDD pour l'enregistrer dans la table SQL order_detail afin de lie chaque produit à la bonne commande

        $idOrder = $connect_db->lastInsertId();
        // print_r($idOrder);

        for ($i=0; $i < count($_SESSION['cart']['id_product']) ; $i++) { 
          $data = $connect_db->exec("INSERT INTO `order_details` (order_id, product_id, quantity, price) VALUES ($idOrder, " . $_SESSION['cart']['id_product'][$i] ."," . $_SESSION['cart']['quantity'][$i] . "," . $_SESSION['cart']['price'][$i] .")");
   

        $data = $connect_db->exec("UPDATE product SET stock = stock - " . $_SESSION['cart']['quantity'][$i] . " WHERE id_product = " . $_SESSION['cart']['id_product'][$i]);

      }

      unset($_SESSION['cart']);
      $_SESSION['msgValidateOrder'] = "<div class='alert alert-success text-center'> La commande a été prise en compte. Numéro de commande <strong>FAMMS$idOrder</strong></div>";
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
      <?php if (isset($error)) echo $error;
      if (isset($_SESSION['msgValidateOrder'])) echo $_SESSION['msgValidateOrder'];
      unset($_SESSION['msgValidateOrder']);
       ?>

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
