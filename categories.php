<?php
session_start();

include "db.php";
include "DAO/Presentation.classes.php";
include "DAO/fonction.classe.php";
$header = new Utilitaires();
$db = connexionBase();
$fonction = new Fonction();


$catparpage = 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page -1) * $catparpage;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categories</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php echo $header->GetNav(); ?>
  <?php echo $header->GetImageheader(false); ?>
  <br><br>
  <div class="container-fluid">
    <div class="d-flex justify-content-center w-100">
      <div class="row d-flex justify-content-center align-items-center w-75 rowcat g-2">
        <h1>Toutes Nos Catégories</h1>
        <?php
$toutecat = $fonction->GetAllCategories();

foreach ($toutecat as $uneCate) :
  $toutecat = $fonction->GetPage();

?>
          <div class="col-md-4 d-flex justify-content-center align-items-center position-relative">
            <div class="image-container w-100 d-flex justify-content-center">
              <img src="assets/images_the_district/category/<?php echo $uneCate['image']; ?>" class="img cat-image" alt="Image" id="imagepagecat">
            </div>
            <a href="plats.php#cat<?=$uneCate['id']?>" type="button" class="btn bg-dark text-light btnpagecate"><?= $uneCate['libelle'] ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="d-flex justify-content-center w-100">
      <div class="w-75 d-flex justify-content-between containbutton">
      <?php
$totalpages = $fonction->GetPage();
?>
<div class="precedent">
  <a class="btn btn-nav <?= ($page == 1) ? "disabled" : "" ?>" style="color: #000000;" href="?page=<?php echo $page - 1; ?>">
    <i class="fa-solid fa-arrow-left fa-2xl"></i>
  </a>
</div>
<div class="suivant">
  <a class="btn btn-nav <?= ($page >= $totalpages) ? "disabled" : "" ?>" style="color: #000000;" href="?page=<?php echo $page + 1; ?>">
    <i class="fa-solid fa-arrow-right fa-2xl"></i>
  </a>
</div>

      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>