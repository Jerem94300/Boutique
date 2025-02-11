<?php
$connect_bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

if (isset($_GET['action']) && $_GET['action'] == 'update' ) {
    $data = $connect_bdd->prepare("SELECT * FROM annuaire WHERE id_annuaire = :id");
    $data->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $data->execute();

    // var_dump($data->rowCount());
    if (!$data->rowCount()) {

        header("Location: affichage_annuaire_correction.php");
    }

    $arrayAnnuaire = $data->fetch(PDO::FETCH_ASSOC);
    echo '<pre>';
print_r($arrayAnnuaire);
echo '</pre>';

}

if (isset($_POST['submit'])) {

    if (isset($_GET['action']) && $_GET['action'] == 'update') {

        $data = $connect_bdd->prepare("UPDATE annuaire SET nom = :lastName, prenom = :firstName, telephone = :phone, profession = :job, ville = :city, codepostal = :zipcode, adresse = :adress, date_de_naissance = :birth, sexe = :sexe, description = :textarea WHERE id_annuaire = :id");
        $data->bindValue(':id',$_GET['id'],PDO::PARAM_INT);


    }else {
     
    $data = $connect_bdd ->prepare("INSERT INTO annuaire ( nom, prenom, telephone, profession, ville, codepostal,adresse, date_de_naissance, sexe, description) VALUES(:lastName, :firstName, :phone, :job, :city, :zipcode,:adress, :birth, :sexe, :textarea)");
    }





$data->bindValue(':lastName',$_POST['lastName'],PDO::PARAM_STR);
$data->bindValue(':firstName',$_POST['firstName'],PDO::PARAM_STR);
$data->bindValue(':phone',$_POST['phone'],PDO::PARAM_STR);
$data->bindValue(':job',$_POST['job'],PDO::PARAM_STR);
$data->bindValue(':city',$_POST['city'],PDO::PARAM_STR);
$data->bindValue(':zipcode',$_POST['zipcode'],PDO::PARAM_STR);
$data->bindValue(':adress',$_POST['adress'],PDO::PARAM_STR);
$data->bindValue(':birth',$_POST['birth'],PDO::PARAM_STR);
$data->bindValue(':sexe',$_POST['sexe'],PDO::PARAM_STR);
$data->bindValue(':textarea',$_POST['textarea'],PDO::PARAM_STR);
$data->execute(); //execution de la requete

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// echo '<prev>';
// print_r(get_class_methods($data));
// echo '</prev>';

//après l'execution on redirige vers affichage annuaire avec des parametres dans l'URL
header('Location: affichage_annuaire_correction.php?action=valid');
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
                <input type="text" name="lastName" class="form-control" placeholder="Saisir votre nom" id="lastName" value="<?php if(isset($arrayAnnuaire['nom'])) echo $arrayAnnuaire['nom']?>">
       
             
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prenom</label>
                <input type="text" name="firstName" placeholder="Saisir votre prenom" class="form-control" id="firstName" value="<?php if(isset($arrayAnnuaire['prenom'])) echo $arrayAnnuaire['prenom']?>">
     
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" name="phone" placeholder="Numéro de téléphone " class="form-control" id="phone" value="<?php if(isset($arrayAnnuaire['telephone'])) echo $arrayAnnuaire['telephone']?>">
     
            </div>

            <div class="mb-3">
                <label for="job" class="form-label">Profession</label>
                <input type="text" name="job" placeholder="Profession" class="form-control" id="job" value="<?php if(isset($arrayAnnuaire['profession'])) echo $arrayAnnuaire['profession']?>">
     
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" name="city" placeholder="Ville" class="form-control" id="city" value="<?php if(isset($arrayAnnuaire['ville'])) echo $arrayAnnuaire['ville']?>">
     
            </div>

            <div class="mb-3">
                <label for="zipcode" class="form-label">Code postal</label>
                <input type="text" name="zipcode" placeholder="Code postal" class="form-control" id="zipcode" value="<?php if(isset($arrayAnnuaire['codepostal'])) echo $arrayAnnuaire['codepostal']?>">
     
            </div>

            <div class="mb-3 d-flex ">
                <label for="adress" class="form-label align-items-center p-3">Adresse</label>
                <textarea class="w-50" name="adress" id="adress" ><?php if(isset($arrayAnnuaire['adresse'])) echo $arrayAnnuaire['adresse']?></textarea>
            </div>


            <div class="mb-3">
                <label for="birth" class="form-label">Date de naissance</label>
                <input type="date" name="birth" placeholder="Date de naissance" class="form-control" id="birth" value ="<?php if(isset($arrayAnnuaire['date_de_naissance'])) echo $arrayAnnuaire['date_de_naissance']?>">
     
            </div>

         
            <select class="form-select" name="sexe" id="sexe">
                <option value="m" <?php if(isset($arrayAnnuaire['sexe']) &&$arrayAnnuaire['sexe'] == 'm') echo 'selected'?>  >Homme</option>
                <option value="f" <?php if(isset($arrayAnnuaire['sexe']) &&$arrayAnnuaire['sexe'] == 'f') echo 'selected'?> >Femme</option>
                

            </select>
                  
    

            <div class="mb-3 d-flex ">
                <label for="textarea" class="form-label align-items-center p-3">Description</label>
                <textarea class="w-50" name="textarea" id="textarea" ><?php if(isset($arrayAnnuaire['description'])) echo $arrayAnnuaire['description']?></textarea>
            </div>            
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>