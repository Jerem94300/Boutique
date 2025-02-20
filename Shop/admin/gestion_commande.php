<?php
require_once('../include/init.php');

 echo  '<pre>'; print_r($_POST); echo'</pre>';
 echo  '<pre>'; print_r($_GET); echo'</pre>';

if (!adminConnected()) {
  header('location: '. URL .'index.php');
}







$data = $connect_db->query("SELECT order.id_order AS 'Order', product.reference, product.category, product.title, product.description, product.color, product.size, order_details.quantity, product.price FROM product INNER JOIN order_details INNER JOIN `order` ON product.id_product = order_details.product_id AND `order`.id_order = order_details.order_id");

$products = $data->fetchAll(PDO::FETCH_ASSOC);
// echo  '<pre>'; print_r($products); echo'</pre>';


$dataOrder = $connect_db->query("SELECT order.id_order AS 'Order', user.lastName, user.firstName , user.email, user.city, order.state, order.date FROM user INNER JOIN `order` ON user.id_user = order.user_id");
$order = $dataOrder->fetchAll(PDO::FETCH_ASSOC);
// echo  '<pre>'; print_r($order); echo'</pre>';


// echo  '<pre>'; print_r($order); echo'</pre>';






$nbProducts = $data->rowCount();
if($nbProducts <= 1)
$txt = "$nbProducts produit";
else 
  $txt = "$nbProducts produits";





  $nbOrder = $dataOrder->rowCount();
if($nbOrder <= 1)
$txtOrder = "$nbOrder produit";
else 
  $txtOrder = "$nbOrder produits";




  if(isset($_GET['action']) && $_GET['action'] == 'update'){
    $dataNew = $connect_db->prepare("SELECT order.id_order AS 'Order', user.lastName, user.firstName, user.email, user.city, order.state, order.date FROM user INNER JOIN `order` ON user.id_user = order.user_id AND id_order = :id");
    $dataNew->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $dataNew->execute();

    $orderSelected = $dataNew->fetch(PDO::FETCH_ASSOC);
  // echo '<pre>'; print_r($orderSelected); echo'</pre>';
}




  foreach ($_POST as $key => $value) {

    if ($key == 'state') {
      $dataUpdate = $connect_db->prepare("UPDATE `order` SET state = :state WHERE id_order = :id");
      $dataUpdate->bindValue('state', $value, PDO::PARAM_STR);
      $dataUpdate->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
      $dataUpdate->execute();
      header('location: '. URL .'admin/gestion_commande.php');
    }
  
  
  
  }
  
  


