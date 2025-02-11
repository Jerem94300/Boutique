


<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lien php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <h1 class="text-center my-3">Lien PHP</h1>

    <div class="cards gap-3 justify-content-between">
        <div class="card bg-success p-3">
            <a href="exercice2.1.php?country=france" class="text-white text-decoration-none">France</a>
        </div>

        <div class="card bg-primary p-3">
            <a href="exercice2.1.php?country=italie" class="text-white text-decoration-none">Italie</a>
        </div>

        <div class="card bg-danger p-3">
            <a href="exercice2.1.php?country=espagne" class="text-white text-decoration-none">Espagne</a>
        </div>

        <div class="card bg-secondary p-3">
            <a href="exercice2.1.php?country=angleterre" class="text-white text-decoration-none">Angleterre</a>
        </div>
    </div>

    <?php


if ($_GET) {
 switch ($_GET['country']) {
  case 'france':
    echo "vous êtes français";
    break;
  
  case 'italie':
    echo "vous êtes italien";
    break;

  case 'espagne':
      echo "vous êtes espagnol";
      break;

  case 'angleterre':
      echo "vous êtes anglais";
      break;
}
}





?>

    
  </div>
   




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>