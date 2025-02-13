<?php
echo '<prev>';
print_r($_POST);
echo '</prev>';


$bddRepertoire = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);



if ($_POST ) {

    // echo "Nom : " . $_POST['lastName'] . '<br>';
    // echo "Prenom : " . $_POST['firstName'] . '<br>';
    // echo "Numero de téléphone : " . $_POST['phone'] . '<br>';
    // echo "Profession : " . $_POST['job'] . '<br>';
    // echo "Ville : " . $_POST['city'] . '<br>';
    // echo "Code postal : " . $_POST['zipcode'] . '<br>';
    // echo "Adresse : " . $_POST['adress'] . '<br>';
    // echo "Date de naissance: " . $_POST['birth'] . '<br>';
    // echo "Sexe : " . $_POST['sexe'] . '<br>';
    // echo "Description : " . $_POST['textarea'] . '<br>';

    $postRepertoire= $bddRepertoire->exec("INSERT INTO annuaire (id_annuaire, nom, prenom, telephone, profession, ville, codepostal,adresse, date_de_naissance, sexe, description) VALUES(NULL,'$_POST[lastName]', '$_POST[firstName]', '$_POST[phone]', '$_POST[job]', '$_POST[city]','$_POST[zipcode]','$_POST[adress]', '$_POST[birth]', '$_POST[sexe]', '$_POST[textarea]')");
    
    // echo "Nombre d'enregistrements  : " . $postRepertoire . '<br>';
}




// echo '<pre>';
// var_dump($bddRepertoire);
// echo '</pre>';

// echo '<pre>';
// print_r(get_class_methods($bddRepertoire));
// echo '</pre>';


$result = $bddRepertoire->query('SELECT * FROM annuaire');
// echo '<pre>';
// var_dump($result);
// echo '</pre>';


$arrayAnnuaire = $result->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($arrayAnnuaire);
// echo '</pre>';
// print_r($result->columnCount());


// echo '<table class="table table-dark table-striped">';
// echo '<tr>';

// for ($i=0; $i < $result->columnCount(); $i++) { 
//     $column = $result->getColumnMeta($i);
//     echo '<th>' . $column['name'] . '</th>';
// }
// echo '</tr>';

// echo '<tr>';
// foreach ($arrayAnnuaire as $key => $array) {
//     echo '<tr>';
//     foreach ($array as $key2 => $value) {
//         echo '<td>' . $value . '</td>';

//     }
//     echo '</tr>';
  
// }
// echo '</table>';

// echo '<br>';

// echo($result->rowCount());

// $data = $bddRepertoire->query("SELECT COUNT(*) as nb FROM annuaire WHERE sexe = 'f'");
// $nbFemme = $data->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($nbFemme);
// echo '</pre>';



// echo 'Nombre de femmes : '  . implode($nbFemme);

// $data = $bddRepertoire->query("SELECT COUNT(*) as nb FROM annuaire WHERE sexe = 'm'");
// $nbHomme = $data->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($nbHomme);
// echo '</pre>';

$id = $_GET['id'];

echo "id numero :".$id;
// Vérification des paramètres GET
if (isset($_GET['id'], $_GET['action']) && $_GET['action'] === 'update') {
    $id = intval($_GET['id']);

    $stmt = $bddRepertoire->prepare("SELECT * FROM annuaire WHERE id_annuaire = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
     
        $nom = htmlspecialchars($data['nom']);
        $prenom = htmlspecialchars($data['prenom']);
        $telephone = htmlspecialchars($data['telephone']);
        $profession = htmlspecialchars($data['profession']);
        $ville = htmlspecialchars($data['ville']);
        $codepostal = htmlspecialchars($data['codepostal']);
        $adresse = htmlspecialchars($data['adresse']);
        $date_de_naissance = htmlspecialchars($data['date_de_naissance']);
        $sexe = $data['sexe'];
        $description = htmlspecialchars($data['description']);
    } else {
        echo "Aucun enregistrement trouvé pour l'ID fourni.";
        exit;
    }
} else {
    echo "Paramètres invalides.";
    exit;
}







?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>11-TP2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">TP2</h1>
        

        <form method="post" action="">
            <div class="mb-3">
                <label for="lastName" class="form-label">Nom</label>
                <input type="text" name="lastName" class="form-control" placeholder="Saisir votre nom" id="lastName" value="<?php echo $nom ?>">
       
             
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prenom</label>
                <input type="text" name="firstName" placeholder="Saisir votre prenom" class="form-control" id="firstName" value="<?php echo $prenom ?>">
     
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" name="phone" placeholder="Numéro de téléphone " class="form-control" id="phone" value="<?php echo $telephone ?>">
     
            </div>

            <div class="mb-3">
                <label for="job" class="form-label">Profession</label>
                <input type="text" name="job" placeholder="Profession" class="form-control" id="job" value="<?php echo $profession ?>">
     
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" name="city" placeholder="Ville" class="form-control" id="city" value="<?php echo $ville ?>">
     
            </div>

            <div class="mb-3">
                <label for="zipcode" class="form-label">Code postal</label>
                <input type="text" name="zipcode" placeholder="Code postal" class="form-control" id="zipcode" value="<?php echo $codepostal ?>">
     
            </div>

            <div class="mb-3 d-flex ">
                <label for="adress" class="form-label align-items-center p-3">Adresse</label>
                <textarea class="w-50" name="adress" id="adress" ><?php echo $adresse ?></textarea>
            </div>


            <div class="mb-3">
                <label for="birth" class="form-label">Date de naissance</label>
                <input type="date" name="birth" placeholder="Date de naissance" class="form-control" id="birth" value ="<?php echo $date_de_naissance ?>">
     
            </div>

         
            <label for="sexe">Sexe</label>
                        <input type="radio" name="sexe" id="sexe" value="f" <?php echo ($sexe === 'f') ? 'checked' : ''; ?>>Féminin

                        <input type="radio" name="sexe" id="sexe" value="m" <?php echo ($sexe === 'm') ? 'checked' : ''; ?>>Masculin
                  
    

            <div class="mb-3 d-flex ">
                <label for="textarea" class="form-label align-items-center p-3">Description</label>
                <textarea class="w-50" name="textarea" id="textarea" ><?php echo $description; ?></textarea>
            </div>            
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>