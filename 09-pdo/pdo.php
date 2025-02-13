<?php

echo '<h1>01. PDO (php data object): CONNEXION</h1>';


//
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

// PDO est une classe predefinie permettant de se connecter et d'executer et de dialoguer avec une base de données. Nous avons besoin d'instancier la classe 'new' pour pouvoir nous en servir. $pdo est un objet issu de la classe PDO
// Nous devons lui founir des arguments, les coordoonées de la BDD
/*
1: mysql :  serveur
2 host : localhost ( adresse du serveur (127.0.0.1)
3 donnée :  nom de la base de donneés
4 root : utilisateur par defaut ( root en local)
5 mot de passe ( par defaut vide en local)
6 option : (erreur warning encodage des colonnes utf-8)
  
 */

echo '<pre>'; var_dump($pdo); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($pdo)); echo'</pre>';


// Array
// (
//     [0] => __construct
//     [1] => beginTransaction
//     [2] => commit
//     [3] => errorCode
//     [4] => errorInfo
//     [5] => exec
//     [6] => getAttribute
//     [7] => getAvailableDrivers
//     [8] => inTransaction
//     [9] => lastInsertId
//     [10] => prepare
//     [11] => query
//     [12] => quote
//     [13] => rollBack
//     [14] => setAttribute
// )


echo '<h1>02. PDO: EXEC - INSERT - UPDATE _ DELETE/h1>';

//INSERT

 $result= $pdo->exec('INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUE ("Jérémy", "ABELARD", "m", "PDG", "2025-02-04", 30000)');
echo "Nombre d'enregistrement affecté par insert : $result<br";


// exec est une methode issue de la classe pdo permettant d'executer des requetes sql en base de donnée. On doit lui fournir en argument la requete sql. Elle permet d'executer les requetes INSERT, UPDATE etc..
//Elle retourne le nombre d'execution de requetes enregistrer dans la bdd


//UPDATE

$result= $pdo->exec('UPDATE employes SET salaire = 1300 WHERE id_employes=350');

//DELETE
$result= $pdo->exec('DELETE FROM employes WHERE id_employes=350');


echo '<h2>03. PDO: QUERY SELECT + FETCH_ASSOC/h2>';

// la methode query retourne un autre objet issu d'un autre objet ( PDOStatement); cette classe contient ses propres methodes permettant de rendre le resultat exploitable
$data = $pdo->query("SELECT*FROM employes WHERE prenom = 'Daniel'");
echo '<pre>'; var_dump($data); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($data)); echo'</pre>';

//FETCH_ASSOC est une constante de la classe PDO qui retroune un array indexé avec le nom des champs de la table sql
$arrayEmploye = $data->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($arrayEmploye); echo'</pre>';

foreach ($arrayEmploye as $key => $value) {
    echo "$key: $value<br>";
}
//PDO fepresente un objet issu de la classe predefinie PDO, quand on execute une requete de selection via la methode query() :
//on obtient un autre objet issue d'une autre classe PDOStatement. Cet objet a des methode et proprietes differentes
//$data est inexploitable en l'état 
//La methode Fetch() issu de l'objet PDOStatement $data permet de convertir l'objet en un tableau de données array indexé avec le nom des champs de la table sql



// Array
// (
//     [id_employes] => 854
//     [prenom] => Daniel
//     [nom] => Chevel
//     [sexe] => m
//     [service] => informatique
//     [date_embauche] => 2011-09-28
//     [salaire] => 1700
// )




echo '<h2>04. PDO: QUERY SELECT + FETCH_ASSOC plusieurs resultats/h2>';

$data = $pdo->query("SELECT*FROM employes");

//Tant qu'il y a des resultats que retourne la methode fetch(), tant que $array<Employe retourne TRUE, la boucle continue de tourner
//Si la requete retourne plusieurs résultats, nous sommes obligés de boucler le resultat

while($arrayEmploye = $data->fetch(PDO::FETCH_ASSOC)){

    echo '<pre>'; print_r($arrayEmploye); echo'</pre>';
    echo'<div style="background: green; padding: 1rem; margin-bottom: 1rem;">';
        echo "$arrayEmploye[prenom]<br>";
        echo "$arrayEmploye[nom]<br>";
        echo "$arrayEmploye[service]<br>";
    echo'</div>';

}

//rowCount() retourne le nombre de ligne séléctionné dans la BDD
echo "Nombre d'employes : " .$data->rowCount() . '<hr>';



echo '<h2>04. PDO: QUERY SELECT + FETCH_ALL + FETCH_ASSOC plusieurs resultats/h2>';

$data = $pdo->query("SELECT*FROM employes");
echo '<pre>'; print_r($data); echo'</pre>';


// fetchAll() retourne un tableau multidimensionnel, chaques ligne de resultat est Indexé dans le tableau multidimensionnel
$arrayALLEmployes = $data->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($arrayALLEmployes); echo'</pre>';


//exo afficher les donnée des employes avec foreach


foreach ($arrayALLEmployes as $key => $arrayUnemploye ) {
    foreach ($arrayUnemploye as $item => $value) {
        echo "$item : $value <br>";
    }
}



echo '<h2>04. PDO: QUERY FETCHs/h2>';

//exerice: Afficher la liste des base de données dans une liste HTML

// SHOW DATABASES




$databasesShow = $pdo->query("SHOW DATABASES");
echo '<pre>'; print_r($databasesShow); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($databasesShow)); echo'</pre>';


$arrayShowDatabases = $databasesShow->fetchAll(PDO::FETCH_ASSOC);


echo '<ul>';
foreach ($arrayShowDatabases as $key => $array) {
   echo'<li>';
    echo "$array[Database]";
   echo '</li>';
}

echo '</ul>';


echo '<h2>04. PDO: QUERY FETCH TABLE/h2>';

$data = $pdo->query("SELECT * FROM employes");

echo '<pre>'; print_r($data); echo'</pre>';

$arrayALLEmployes = $data->fetchAll(PDO::FETCH_ASSOC);

// colulmnCount() retourne le nombre de colonnes


print_r($data->columnCount());

echo '<table border = 2>';
echo '<tr>';

for ($colonne=0; $colonne< $data->columnCount(); $colonne++) { 
    $dataColone = $data->getColumnMeta($colonne);
    echo '<pre>'; print_r($dataColone); echo'</pre>';
    echo "<th>$dataColone[name] </th>";
}

//getColumnMeta() retourne les metas données des colonnes de la table sql
//Il faut lui transmettre le numéro de la colonne en argument 
//Pour afficher le nom de la colonne il faut crocheter à l'indice $dataColonne[name]
echo '</tr>';

foreach ($arrayALLEmployes as $key => $arrayUnemploye) {
   echo'<tr>';

   foreach ($arrayUnemploye as $key2 => $value) {
   echo"<td>$value</td>";
   }
    echo'</tr>';
}

echo '</table>';

//il n'est pas possible de faire un echo $arrayUnemploye, on ne peut pas convertir un array en cghaine de caracteres.
//Nous devons donc le transmettre à la 2eme boucle pour parcourir l'ensemblre des données

?>