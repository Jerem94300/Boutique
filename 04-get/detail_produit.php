<?php
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';
// Les données transmisent dans l'URL sont automatiquement stockées en PHP dans la superglobale $_GET sous forme de tableau ARRAY 

// Array ( [id] => 243 [article] => chaussure [couleur] => jaune [prix] => 45 )






//exo : Afficher successivement les données des produits en passant par la superglobal $_GET
//si l'article n'est pas définit on entre dans la condition IF
if(!isset($_GET['id']) || !isset($_GET['article']) || !isset($_GET['couleur'])|| !isset($_GET['prix'])){
    //on redirige vers la page d'accueil
    //header() permet d'executer une redirection http on doit lui fournir l'url de destination ( pas d'espace entre location et les :)
    header('Location: index.php');
}

echo "Ref : $_GET[id]<br>";
echo "Article : $_GET[article]<br>";
echo "Couleur : $_GET[couleur]<br>";
echo "Prix : $_GET[prix]<br>";

//avec la bouckle foreach sans l'id

foreach ($_GET as $key) {
  if ($key != $_GET['id']) {
    echo "<br>$key<br>";

  }
}

foreach ($_GET as $key => $value) {
  if ($key != 'id') {
    //ucfirst mets la premiere lettre en majuscule : UpperCase first
    echo ucfirst($key)." : $value<br>";

  }
}





?>
