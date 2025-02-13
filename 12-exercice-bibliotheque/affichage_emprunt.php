<?php



$bddBibliotheque = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

// Affichage emprunts

$resultEmprunts = $bddBibliotheque->query('SELECT * FROM emprunt');

$arrayEmprunt = $resultEmprunts->fetchAll(PDO::FETCH_ASSOC);
echo ' <h1 class="text-center">Bibliothèque</h1>';

echo ' <h2 class="text-center">EMPRUNTS</h2>';

echo '<table class="table table-dark table-striped">';
echo '<tr>';

echo "<a href='affichage_abonnes.php'>Abonnes</a> &nbsp";
echo "<a href='affichage_emprunt.php'>Emprunts</a> &nbsp";
echo "<a href='affichage_livres.php'>Livres</a>";


for ($i=0; $i < $resultEmprunts->columnCount(); $i++) { 
    $column = $resultEmprunts->getColumnMeta($i);
    echo '<th>' . $column['name'] . '</th>';
}
echo "<th>Modifier</th>";
echo "<th>Supprimer</th>";
echo '</tr>';

echo '<tr>';
foreach ($arrayEmprunt as $key => $array) {
    echo '<tr>';
    foreach ($array as $key2 => $value) {
        echo '<td>' . $value . '</td>';

    }
    echo "<td><a href='?action=update&id=$array[id_emprunt]'>Modifier</a></td>";
    echo "<td><a href='?action=delete&id=$array[id_emprunt]'>Supprimer</a></td>";
    echo '</tr>';
  
}
echo '</table>';



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