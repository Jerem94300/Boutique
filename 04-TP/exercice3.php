<?php

$counter = 0;

for ($counter=0; $counter <=100 ; $counter++) { 
   echo $counter;
}


 

// exercice 3.2

for ($counter=0; $counter <=100 ; $counter++) { 
 
   if ($counter == 50) {
      echo "<span class='red'>$counter</span>--";
   }else {
      echo "$counter--";
   }
}

echo '<br>';

// exercice 3.3

for ($counter=2000; $counter >=1930 ; $counter--) { 
   echo $counter.'-';
  
}

echo '<br>';

// exercice 3.4

for ($counter=0; $counter <=100 ; $counter++) { 
   echo '<h1>Titre</h1>';
 
}

// exercice 3.5

for ($counter=0; $counter <=5 ; $counter++) { 
   echo "<h1>je m'affiche pour la $counter fois</h1>";
 
}





?>