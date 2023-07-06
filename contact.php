<?php
session_start();
include "db.php";
include "DAO/Presentation.classes.php";

$db = connexionBase();
$header = new Utilitaires;





?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon " type="image/png" href="assets/images_the_district/the_district_brand/instagram_profile_image-removebg-preview.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php echo $header->GetNav() ?>
<?php echo $header->GetImageheader(false) ?>
<form method="post" enctype="multipart/form-data" class="inputname" id="form1" action="script_contact.php">
        <div class="row mt-3 justify-content-center ">
            <h1><b>CONTACT</b></h1>
        <div class="col-md-4">
            <div class="mb-3">
              <label for="Nom" class="form-label text-dark">nom</label>

              <input type="nom" class="form-control " id="nom" aria-describedby="nom" name="nom">
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="mb-3">
              <label for="prenom" class="form-label text-dark" >prenom</label>
              <input type="texte" class="form-control   " id="prenom" aria-describedby="prenom" name="prenom" required>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4 " >
            <div class="mb-3">
              <label for="Email" class="form-label text-dark">Email</label>

              <input type="email" class="form-control " id="Email" aria-describedby="Email" name="email">
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="mb-3">
              <label for="Téléphone" class="form-label text-dark">Téléphone</label>
              <input type="texte" class="form-control   " id="telephone" aria-describedby="Téléphone" name="telephone" required>
              
            </div>
          </div>
          <div class="row ">
            <div class="col">
              <div class="mb-3">
                <div class="d-flex justify-content-center">
                  <label for="adresse" class="form-label  text-dark">Votre demande :</label>
                </div>
                <div class="d-flex justify-content-center">
                  <textarea class="form-control w-75   " id="demande" rows="4" name="demande" required></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-auto ">
<input type="submit" name="envoye" class="btn bg-dark text-light" value="Envoyer">
</div>
</div>

      </form>

</body>
</html>