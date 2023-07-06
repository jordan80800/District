<?php
session_start();

include "db.php";
include "DAO/Presentation.classes.php";
include "DAO/fonction.classe.php";
$header = new Utilitaires();
$db = connexionBase();
$fonction = new Fonction();

$toutecat = $fonction->GetAllCategories();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon " type="image/png" href="assets/images_the_district/the_district_brand/instagram_profile_image-removebg-preview.png">
    <title>Plats</title>
</head>

<body>
    <?= $header->GetNav(); ?>

    <?= $header->GetImageheader(false); ?>

    <?php foreach ($toutecat as $unecategorie) :
        $toutplat = $fonction->GetPlatsByCategorie($unecategorie['id']);
    ?>
        <div class="row mt-2" id="cat<?=$unecategorie['id']?>">
            <div class="col">
                <div class="categorie">
                    <hr>
                    <h1 class="g-2">LES <?= $unecategorie['libelle'] ?></h1>
                    <div class="row">
                        <?php foreach ($toutplat as $unplat) : ?>
                            <div class="col-6">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 xs-8">
                                        <img src="assets\images_the_district\food/<?= $unplat['image'] ?>" class="cat-image" alt="Image" id="imagedesplatsdepageplats">
                                    </div>
                                    <div class="col-md-6 xs-2">
                                        <b>
                                            <p class="w-100 description"><?= $unplat['description'] ?></p>
                                        </b>
                                        <?php if (isset($unplat['id'])): ?>
                                            <a href='commande.php?id=<?= $unplat['id'] ?>' class="btn text-light btncommande" id="bout">Commander</a>
                                        <?php endif; ?>
                                    </div>
                                    <p class="p_pagepalt"><?= $unplat['libelle'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
