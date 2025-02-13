<?php

//Exercice de dialogue livre d'or, tchat

//1 Modelisation de la base de donnée
/* bdd :  tchat

    table : commentaire
            id_commentaire // INT(11) PK - AI
            pseudo          // VARCHAR(255) NOT NULL
            dateEnregisterment //DATETIME
            message             // LONGTEXT
            

2 connexion a la BDD
3 creation du formulaire avec ajout de message
4 recuperation et affichage des données saisies en PHP
5 requete sql d'enrgistrement INSERT
6 Affichage des messages ( format francais DATE_FORMAT)
7 Afficher le nombre de messages enregistrés dans la BDD            */



echo '<pre>';
print_r($_POST);
echo '</pre>';






$bddTchat = new PDO('mysql:host=localhost;dbname=tchat', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


echo '<pre>'; var_dump($bddTchat); echo'</pre>';



if ($_POST ) {

       // Failles XSS : injection de balises HTML dans la base de données, ces balises peuvent être executées par le navigateur et donc potentiellement dangereuses
    //pour parer aux failles XSS, il faut utiliser :
    //strip_tags() pour supprimer les balises HTML
    //htmlentities() pour transformer les balises en entités HTML ( < devient &lt;)
    //la fonction htmlspecialchars() convertit les caractères spéciaux en entités HTML 



    /* 
        <script>
        let bug = true;
        while(bug){
            alert('bloqué')
        }
        </script>
    */

    $_POST['pseudo'] = strip_tags($_POST['pseudo']);
    $_POST['message'] = strip_tags($_POST['message']);


    foreach ($_POST as $key => $value) {

        $_POST[$key] = strip_tags(addslashes($value));
   
    }



    // $postTchat= $bddTchat->exec("INSERT INTO commentaire (pseudo, dateEnregistrement, message) VALUES( '$_POST[pseudo]', NOW(), '$_POST[message]')");
    
    //     echo "Nombre d'enregistrements  : " . $postTchat . '<br>';
       


    $postTchat= $bddTchat->prepare("INSERT INTO commentaire (pseudo, dateEnregistrement, message) VALUES(:pseudo, NOW(), :message)");
    $postTchat->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $postTchat->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
    $postTchat->execute();


}



    /*
    Les injections SQL est le fait d'injecter un morceau de code SQL directement en base de données (via un formulaire ou URL), l'injection SQL va détourner la requête initiale et va permettre d'en éxecuter une autre, elle est éxécuter en base de données.
        la méthode prepare() de la classe PDOStatement permet de préparer la requête si elle est redondante dans le code mais aussi de pouvoir définir des marqueurs nominatif (:pseudo, :message), nous les définissons, ce sont comme des boites vide dans lesquelles nous enfermons une valeur, de ce fait nous ne pouvons plus détounrer la requête initiale
        bindValue() est une méthode de la classe PDOStatement permettant de renseigner les valeurs des marqueurs, il y a 3 paramètres : 
        1. Le nom du marqueur (:pseudo)
        2. La valeur du marqueur ($_POST[pseudo])
        3. le type de données de la valeur du marqueur (string, int, boolean etc...)
        execute() est une méthode de la classe PDOStatement permettant d'executer la requête préparée
    */

//  Si l'internaute a la possibilité d'injecter une valeur dans une requête SQL (formulaire ou URL), il faut préparer la requête et déclarer des marqueurs nominatifs

    $data  = $bddTchat->query("SELECT pseudo, DATE_FORMAT(dateEnregistrement, '%d/%m/%Y à %H:%i:%s') as datetimeFr, message FROM commentaire");
    echo '<pre>'; print_r($data); echo'</pre>';

    $msgContent = '';
    while($commentaire = $data->fetch(PDO::FETCH_ASSOC)){

        $msgContent .= '<div class="col-8 mx-auto alert alert-primary mt-2">';
            $msgContent .= "<p>Posté par $commentaire[pseudo]</p>";
            $msgContent .= "<small>$commentaire[datetimeFr]</small>";
            $msgContent .= "<p class='w-100'>$commentaire[message]</p>";
        $msgContent .= '</div>';


    }

 

    //Injections SQL




?>




<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-4">
        <h1 class="text-center">Formulaire Tchat</h1>

        <?php echo $msgContent; ?>

        <form method="post" action="">
       
            
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" placeholder="Saisir votre pseudo" class="form-control " id="firstName">
            </div>



            <div class="mb-3 d-flex  align-items-center">
                <label for="textarea" class="form-label align-items-center p-3">Message</label>
                <textarea class="w-50" name="message" id="message" placeholder ="Message"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Envoi</button>
           
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>