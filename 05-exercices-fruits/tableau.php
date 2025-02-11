<?php
/* Exercice:
	1- Déclarer un tableau ARRAY avec tout les fruits
	2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
	3- Affichez les 2 tableaux (print_r)
	4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres à la fonction "calcul()" et obtenir le prix.
	5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).
	6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquée).
	7- Faire un affichage dans une table HTML pour une présentation plus sympa.
*/


// 1- Déclarer un tableau ARRAY avec tout les fruits

$fruits = array('cerises', 'bananes', 'pommes', 'peches');

// 2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.

$poids = array(100, 500, 1000, 1500, 2000, 3000, 5000, 10000);

// 3- Affichez les 2 tableaux (print_r)

echo '<pre>'; print_r($fruits); echo '</pre>';
echo '<pre>'; print_r($poids); echo '</pre>';

?>

