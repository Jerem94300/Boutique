<?php
require_once('../include/init.php');

if (!adminConnected()) {
  header('location: '. URL .'index.php');
}



//Afficher tous les produits en rupture de stock


$resultat = executeRequete("SELECT * FROM product WHERE stock = 0");

$produits = $resultat->fetchAll(PDO::FETCH_ASSOC);

//Message si aucun produit en rupture de stock

$msgStockDanger = "";
if(empty($produits)){
  $msgStockDanger .= ' <h1 class="subtitle is-1 has-background-success has-text-centered">Aucun produit en rupture de stock</h1>';
}




//Afficher les produits bientôt en rupture de stock entre 1 et 5



$resultatWarning = executeRequete("SELECT * FROM product WHERE stock BETWEEN 1 AND 5");

$produitsWarning = $resultatWarning->fetchAll(PDO::FETCH_ASSOC);

//Message si aucun produit bientôt en rupture de stock

$msgStockWarning= "";
if(empty($produitsWarning)){
  $msgStockWarning .= ' <h1 class="subtitle is-1 has-background-success has-text-centered">Le stock des produits est suffisant</h1>';
}



//Afficher le nombre de clients

$resultat = executeRequete("SELECT COUNT(*) FROM user WHERE roles = 'user'");

$nbClients = $resultat->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($nbClients);
// echo '</pre>';

//Afficher le montant total des ventes

$resultatSell = executeRequete("SELECT SUM(price) FROM order_details");

$montantVentes = $resultatSell->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($montantVentes);
// echo '</pre>';


$dataSell = executeRequete("SELECT*FROM order_details INNER JOIN product ON order_details.product_id = product.id_product");


$resultatBestSell = $dataSell ->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($resultatBestSell);
// echo '</pre>';

//Compter dans $resultatBestSell le nombre de vente pour chaque produit en affichant le nom du produit et la reference du produit

$bestSell = [];
foreach ($resultatBestSell as $key => $value) {
  if(array_key_exists($value['product_id'], $bestSell)){
    $bestSell[$value['product_id']]['total'] += $value['quantity'];
  }else{
    $bestSell[$value['product_id']]['total'] = $value['quantity'];
    $bestSell[$value['product_id']]['product_id'] = $value['product_id'];
  }
}

// echo '<pre>';
// print_r($bestSell);
// echo '</pre>';


// Afficher le renseignement du produit le plus vendu

//max() permet de trouver la valeur la plus élevée dans un tableau
$bestSell = max($bestSell);

// echo '<pre>';
// print_r($bestSell);
// echo '</pre>';

//Afficher le nom du produit le plus vendu et la reference du produit

$bestSell = executeRequete("SELECT title, reference FROM product WHERE id_product = $bestSell[product_id]");
$bestSell = $bestSell->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($bestSell);
// echo '</pre>';