require_once('include/header.php');
  ?>
    


    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li><?php echo $_SESSION['user']['roles']?></li>
              <li>Commandes</li>
            </ul>
          </div>
        </div>
        <!-- <div class="level-right">
            <div class="level-item">
              <div class="buttons is-right">
                <a
                  href="https://github.com/vikdiesel/admin-one-bulma-dashboard"
                  target="_blank"
                  class="button is-primary"
                >
                  <span class="icon"
                    ><i class="mdi mdi-github-circle"></i
                  ></span>
                  <span>GitHub</span>
                </a>
              </div>
            </div>
          </div> -->
      </div>
    </section>
    <section class="section is-main-section">
      <div class="notification is-primary ">
        <button class="delete"></button>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
      </div>
      <div class="card has-table ">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><span class="mdi mdi-cart-outline"></span>
            </span><?php echo $nbOrder;?> commandes
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
              <div class="b-table has-pagination">
                <div class="table-wrapper has-mobile-cards">
                  <table
                    class="table is-fullwidth is-striped is-hoverable is-fullwidth ">
                    <thead >
                      <tr>
                        <th class="is-checkbox-cell">
                          <label class="b-checkbox checkbox">
                            <input type="checkbox" value="false" />
                            <span class="check"></span>
                          </label>
                        </th>
                        <?php for($i=0; $i < $dataOrder->columnCount(); $i++): 
                            $dataColumn = $dataOrder->getColumnMeta($i);
                            if ($dataColumn['name'] != 'id_product'): ?>

                          <th><?= ucFirst($dataColumn['name'])?></th>
                        

                        <?php endif; endfor;?>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order as $arrayOrder): ?>
                      <tr class= "d-flex text-center justify-content-center ">
                        <td class="is-checkbox-cell is-center">
                          <label class="b-checkbox checkbox">
                            <input type="checkbox" value="false" />
                            <span class="check"></span>
                          </label>
                        </td>
                        <td>FAMMS <?=$arrayOrder['Order'];?></td>
                        <td><?=$arrayOrder['lastName'];?></td>
                        <td><?=$arrayOrder['firstName'];?></td>
                        <td><?=$arrayOrder['email'];?></td>
                        <td><?=$arrayOrder['city'];?></td>
                        <td>
                        <form method="post">
                          <div class="select is-primary">
                            <select name="state">
                              <option value="pending">En attente</option>
                              <option value="treatment">En traitement</option>
                              <option value="send">Envoyé</option>
                              <option value="completed">Terminé</option>
                              <option value="cancelled">Annulé</option>
                            </select>
                          </div>
                          <button class="button is-link" type="sumbmit">Valider</button>
                        </form></td>
                        <td><?=$arrayOrder['date'];?></td>
                  

                      
                        <td class="is-actions-cell">
                        <div class="buttons is-center">
                            <a href="?action=update&id=<?= $arrayOrder['Order'] ?>"
                              class="button is-small is-primary"
                              type="">
                              <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a>
                            <button
                              class="button is-small is-danger jb-modal"
                              data-target="sample-modal-<?= $arrayOrder['Order'] ?>"
                              type="button">
                              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <!-- <div class="notification">
                    <div class="level">
                      <div class="level-left">
                        <div class="level-item">
                          <div class="buttons has-addons">
                            <button type="button" class="button is-active">
                              1
                            </button>
                            <button type="button" class="button">2</button>
                            <button type="button" class="button">3</button>
                          </div>
                        </div>
                      </div>
                      <div class="level-right">
                        <div class="level-item">
                          <small>Page 1 of 3</small>
                        </div>
                      </div>
                    </div>
                  </div> -->
              </div>
         
        </div>
      </div>
    </section>

    <?php if (isset($_GET['action']) && $_GET['action'] === 'update'): ?> 
    <section class="section is-main-section">
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><span class="mdi mdi-cart-arrow-down"></span>
            </span>
            Détails commande
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content is-justify-content-center is-align-items-center ">
          
          <div class="b-table has-pagination ">
            <div class="table-wrapper has-mobile-cards">
              <table
                class="table is-fullwidth is-striped is-hoverable is-fullwidth ">
                <thead>
                  <tr>
                    <th class="is-checkbox-cell">
                      <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label>
                    </th>
                    <?php for($i=0; $i < $data->columnCount(); $i++): 
                        $dataColumn = $data->getColumnMeta($i);
                        if ($dataColumn['name'] != 'id_product'): ?>

                      <th><?= ucFirst($dataColumn['name'])?></th>
                     

                    <?php endif; endfor;?>
                    <th>Total</th>
                  </tr>
                
                </thead>
                <tbody>

                  <?php foreach ($products as $arrayProduct):?>

                    <?php if ($arrayProduct['Order'] == $_GET['id']): ?>
                  <tr>
                    <td class="is-checkbox-cell ">
                      <label class="b-checkbox
                        checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label>
                    </td>
                    <?php foreach ($arrayProduct as $key => $value):
                 

                        if ($key == 'Order') : ?>
                      <td data-label="<?= $key?>">FAMMS <?= $value?></td>
                    <?php endif;?>

                    <?php if ($key == 'reference'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                    <?php if ($key == 'category'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                    <?php if ($key == 'title'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                    <?php if ($key == 'description'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                    <?php if ($key == 'color'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                    <?php if ($key == 'size'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                    <?php if ($key == 'quantity'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                    <?php if ($key == 'price'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>
                      <?php if ($key == 'price'): ?>
                        <td data-label="Total"><?= $arrayProduct['price'] * $arrayProduct['quantity']?> €</td>
                    <?php endif; endforeach;?>
                   
                  </tr>
                  <?php endif;?>

                  <?php endforeach;?>
                </tbody>


              </table>
            </div>
            <!-- <div class="notification">
                <div class="level">
                  <div class="level-left">
                    <div class="level-item">
                      <div class="buttons has-addons">
                        <button type="button" class="button is-active">
                          1
                        </button>
                        <button type="button" class="button">2</button>
                        <button type="button" class="button">3</button>
                      </div>
                    </div>
                  </div>
                  <div class="level-right">
                    <div class="level-item">
                      <small>Page 1 of 3</small>
                    </div>
                  </div>
                </div>
              </div> -->
          </div>
        </div>
      </div>
    </section>

    <?php endif; ?>

    <?php
    require_once('include/footer.php');
     ?>

