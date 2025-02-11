<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>01-ENTRAINEMENT-PHP</title>
</head>
<body>
    <!-- Il est possible d'ecrire du HTMl dans un fichier PHP mais l'inverse est impossible -->


    <div class="container">
        <h2 class="title__h2">Ecriture et affichage</h2>



        <?php //ouverture de la balise
        //la balise PHP peut etre ouverte ou fermée autant de fois que souhaité
        //instruction d'affichage : echo :  affiche moi....;
        echo 'Bonjour';
        echo '<br>';
        echo 'Bienvenue<br>';

        //fermeture de la balise
        ?>

        <!-- raccourci d'affichage echo -->
        <?='Allo'?>


        <?php
        /*Commentaires
        Sur plusieurs
        Lignes*/

        echo '<h2 class="title__h2">Variable : Types / déclaration / affectations</h2>';
        // Une variable est nommée permettant de conserver sa valeur
        //Toujours le $ suivi du nom de la variable
        //la variable ne peut pas commencer par un chiffre
    
       $a = 127;
       echo gettype($a); //type INTEGER
       echo '<br>';

       $b = 1.5;
       echo gettype($b); // type DOUBLE
       echo '<br>';

       $c = 'une chaine de caractere';
       echo gettype($c); // type STRING
       echo '<br>';

       $d = '127';
       echo gettype($d); // type STRING
       echo '<br>';

       $e = true;
       echo gettype($e); // type BOOLEAN
       echo '<br>';

       //il existe d'autres types de données comme les ARRAY et OBJECT

       echo '<h2 class="title__h2">Concaténation</h2>';

       $x = 'Bonjour ';
       $y = 'Tout le monde';
       echo $x . $y . "<br>";// point pour concaténer
       echo "$x $y <br>"; // entre guillemets les variables sont evaluées
       echo '$x $y <br>'; // entre cottes c'est une chaine de caractere


       echo '<h2 class="title__h2">Concaténation lors de l\'affection</h2>';

       $prenom1 = 'Bruno';
       $prenom1 .= 'Claire';
       echo $prenom1 . '<br>'; // Ajoute une valeur a la variable sans ecraser la valeur précédente


       echo '<h2 class="title__h2">Constante et constante magique</h2>';
        //define(): fonction prédefinie permettant de declarer une constante
       define("CAPITALE", "Paris");
       echo CAPITALE . '<br>';

    //    define("CAPITALE", "Rome"); erreur

    //constante magique
    echo __LINE__.'<br>'; // affichele le numero de la ligne
    echo __FILE__.'<br>'; // affiche le chemin complet vers le fichier

    //afficher vert jaune rouge avec les tirets en mettant chaques couleurs dans une variable. Chaques mots doit être de la bonne couleur

    $jaune = '<span class="yellow">Jaune</span>';
    $vert = '<span class="green">Vert</span>';
    $rouge = '<span class="red">Rouge</span>';

    echo $jaune.'-'.$vert.'-'.$rouge;
    
  
    echo '<h2 class="title__h2">Operateurs arithmétiques</h2>';

    $a = 10;
    $b = 2;
    $c = 3;
    echo $a + $b. '<br>';
    echo $a - $b. '<br>';
    echo $a * $b. '<br>';
    echo $a / $b. '<br>';
    echo $a % $c. '<br>';

    //operation / affectation
    $a += $b; // = 12
    $a -= $b; // = 10


    echo $a.'<br>';


    echo '<h2 class="title__h2">Les structures conditionnelle (if / else) - operateur de comparaison</h2>';

    //Isset et empty

    $var1 = 0;
    $var2 = "";

        //empty renvoi true si la variable en argument contient 0, si elle n'est pas definie ou si la valeur est vide
        //si il n'y a qu'une seule instruction dans la condition if les accolades ne sont pas nécessaires
    if (empty($var1)) {
        echo "0, vide ou non defini<br>";
    }

    //Isset
    //il teste l'existance d'une variable. True si variable definie
    if (isset($var2)) {
        echo "var 2 existe et est definie par rien<br>";
    }


    /*
        = affectation
        == comparaison de la valeur
        === comparaison de la valeur et du type
        < inferieur
        > superieur
        <=
        >=
        ! n'est pas
        != different de 
        && AND et
        || OR OU
        XOR OU unique
    
    */
    $a = 10;
    $b = 5;
    $c = 2;

    if($a == 8){
        echo 'A est egale a 8<br>';

    }elseif($b > $c){
        echo 'B est superieur a C<br>';


    }else {
        echo 'Tout le monde a faux!!<br>';

    }
    // on entre dans le cas elsif, on sort de la condition, tout les autres cas ne sont pas evalués

    if($a == 1 XOR $b == 5){

        echo 'ok condition exclusive!!<br>';


    }
    // avec XOR il faut qu'une seule des deux condition retourne true pour entrer dans les accolades


    // condition  ternaire

    echo ($a == 10) ? "A est egale à 10<br>" : "A n'est pas egale a 10<br>";
    $var1 = isset($maVar) ? $maVar : 'maVar n\'existe pas<br>';
    echo $var1. '<br>';

    $var2 = $maVar ?? 'maVar n\'existe pas<br>';// la même chose en plus court ?? = soit l'un soit l'autre
    echo $var2. '<br>';


    echo '<h2 class="title__h2">La condition SWITCH</h2>';
    //les 'case' representent les cas dans lesquels nous pouvons potentiellement tomber
    //le cas par defaut n'est pas obligatoire
    $perso = 'Mario';
    switch ($perso) {
        case 'Luigi':
            echo "C'est Luigi le meilleur";
            break;
        case 'Bowser':
                echo "C'est Bowser le meilleur";
            break;
        case 'Toad':
                echo "C'est Toad le meilleur";
            break;
        default:
        echo "Vous êtes fou !!! C'est Mario le meilleur <br>";
            break;
    }


