<?php
session_start();
include "db.php";
include "DAO/fonction.classe.php";
include "DAO/Presentation.classes.php";

$header = new Utilitaires;
$db = connexionBase();
$requete= new Fonction ;

$lesCategories=$requete->GetCategoryPop();
$lesplats=$requete->GetPlatPop();


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon " type="image/png" href="assets/images_the_district/the_district_brand/instagram_profile_image-removebg-preview.png">
  <title>Accueil</title>
</head>

<body>
  <?php echo $header->GetNav() ?>
  <?php echo $header->GetImageheader(true) ?>
<?php


?>
<div class="row">
  <div class="col d-flex justify-content-center">
  <h1>Les meilleurs categories :</h1>
  </div>
  </div>
  <div class="container-fluid  ">
    <div class="row mt-5 g-3 d-flex justify-content-center ">
      <?php foreach ($lesCategories as $uneCategorie) : ?>
        <div class="col-md-3 ">
            <div class="image-container">
            <a href="catplats.php?catid=<?= $uneCategorie['id'] ?>">
<img src="assets\images_the_district\category/<?= $uneCategorie['image'] ?>"  class=" cat-image" alt="Image" id="imagee">
</a>
<a href="#" type="button" class="btn  boutoncat"><?= $uneCategorie['libelle'] ?></a>

            </div>
          
        </div>
      <?php endforeach; ?>
    </div>
    <hr>
    <div class="row">
      <div class="col d-flex justify-content-center">
    <h1>Nos meilleurs Plats :</h1>
    </div>
    </div>

    <div class="row mt-5 g-3 d-flex justify-content-center" >
      <?php foreach ($lesplats as $unplat) : ?>
        <div class="col-md-3">
            <div class="image-container " >
            <a href="catplats.php?catid=<?= $unplat['id'] ?>">
<img src="assets\images_the_district\food/<?= $unplat['image'] ?>"  class=" cat-image" alt="Image" id="imagee">
</a>
<a href="" type="button" class="btn  boutonplat"><?= $unplat['libelle'] ?></a>

            </div>
          
        </div>
      <?php endforeach; ?>
    </div>
    </div>
    <?php echo $header->GetFooter() ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>