require_once('include/header.php');
  ?>
    
    
    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Admin</li>
              <li>Dashboard</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="hero is-hero-bar">
      <div class="hero-body">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <h1 class="title">Dashboard</h1>
            </div>
          </div>
          <div class="level-right" style="display: none">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="section is-main-section">
      <div class="tile is-ancestor">
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label has-text-centered">
                    <h3 class="subtitle is-spaced"> Clients</h3>
                    <h1 class="title mt-2"><?php echo $nbClients[0]['COUNT(*)']?></h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon">
                    <span class="icon has-text-primary is-large"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced has-text-centered">Sales</h3>
                    <h1 class="title mt-2"><?php echo $montantVentes[0]['SUM(price)']?> €</h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon">
                    <span class="icon has-text-info is-large"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced has-text-centered"><i class="far fa-star has-text-warning	"></i>Best seller <i class="far fa-star has-text-warning	"></i></h3>
                    <!-- strtoupper == Uppercase -->
                    <h4 class="title has-text-centered mt-2"><?php echo strtoupper($bestSell[0]['title'])?></h4>
                    <h4 class="title has-text-centered">Ref : <?php echo $bestSell[0]['reference']?></h4>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon">
                    <span class="icon has-text-success is-large"><i class="mdi mdi-finance mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- On affiche la div que SI on entre dans la condition uniquement si le stock est egale a 0 -->

      <?php if(!empty($produits)): ?>

      <div class="card has-table has-mobile-sort-spaced">
        <header class="card-header">
          <p class="card-header-title  has-background-danger">
            <span class="icon	"><i class="fas fa-tshirt"></i>&nbsp</span>
            Produits en rupture de stock
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content has-text-centered">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table
                class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth ">
                <thead >
                  <tr >
                    <th class="has-text-centered">Reference</th>
                    <th class="has-text-centered">Category</th>
                    <th class="has-text-centered">Title</th>
                    <th class="has-text-centered">Color</th>
                    <th class="has-text-centered">Size</th>
                    <th class="has-text-centered">Action</th>
                  </tr>
                </thead>
                <tbody class="has-text-centered">
                  <?php
                  foreach ($produits as $produit) {
                    echo '<tr>';
                    //affichage de la photo
                    echo '<td>'. $produit['reference'] .'</td>';
                    echo '<td>'. $produit['category'] .'</td>';
                    echo '<td>'. $produit['title'] .'</td>';
                    echo '<td>'. $produit['color'] .'</td>';
                    echo '<td>'. $produit['size'] .'</td>';
                    echo '<td class="is-actions-cell">';
                    echo '<div class="buttons is-centered">';
                    echo '<a href="gestion_boutique.php?id_product='. $produit['id_product'] .'" class="button is-small is-primary" title="Edit">';
                    echo '<span class="icon is-small"><i class="mdi mdi-pencil"></i></span>';
                    echo '</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                

                  }
                  ?>
                    
                 
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

      <?php endif; ?>

      <?php echo $msgStockDanger; ?>

      
      <br>
      <br>
      <br>
      <br>

            <!-- On affiche la div que SI on entre dans la condition uniquement si le stock est egale est entre 1 et 5 -->

      <?php if(!empty($produitsWarning)): ?>


      <div class="card has-table has-mobile-sort-spaced">
        <header class="card-header">
          <p class="card-header-title  has-background-warning">
            <span class="icon	"><i class="fas fa-tshirt"></i>&nbsp</span>
            Produits bientôt en rupture de stock
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content has-text-centered">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table
                class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth ">
                <thead >
                  <tr >
                    <th class="has-text-centered">Reference</th>
                    <th class="has-text-centered">Category</th>
                    <th class="has-text-centered">Title</th>
                    <th class="has-text-centered">Color</th>
                    <th class="has-text-centered">Size</th>
                    <th class="has-text-centered">Stock</th>
                    <th class="has-text-centered">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($produitsWarning as $produit) {
                    echo '<tr>';
                    //affichage de la photo
                    echo '<td>'. $produit['reference'] .'</td>';
                    echo '<td>'. $produit['category'] .'</td>';
                    echo '<td>'. $produit['title'] .'</td>';
                    echo '<td>'. $produit['color'] .'</td>';
                    echo '<td>'. $produit['size'] .'</td>';
                    echo '<td>'. $produit['stock'] .'</td>';
                    echo '<td class="is-actions-cell">';
                    echo '<div class="buttons is-centered">';
                    echo '<a href="gestion_boutique.php?id_product='. $produit['id_product'] .'" class="button is-small is-primary" title="Edit">';
                    echo '<span class="icon is-small"><i class="mdi mdi-pencil"></i></span>';
                    echo '</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                  }
                  ?>
                 
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

      <?php endif; ?>

      <?php echo $msgStockWarning; ?>
    </section>
    <footer class="footer">
      <div class="container-fluid">
        <div class="level">
          <div class="level-left">
            <div class="level-item">© 2025, Jérémy ABELARD</div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <div id="sample-modal" class="modal">
    <div class="modal-background jb-modal-close"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Confirm action</p>
        <button class="delete jb-modal-close" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <p>This will permanently delete <b>Some Object</b></p>
        <p>This is sample modal</p>
      </section>
      <?php
    require_once('include/footer.php');
     ?>

