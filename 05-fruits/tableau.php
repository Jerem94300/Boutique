<?php

require_once("fonction.inc.php");

// 1- Déclarer un tableau ARRAY avec tout les fruits

$fruits = array('cerises', 'bananes', 'pommes', 'peches');

// 2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.

$poids = array(100, 500, 1000, 1500, 2000, 3000, 5000, 10000);

// 3- Affichez les 2 tableaux (print_r)

echo '<pre>'; print_r($fruits); echo '</pre>';
echo '<pre>'; print_r($poids); echo '</pre>';


// 4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres à la fonction "calcul()" et obtenir le prix.

echo $fruits[0] . ' : ' . $poids[1]. ' grammes;';

function calcul($fruit, $poids)
{
	switch($fruit)
	{
		case 'cerises': $prix_kg = 5.76; break;
		case 'bananes':	$prix_kg = 1.09; break;
		case 'pommes':  $prix_kg = 1.61; break;
		case 'peches':  $prix_kg = 3.23; break;
		default: return "fruit inexistant"; break;
	}
	$resultat = round(($poids*$prix_kg/1000),2); //gramme*prix/1000 // 1000 grammes dans 1 kilo.
	return "Les " . $fruit . " coutent " . $resultat . " Euros pour " . $poids . " grammes";
}

echo '<br />';

echo calcul($fruits[0], $poids[1]) . '<br />';


// 5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).

echo '<br />';

for($i = 0; $i < count($poids); $i++)
{
    echo calcul($fruits[0], $poids[$i]) . '<br />';
}




// 6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquée).

echo '<br />';

for($j = 0; $j < count($fruits); $j++)
{
    for($i = 0; $i < count($poids); $i++)
    {
        $priceFruits = calcul($fruits[$j], $poids[$i]) . '<br />';
    }
}

//	7- Faire un affichage dans une table HTML pour une présentation plus sympa.


echo '<table>';

foreach ($fruits as $fruit) {
    echo'<tr>';
    foreach ($poids as $poids) {
        echo'<td>'.calcul($fruit, $poids) .'</td>';
    }

    echo'</tr>';
}

echo'</table>';



