<?php
session_start();
//permet de creer un fichier de session ou de l'ouvrir si il existe deja

if ($_POST) {


//on crée un indice 'email' dans le fichier de session auquel on stock l'email saisi dans le formulaire
$_SESSION['email'] = $_POST['email'];
$_SESSION['nom'] = 'Abelard';
$_SESSION['prenom'] = 'Jérémy';
echo '<pre>'; print_r($_SESSION); echo'</pre>';

header('Location: profil.php');
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>07-SESSION-ACCUEIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-6 mx-auto">
        <h1 class="text-center mb-3">Identifiez-vous</h1>
        

        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Saisir votre email" id="email">
  
             
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" placeholder="Saisir mot de passe" class="form-control" id="password">
              
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
</head>
<body>
    
</body>
</html>