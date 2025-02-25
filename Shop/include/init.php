<?php
session_start();

//--Connexion BDD

$connect_db = new PDO('mysql:host=localhost;dbname=shop', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


//Session

//chemin

define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'].'/PHP/Shop/');
// echo '<pre>';print_r(RACINE_SITE); echo'</pre>';

//Cette constante retourne le chemin physique du dossier htdocs sur le serveur, de notre dossier 'shop' sur le serveur
//lors de l'enrgistrement d'images/photos nous aurons besoin du chemin complet dossier images pour enrgistrer la photo
// echo RACINE_SITE.'Shop/assets/images/product.jpg';

define("URL", "http://localhost/PHP/Shop/");

//<img src="http://localhost/PHP/Shop/assets/images/product.jpg">

//cette constante servira a enregistrer l'URL d'une photo dans la BDD on ne peu pas conserver la photo physiquement dans la BDD donc on definit une URL vers le bon dossier


// Variables


//----Failles XSS



foreach ($_POST as $key => $value) {
    if (!is_array($value)) { // Vérifie que ce n'est pas un tableau
        $_POST[$key] = htmlentities(addslashes(trim($value)));
    }
}

foreach ($_GET as $key => $value) {
    if (!is_array($value)) {
        $_GET[$key] = htmlentities(addslashes(trim($value)));
    }
}

//trim() supprime les espaces en débuts et en fin de châines de caractères




//------ Inclusions Fonctionss

require_once("functions.php");