<?php
//2 fonctions d'inclusions : include et require
//pas de difference entre les deux fonctions sauf en cas d'erreurs sur le nom ou chemin du fichier
//Include genere une erreur et continu l'execution du code
//require genere une erreur mais stop l'execution du code
//_once permet d'eviter les doublons d'inclusions
include("includes/header.php");
require_once("includes/nav.php");
?>
  
<main class="main">
    <p class="main__p">Nous sommes sur la page d'accueil</p>
    <p class="main__p">Nous sommes sur la page d'accueil</p>
    <p class="main__p">Nous sommes sur la page d'accueil</p>
    <p class="main__p">Nous sommes sur la page d'accueil</p>
    <p class="main__p">Nous sommes sur la page d'accueil</p>
    <p class="main__p">Nous sommes sur la page d'accueil</p>
    <p class="main__p">Nous sommes sur la page d'accueil</p>
    <p class="main__p">Nous sommes sur la page d'accueil</p>
</main>


<?php
require("includes/footer.php");
?>