//exo faire la meme chose avec avec condition if else

if ($perso == 'Luigi') {
    echo "C'est Luigi le meilleur";
}elseif ($perso == 'Toad') {
    echo "C'est Toad le meilleur";
}elseif ($perso == 'Bowser') {
    echo "C'est Bowser le meilleur";
}else {
    echo "Vous êtes fou !!! C'est Mario le meilleur";
}


echo '<h2 class="title__h2">Les fonctions prédefinies</h2>';
// une fonction predefinie permet de realiser un traitement spécifique
// documentation: https://www.php.net/manual/fr/indexes.functions.php

echo "Date: " .date("l/d/m/Y/w") ."<br>";
//une fonction a toujours des parenthèses car elle peut recevoir des arguments

$email = "jeremyabelard@gmail.com";
echo "@ se trouve a la position : " .strpos($email, '@').'<br>';

//strpos() : permet de trouver la position du caractere dans la chaine de caractere et retourne un INTEGER si le caractere est trouvé


$email = "Bonjour";
echo "@ se trouve a la position : " .strpos($email, '@').'<br>'; //cette ligne ne sort rien mais il y a bien quelque chose a l'interieure (false)
var_dump(strpos($email, '@')); //var_dump() est un outil de debug qui permet de voir ce que retourne la fonction ( idem console.log en js)

$phrase = "Nous sommes mercredi et il pleut";
echo "<br>Taille de la chaine de caractères : " .iconv_strlen($phrase)."<br>"; //iconv_strlen() : calcule la taille de la chaine de caracteres


$texte = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint mollitia dolore vitae nostrum sunt doloribus animi aliquam consequuntur expedita ad";

echo substr($texte, 0 , 20) ."......<a href=''>Lire la suite</a><br>";

/*
    substr() : fonction predefinie qui retourne une partie de la chaine de caracteres.
    arguments : 
        1: la chaine que l'on souhaite couper
        2: position de depart
        3: nombre de caractere souhaité
*/



echo '<h2 class="title__h2">Les fonctions utilisateur</h2>';

function bonjour($qui = "Thomas"){
    echo "Bonjour $qui  <br>";


}
bonjour("Jérémy");
bonjour(); // si la variable contient une valeur par defaut il n'est as necessaire de mettre un argument dans la fonction

$prenom = "Asmaa";
bonjour($prenom);
bonjour($perso); // le parametre peut etre une variable

function appliqueTva($nombre){
    return $nombre*1.2;
    echo "allo"; // cet echo ne s'affiche par car le return fait sortir de la fonction
}
echo appliqueTva(200); // execution de la fonction

//exo : Amerliorer la fonction afin que l'on puisse calculer en meme temps en fonction du taux de notre choix
echo "<br>";
function appliqueTaux($nombre, $taux){
    return $nombre*(1+$taux/100);
}
echo appliqueTaux(200,19.6);

echo "<br>";
// function meteo($saison, $temperature){
//     echo "Nous somme en $saison et il fait $temperature degré(s)<br>";
// }

// meteo('hiver', 6);

