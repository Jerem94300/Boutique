<?php
require_once('../include/init.php');

// echo  '<pre>'; print_r($_SESSION); echo'</pre>';

if (!adminConnected()) {
  header('location: '. URL .'index.php');
}



$data = $connect_db->query("SELECT product.reference, product.category, product.title, product.description, product.color, product.size, order_details.quantity, product.price FROM product INNER JOIN order_details INNER JOIN `order` ON product.id_product = order_details.product_id AND `order`.id_order = order_details.order_id");

$products = $data->fetchAll(PDO::FETCH_ASSOC);

$dataOrder = $connect_db->query("SELECT * FROM `order`");
$order = $dataOrder->fetchAll(PDO::FETCH_ASSOC);











echo  '<pre>'; print_r($order); echo'</pre>';


$nbProducts = $data->rowCount();
if($nbProducts <= 1)
$txt = "$nbProducts produit";
else 
  $txt = "$nbProducts produits";




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
      <div class="notification is-primary">
        <button class="delete"></button>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
      </div>
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><span class="mdi mdi-cart-outline"></span>
            </span><?php echo $nbProducts;?> commandes
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table
                class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th class="is-checkbox-cell">
                      <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label>
                    </th>
                    <th></th>
                    <th>Name</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="is-checkbox-cell">
                      <label class="b-checkbox checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label>
                    </td>
                    <td class="is-image-cell">
                      <div class="image">
                        <img
                          src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg"
                          class="is-rounded" />
                      </div>
                    </td>
                    <td data-label="Name"><?php echo $_SESSION['user']['lastName'] ?></td>
                    <td data-label="Firstname"><?php echo $_SESSION['user']['firstName'] ?></td>
                    <td data-label="Email"><?php echo $_SESSION['user']['email'] ?></td>
                    <td data-label="Address"><?php echo $_SESSION['user']['address'] ?></td>
                    <td data-label="City"><?php echo $_SESSION['user']['city'] ?></td>
                   
                    <td data-label="Created">
                      <small
                        class="has-text-grey is-abbr-like"
                        title="Oct 25, 2020">Oct 25, 2020</small>
                    </td>
                    <td class="is-actions-cell">
                      <div class="buttons is-right">
                        <button
                          class="button is-small is-primary"
                          type="button">
                          <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button>
                        <button
                          class="button is-small is-danger jb-modal"
                          data-target="sample-modal"
                          type="button">
                          <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                        </button>
                      </div>
                    </td>
                  </tr>
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

    <section class="section is-main-section">
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><span class="mdi mdi-cart-arrow-down"></span>
            </span>
            Détails commande :  <?php echo $nbProducts . ' produits';?> 
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table
                class="table is-fullwidth is-striped is-hoverable is-fullwidth">
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

                  <?php foreach ($products as $arrayProduct): ?>

                  <tr>
                    <td class="is-checkbox-cell">
                      <label class="b-checkbox
                        checkbox">
                        <input type="checkbox" value="false" />
                        <span class="check"></span>
                      </label>
                    </td>
                    <?php foreach ($arrayProduct as $key => $value): 
                        if ($key != 'id_product'): ?>
                      <td data-label="<?= $key?>"><?= $value?></td>
                    <?php endif;?>

                      <?php if ($key == 'price'): ?>
                        <td data-label="Total"><?= $arrayProduct['price'] * $arrayProduct['quantity']?> €</td>
                    <?php endif; endforeach;?>
                    <td class="is-actions
                      -cell">
                      <div class="buttons is-right">
                        <button
                          class="button is-small is-primary"
                          type="button">
                          <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button>
                        <button
                          class="button is-small is-danger jb-modal"
                          data-target="sample-modal"
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

    <section class="section is-main-section">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Modification commande
          </p>
        </header>
        <div class="card-content">
          <form method="get">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">From</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input class="input" type="text" placeholder="Name" />
                    <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                  </p>
                </div>
                <div class="field">
                  <p
                    class="control is-expanded has-icons-left has-icons-right">
                    <input
                      class="input is-success"
                      type="email"
                      placeholder="Email"
                      value="alex@smith.com" />
                    <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                    <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label"></div>
              <div class="field-body">
                <div class="field is-expanded">
                  <div class="field has-addons">
                    <p class="control">
                      <a class="button is-static">+33</a>
                    </p>
                    <p class="control is-expanded">
                      <input
                        class="input"
                        type="tel"
                        placeholder="Your phone number" />
                    </p>
                  </div>
                  <p class="help">Do not enter the first zero</p>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Department</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select>
                        <option>Business development</option>
                        <option>Marketing</option>
                        <option>Sales</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Subject</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input
                      class="input is-danger"
                      type="text"
                      placeholder="e.g. Partnership opportunity" />
                  </div>
                  <p class="help is-danger">This field is required</p>
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Question</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <textarea
                      class="textarea"
                      placeholder="Explain how we can help you"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label">
                <label class="label">Switch</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <label class="switch is-rounded"><input type="checkbox" value="false" />
                    <span class="check"></span>
                    <span class="control-label">Default</span>
                  </label>
                </div>
              </div>
            </div>
            <hr />
            <div class="field is-horizontal">
              <div class="field-label">
                <!-- Left empty for spacing -->
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="field is-grouped">
                    <div class="control">
                      <button type="submit" class="button is-primary">
                        <span>Submit</span>
                      </button>
                    </div>
                    <div class="control">
                      <button
                        type="button"
                        class="button is-primary is-outlined">
                        <span>Reset</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <?php
    require_once('include/footer.php');
     ?>

