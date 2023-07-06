<?php
session_start();
include "db.php";
include "DAO/fonction.classe.php";


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de Bord</title>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col">
        <nav class="navbar bg-body-secondary px-3">
          <div class="container d-flex  justify-content-center ">
          <a class="navbar-brand h1" href="#">Tableau De Bord</a>

          </div>
          <div class="d-flex justify-content-end align-items-end" >
            <a href="index.php" class="btn bg-dark text-light ">Retour</a>

          </div>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col d-flex justify-content-center align-items-center">
        <h1 class="border border-3">Gestion Des Catégories</h1>
      </div>
    </div>
    <div class="row">
      <div class="col">

        <table class="table">
          <thead>
            <tr class="align-middle">
              <th scope="col">Id</th>
              <th scope="col">Libelle</th>
              <th scope="col">Image</th>
              <th scope="col">Active</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            <?php
             $requete = new Fonction();
             $toutecat= $requete->GetAllCategories();
            foreach ($toutecat as $unecat) {
              ?>
              <tr >
                <th ><input class="w-25"  type="texte" value="<?= $unecat['id'] ?>"></th>
                <th><input class="w-25" type="text" name="libelle" value="<?= $unecat['libelle'] ?>" form="forms<?=$unecat['id']?>"></th>
                <th><input class="w-50" type="text" name="image" value="<?= $unecat['image'] ?>" form="forms<?=$unecat['id']?>"></th>
                <th><input class="w-25" type="text" name="active" value="<?= $unecat['active'] ?>" form="forms<?=$unecat['id']?>"></th>
                <th>
                  <form action="delete_categorie.php" method="post">
                  <input type="hidden" value="<?=$unecat['id']?>" name='id'>
                  <button type="submit" class="btn bg-primary text-light">Supprimer</button>
                  </form>

                  <form action="modif_categorie.php" method="post" id="forms<?=$unecat['id']?>">
                  <input type="hidden" value="<?=$unecat['id']?>" name='id'>
                  <button type="submit" class="btn bg-danger text-light" >modifier</button>
                  </form>
              </th>
              </tr>



            <?php
            } ?>



          </tbody>
        </table>

      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1 class="border border-3">Gestion Des plats</h1>
      </div>
    </div>
    <div class="row">
      <div class="col">

        <table class="table px-5">
          <thead>
            <tr class="align-middle">
              <th scope="col" class="align-middle">Id</th>
              <th scope="col">Libelle</th>
              <th scope="col">description</th>
              <th scope="col">prix</th>
              <th scope="col">image</th>
              <th scope="col">id_categorie</th>
              <th scope="col">active</th>
              <th scope="col">action</th>



            </tr>
          </thead>
          <hr>
          <tbody>
            <?php
             $requete = new Fonction();
             $toutplat = $requete->GetAllPlats();

            foreach ($toutplat as $unplat) {
              ?>
              <tr class="align-middle" >
                <th ><input class="w-25" type="texte" value="<?= $unplat['id'] ?>"></th>
                <th><input class="w-75" type="text" name="libelle" value="<?= $unplat['libelle'] ?>" form="formsp<?=$unplat['id']?>"></th>
                <th><input class="w-100" type="text" name="description" value="<?= $unplat['description'] ?>" form="formsp<?=$unplat['id']?>"></th>
                <th><input class="w-25" type="text" name="prix" value="<?= $unplat['prix'] ?> €" form="formsp<?=$unplat['id']?>"></th>
                <th ><input class="w-50" type="texte" name="image" value="<?= $unplat['image'] ?>" form="formsp<?=$unplat['id']?>"></th>
                <th><input class="w-25" type="text"  value="<?= $unplat['id_categorie'] ?>" form="formsp<?=$unplat['id']?>"></th>
                <th><input class="w-50" type="text" name="active" value="<?= $unplat['active'] ?>" form="formsp<?=$unplat['id']?>"></th>
                <th>
                  <div class="col-6">
                  <form action="delete_plat.php" method="post">
                  <input type="hidden" value="<?=$unplat['id']?>" name='id'>
                  <button type="submit" class="btn bg-primary text-light">Supprimer</button>
                  </form>                  </div>
                  <div class="col-6">
                  <form action="modif_plat.php" method="post" id="formsp<?=$unplat['id']?>">
                  <input type="hidden" value="<?=$unplat['id']?>" name='id'>
                  <button type="submit" class="btn bg-danger text-light" >modifier</button>
                  </form>
                  </div>

              </th>
              </tr>



            <?php
            } ?>



          </tbody>
        </table>

      </div>
    </div>




  </div>
</body>

</html>