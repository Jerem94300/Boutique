<?php
echo '<prev>';
print_r($_POST);
echo '</prev>';


$bddBibliotheque = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


if ($_POST ) {
    echo "Prenom : " . $_POST['firstName'] . '<br>';



        $postAbonne= $bddBibliotheque->exec("INSERT INTO abonne (id_abonne, prenom) VALUES(NULL,'$_POST[firstName]')");

}



// Affichage abonnes

$result = $bddBibliotheque->query('SELECT * FROM abonne');

$arrayAbonne = $result->fetchAll(PDO::FETCH_ASSOC);


echo ' <h1 class="text-center">Bibliothèque</h1>';
echo ' <h2 class="text-center">ABONNES</h2>';


echo '<table class="table table-dark table-striped">';
echo '<tr>';

echo "<a href='affichage_abonnes.php'>Abonnes</a> &nbsp";
echo "<a href='affichage_emprunt.php'>Emprunts</a> &nbsp";
echo "<a href='affichage_livres.php'>Livres</a>";


for ($i=0; $i < $result->columnCount(); $i++) { 
    $column = $result->getColumnMeta($i);
    echo '<th>' . $column['name'] . '</th>';
}
echo "<th>Modifier</th>";
echo "<th>Supprimer</th>";
echo '</tr>';

echo '<tr>';
foreach ($arrayAbonne as $key => $array) {
    echo '<tr>';
    foreach ($array as $key2 => $value) {
        echo '<td>' . $value . '</td>';

    }
    echo "<td><a href='?action=update&id=$array[id_abonne]'>Modifier</a></td>";
    echo "<td><a href='?action=delete&id=$array[id_abonne]'>Supprimer</a></td>";
    echo '</tr>';
  
}
echo '</table>';

echo ' <br>';


// suppression abonne 


$id = $_GET['id'];
$action = $_GET['action'];



if ($action == 'delete') {
    $bddBibliotheque->query("DELETE FROM abonne WHERE id_abonne = $id  ");

}


//modification abonne

if (isset($_GET['id'], $_GET['action']) && $_GET['action'] === 'update') {
    $id = intval($_GET['id']);

    $stmt = $bddBibliotheque ->prepare("SELECT * FROM abonne WHERE id_abonne = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
     
        $prenom = htmlspecialchars($data['prenom']);

    } else {
        echo "Aucun enregistrement trouvé pour l'ID fourni.";
        exit;

    }

}

?>







<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>11-TP2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
       

    <form method="post" action="">
       
             
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prenom</label>
                <input type="text" name="firstName" placeholder="Saisir le prenom" class="form-control" id="firstName"  value="<?php echo $prenom ?>">
     
            </div>
         
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>

        


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>