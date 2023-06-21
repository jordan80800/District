<?php
include "db.php";

$db = connexionBase();

$requete = $db->query("SELECT categorie.image,categorie.libelle
from categorie");
$toutecat = $requete->fetchAll(PDO::FETCH_ASSOC);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body id="body1" class="d-flex justify-content-center align-items-center">
    <div class="container-fluid d-flex justify-content-center align-items-center">


    <div class="row mt-5 g-3  d-flex justify-content-center align-items-center w-75 rowcat ">
      <?php foreach ($toutecat as $uneCate) : ?>
        <div class="col-md-4 d-flex justify-content-center align-items-center h-25">
            <div class="image-container">
            <img src="assets\images_the_district\category/<?php echo $uneCate['image']; ?>"  class="img cat-image" alt="Image" id="imagee">
</a>
            </div>
            <a href="#" type="button" class="btn bg-dark text-light btnpagecate"><?= $uneCate['libelle'] ?></a>
          
        </div>
      <?php endforeach; ?>
    </div>


 






        