//exo : gerer le (s) de degres sur la temperature attention aux saisons
function meteo($saison, $temperature){
    if ($temperature == -1 || $temperature == 0 || $temperature == 1  ) {
    echo "Nous sommes en $saison et il fait $temperature degré<br>";
    }elseif($saison === "printemps"){
    $ter = "au";
    echo "Nous sommes $ter $saison et il fait $temperature degré<br>";
    }else
    echo "Nous sommes en $saison et il fait $temperature degrés<br>";
}

meteo("hiver", 1);
meteo("hiver", -1);
meteo("hiver", 0);
meteo("primtemps", 4);

//correction
echo "<br>";

function exoMeteo($saison, $temperature){
   $degre = 'degré';
   if($temperature > 1 || $temperature < -1) $degre = 'degrés';

   $preposition = 'en';
   if($saison == 'printemps') $preposition = 'au';
   echo "Nous sommes $preposition $saison et il fait $temperature $degre<br>";

}

exoMeteo("automne", 2);
exoMeteo("hiver", -1);
exoMeteo("printemps", 0);
exoMeteo("été", 1);


//espace local et global

function jourSemaine() {
    //espace locale
    $jour = 'Mercredi'; //variable locale
    return $jour;
}

echo $jour;//undefined cette variable n'est qu'accessible que dans la fonction
echo jourSemaine() ."<br>";


//------------------------

$pays = 'France';
function affichagePays(){
    global $pays; // global permet d'importer une variable de l'espace globale vers l'espace locale (a l'interieure de la fonction)
    echo $pays;
}

affichagePays();


/*
    2 espaces en PHP
        -espace LOCAL : à l'interieure d'une fonction
        -espace GLOBAL : à l'exterieure d'une fonction


*/

echo '<h2 class="title__h2">Les structures itératives : boucles</h2>';

//les boucles permettent d'automatiser un traitement, une tache, ells sont courantes en PHP
//exemple : si nous avons besoin d'afficher les données de 500 produits de la BDD sur la page Web, c'est une boucle qui automatisera cette affichage

//Boucle WHILE
$i = 0;

// while ($i < 3) {
//    echo "$i---";
//    $i++;
//    if ($i == 3) {
//     echo "$i";
// }
// }
//------
echo "<br>";

while ($i < 3) {
   
    if ($i ==2) 
        echo $i;
        else 
            echo "$i---";
            $i++;

 }
//exo  faites en sorte de ne pas avoir les tirets a la fin
echo "<br>";
//Boucle For
//Initialisation; condition d'entree, incrementation

for ($i=0; $i < 16; $i++) { 
    echo "$i---";
  
}
echo "<br>";

    //exo creer un selecteur contenant 30 options
    echo '<select>';
    for ($count=1; $count <= 30; $count++) { 
        echo "<option>$count</option>";
      
    }
    
    echo'</select>';

        ?>
        <select>
            <?php for($count = 1; $count <= 30; $count++) : ?>
                <option value= ""><?=$count?></option>
            <?php endfor; ?>
        </select>
        <?php

        /*
            autre synthaxe de la boucle for, utiliser en orienté objet dans le template de rendu afin de minimiser le code php et privilegier le code HTML
            for(): les : remplacent les accolades ouvrante
            endfor : remplace les acclade fermantes
            while(): / endwhile;
            foreach(): / endforeach;


        */


        // exo faire une boucle qui affiche de 8 a 9 sur la même ligne soit 10 tours dans un tableau html

        /* 
        
                <table>
                    <tr>
                        <td></td>
                    </tr>
                </table>
        
        */

        echo '<table>';
        echo'<tr>';
        for ($nb=0; $nb <10 ; $nb++) { 
            echo"<td>$nb</td>";
        }
        echo'</tr>';
        echo '</table>';
?>

<?php

echo "<br>";
// exo faire une boucle qui affiche de 8 a 9 sur 10 lignes 
$compteur = 0;
echo '<table>';
for ($nbRow=0; $nbRow <10 ; $nbRow++) { 
    echo"<tr>";
   
    for ($nb=0; $nb <10 ; $nb++) { 
        echo "<td>$compteur</td>";
        $compteur++;
    
    }
     echo"</tr>";
}
echo '</table>';



echo '<h2 class="title__h2">Tableau de données ARRAY</h2>';
//Un tableau est déclaré comme une variable améliorée car on conserve un ensemble de valeurs
//Les tableaux ARRAY sont souvent utilisés en PHP, exemple si nous selectionnons dans la BDD des produits nous les receptionnons sous forme de tableau ARRAY

$perso = ['Mario', 'luigi', 'Bowser', 'Peach', 'Toad'];

