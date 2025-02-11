<?php
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
?>
<br />