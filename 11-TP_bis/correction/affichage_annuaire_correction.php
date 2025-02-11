<?php 
$connect_bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // echo 'Suppression Annuaire';

    $data = $connect_bdd->prepare("DELETE FROM annuaire WHERE id_annuaire = :id");
    $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $data->execute();

    header('Location: affichage_annuaire_correction.php?delete=valid');
}


if (isset($_GET['action']) && $_GET['action'] == 'valid') {
    $msgSuccess = '<div class="alert alert-success text-center my-3">Enregistrement effectué</div>';
}


if (isset($_GET['delete']) && $_GET['delete'] == 'valid') {
    $msgSuccess = '<div class="alert alert-success text-center my-3">Suppression effectué</div>';
}



$data = $connect_bdd->query('SELECT COUNT(*) AS nbFemmes FROM annuaire WHERE sexe = "f"');
$nbFemmes = $data->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($nbFemmes);
echo '</pre>';
$data = $connect_bdd->query('SELECT COUNT(*) AS nbHomme FROM annuaire WHERE sexe = "m"');
$nbHommes = $data->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($nbHommes);
echo '</pre>';

$data = $connect_bdd->query('SELECT * FROM annuaire');

//$data = objet PDOStatement
// echo '<pre>';
// print_r($data);
// echo '</pre>';

$arrayMultiAnnuaire = $data->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($arrayMultiAnnuaire);
// echo '</pre>';

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>11 -TP Répertoire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

  <div class="container">
        <h1 class="text-center mb-3">Liste annuaire</h1>

        
        <?php if(isset($msgSuccess)) echo $msgSuccess; ?>

        <p><span class="badge text-bg-primary fs-4">Nombre de femmes :
            <?= $nbFemmes['nbFemmes']?></span></p>

            <p><span class="badge text-bg-danger fs-4">Nombre d'hommes :
            <?= $nbHommes['nbHomme']?></span></p>


        <table class="table table-bordered text-center">
            <tr>
                <?php foreach($arrayMultiAnnuaire[0] as $key => $value): 
                    // echo '<pre>'; print_r($key); echo '</pre>';
                ?>
                    <th><?= $key ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
            <?php foreach($arrayMultiAnnuaire as $key => $array): 
                    // echo '<pre>'; print_r($key); echo '</pre>';
                    // echo '<pre>'; print_r($array); echo '</pre>';
                ?>
                <tr>
                <?php foreach($array as $value): ?>
                    <td><?= $value ?></td>         
                <?php endforeach; ?> 
                    <td>
                        <a href="correrction_tp2.php?action=update&id=<?= $array['id_annuaire'] ?>" class="btn btn-primary mb-2"><i class="fa-solid fa-pen-to-square"></i></a>

                        <!-- <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> -->

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $array['id_annuaire'] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>        
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal-<?= $array['id_annuaire'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmer la suppression</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Voulez-vous réellement suprimer <?= $array['prenom'] ?> <?= $array['nom'] ?> ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <a href="?action=delete&id=<?= $array['id_annuaire'] ?>" class="btn btn-danger">Valider</a>
                            </div>
                        </div>
                    </div>
                </div>
                                
            <?php endforeach; ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>