echo $perso; //erreur impossible d'afficher le tableau

//<pre> (presentation) permet de formater le texte et met en forme la sortie de l'outil de debug print_r()



echo '<pre>';
var_dump($perso);
echo '</pre>';

// array(5) {
//     [0]=>
//     string(5) "Mario"
//     [1]=>
//     string(5) "luigi"
//     [2]=>
//     string(6) "Bowser"
//     [3]=>
//     string(5) "Peach"
//     [4]=>
//     string(4) "Toad"
//   }


echo "<br>";

echo '<pre>';
print_r($perso);
echo '</pre>';

// Array
// (
//     [0] => Mario
//     [1] => luigi
//     [2] => Bowser
//     [3] => Peach
//     [4] => Toad
// )


//exo tenter d'afficher Bowser en passant par le tableau array perso 

echo $perso[2];
echo "<br>";

echo '<h2 class="title__h2">Boucle FOREACH pour les tableaux ARRAY</h2>';

$perso = ['Mario', 'Luigi', 'Bowser', 'Peach', 'Toad'];

foreach ($perso as $value) {
    echo "$value<br>";

}

echo "<hr>";

foreach ($perso as $key => $value) {
    echo "$key : $value<br>";

}
//foreach permet de poarcourir les tableaux de données et d'objets. $key receptionne un indice par tour de boucle. Lorsqu'il n'y qu'une seule variable de reception par défaut elle receptionne les valeurs du tableau

echo "<hr>";
echo 'Taille du tableau: ' .count($perso) .'<br>';
echo 'Taille du tableau: ' .sizeof($perso) .'<br>';

//count() et sizeof() sont similaire et retourne le nombre d'éléments dans le tableau Array
echo "<hr>";

echo implode("-",$perso);
//mets un tiret entre chaque éléments du tableau
echo "<hr>";

$url = "assets/image/photographer/Mimi Keel.jpg";
$arrayUrl = explode("/", $url);
//explode supprime les / et place les element entre / dans un tableau

echo '<pre>';
print_r($arrayUrl);
echo '</pre>';

echo '<h2 class="title__h2">Les tableaux ARRAY multidimensionnel</h2>';
// tableau dans un tableau
$arrayMulti = [
    0 => [
        'prenom' => 'Julien',
        'nom' => 'Cottet'
    ],
    1 => [
        'prenom' => 'Thomas',
        'nom' => 'Winter'
    ]
    ];

    echo '<pre>';
print_r($arrayMulti);
echo '</pre>';

// exo tenter d'afficher thomas en passant par le tableau

echo $arrayMulti[1]['prenom'];
echo "<hr>";
//exo afficher successivement les données des tableaux

foreach ($arrayMulti as $array) {
    foreach ($array as $key => $value) {
        echo "$key: $value<br>";
    }
}


echo '<h2 class="title__h2">Les superglobales</h2>';

echo '<pre>';
print_r($_SERVER);
echo '</pre>';


/*
    Les superglobales sont des variables predefinie dans le language de type array accessible an'importe ou permettant de vehiculer certaines données

    $_SERVER
    $_GET permet de vehiculer les données transmises dans une url
    $_POST recupere toute les données saisie dans un formulaire
    $_FILES recupere toute les données d'un fichier uploadé
    $_COOKIE donnée du fichier cookie
    $_SESSION vehicule les données de la session en cours
*/



echo '<h2 class="title__h2">Classes et objets</h2>';

// un objet est un autre type de donnéee un peu comme un array. il permet de regrouper des informations, cependant on peu declarer des variables (appelés propriétés) mais aussi dees fonctions (appelés methodes)


class Etudiant {
    public $prenom ="Jérémy"; // public (niveau de visibilité) permet de preciser que l'élément est accessible partout, il en existe d'autres : 'protected et private'
    public $age = 42;
    public function pays(){
        return "France";
    }
}

// echo $age; // erreur

// le mot clé new permet d'instancier la classe Etudiant et d'en faire un objet c'est ce qui permet de deployer la classe afin de pouvoir l'utiliser
// New permet de crrer un enfant de la classe c'est a travers l'objet que l'on peut manipuler ce qui est declaré dans la classe
// pour piocher dans l'objet on utilise  -> et ne pas mettre le $ devant la propriété

$objet = new Etudiant();
echo'<pre>'; var_dump($objet);echo'</pre>';

echo "Prénom : " .$objet->prenom . '<br>';
echo "Age : " .$objet->age . '<br>';
echo "Pays : " .$objet->pays() . '<br>';



?>




    </div>


    
</body>
</html>