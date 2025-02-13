<?php
echo '<prev>';
print_r($_POST);
echo '</prev>';


$bddRepertoire = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);



if ($_POST ) {

    echo "Nom : " . $_POST['lastName'] . '<br>';
    echo "Prenom : " . $_POST['firstName'] . '<br>';
    echo "Numero de téléphone : " . $_POST['phone'] . '<br>';
    echo "Profession : " . $_POST['job'] . '<br>';
    echo "Ville : " . $_POST['city'] . '<br>';
    echo "Code postal : " . $_POST['zipcode'] . '<br>';
    echo "Adresse : " . $_POST['adress'] . '<br>';
    echo "Date de naissance: " . $_POST['birth'] . '<br>';
    echo "Sexe : " . $_POST['sexe'] . '<br>';
    echo "Description : " . $_POST['textarea'] . '<br>';

    $postRepertoire= $bddRepertoire->exec("INSERT INTO annuaire (id_annuaire, nom, prenom, telephone, profession, ville, codepostal,adresse, date_de_naissance, sexe, description) VALUES(NULL,'$_POST[lastName]', '$_POST[firstName]', '$_POST[phone]', '$_POST[job]', '$_POST[city]','$_POST[zipcode]','$_POST[adress]', '$_POST[birth]', '$_POST[sexe]', '$_POST[textarea]')");
    
    echo "Nombre d'enregistrements  : " . $postRepertoire . '<br>';
}






$result = $bddRepertoire->query('SELECT * FROM annuaire');

$arrayAnnuaire = $result->fetchAll(PDO::FETCH_ASSOC);



echo '<table class="table table-dark table-striped">';
echo '<tr>';

for ($i=0; $i < $result->columnCount(); $i++) { 
    $column = $result->getColumnMeta($i);
    echo '<th>' . $column['name'] . '</th>';
}
echo "<th>Modifier</th>";
echo "<th>Supprimer</th>";
echo '</tr>';

echo '<tr>';
foreach ($arrayAnnuaire as $key => $array) {
    echo '<tr>';
    foreach ($array as $key2 => $value) {
        echo '<td>' . $value . '</td>';

    }
    echo "<td><a href='tp2.php?action=update&id=$array[id_annuaire]'>Modifier</a></td>";
    echo "<td><a href='?action=delete&id=$array[id_annuaire]'>Supprimer</a></td>";
    echo '</tr>';
  
}
echo '</table>';

echo '<br>';


$data = $bddRepertoire->query("SELECT COUNT(*) as nb FROM annuaire WHERE sexe = 'f'");
$nbFemme = $data->fetch(PDO::FETCH_ASSOC);
echo 'Nombre de femmes : '  . implode($nbFemme).'<br>';

// echo 'Nombre de femmes : '  . $data->rowCount();

$data = $bddRepertoire->query("SELECT COUNT(*) as nb FROM annuaire WHERE sexe = 'm'");
$nbHomme = $data->fetch(PDO::FETCH_ASSOC);
echo 'Nombre d\'hommes : '  . implode($nbHomme);
echo "<br>";


$id = $_GET['id'];
$action = $_GET['action'];

echo "id numero : ".$id;
echo "<br>";

if ($action == 'delete') {
    $bddRepertoire->query("DELETE FROM annuaire WHERE id_annuaire = $id  ");

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
       

   

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>