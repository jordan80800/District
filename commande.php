<?php
session_start();

include "db.php";
include "DAO/fonction.classe.php";
include "DAO/Presentation.classes.php";

$header = new Utilitaires();
$db = connexionBase();

if (isset($_GET['id'])) {
  $platid = $_GET['id'];
  $requete = $db->prepare("SELECT * FROM plat WHERE id=:id");
  $requete->execute([':id' => $platid]);
  $lesplats = $requete->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['id'])) {
  $platid = $_GET['id'];
  $requete = $db->prepare("SELECT * FROM plat WHERE id=:id");
  $requete->execute([':id' => $platid]);

  $lesplats = $requete->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>

  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/png" href="assets/images_the_district/the_district_brand/instagram_profile_image-removebg-preview.png">
  <title>Commande</title>
</head>

<body>
  <div class="bg bg-blur">
    <?php echo $header->GetNav() ?>

    <br>
    <div class="container custom-container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 p-0 ">
          <?php foreach ($lesplats as $unplatid) { ?>
            <img src="assets/images_the_district/food/<?= $unplatid['image'] ?>" alt="Image" id="image">
        </div>
        <div class="col-12 col-md-7 m-0">
          <h2 class="text-light m-0 d-flex justify-content-center"><?= $unplatid['libelle'] ?></h2>
          <p class="text-light fot description no-margin break-word m-0"><?= $unplatid['description'] ?></p><br>
          <p class="text-light m-0">Prix : <?= $unplatid['prix'] ?>€</p> <br>
          <div class="row align-items-center d-flex justify-content-between">
            <div class="col">
              <div class="quantity-input">
                <p class="text-light m-0">Quantité:</p>
                <input type="number" class="form-control" min="1" max="30" name="quantite" form="form1" required>
              </div>
            </div>
            <div class="col">
              <input type="button" onclick="Commande()" class="btn bg-dark text-light m-2" value="commander" id="commande" name="commande">
              <a href="plats.php" class="btn bg-dark text-light ml-2">Retour</a>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
      <?php
      $function = new Fonction;
      ?>
      <form method="post" enctype="multipart/form-data" class="inputname" id="form1" action="script_commande.php">
        <div class="row mt-3 justify-content-center">
          <div class="col">
            <div class="mb-3">
              <label for="Nomprenom" class="form-label text-light">Nom, Prénom</label>
              <input type="text" class="form-control" id="Nomprenom" aria-describedby="Nomprenom" name="nom_client" required>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="Email" class="form-label text-light">Email</label>


              <input type="email" class="form-control " id="Email" aria-describedby="Email" name="email_client">

            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="Téléphone" class="form-label text-light">Téléphone</label>
              <input type="texte" class="form-control   " id="telephone" aria-describedby="Téléphone" name="telephone_client" required>
            </div>
          </div>
          <div class="row ">
            <div class="col">
              <div class="mb-3">
                <div class="d-flex justify-content-center">
                  <label for="adresse" class="form-label  text-light">Votre Adresse :</label>
                </div>
                <div class="d-flex justify-content-center">
                  <textarea class="form-control w-75   " id="adresse" rows="4" name="adresse_client" required></textarea>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" value='<?= $platid ?>' name="id_plat">


      </form>
    </div>
  </div>

  </div>
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>