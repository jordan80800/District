<?php

include 'db.php';
$db = ConnexionBase();
include "DAO/Presentation.classes.php";
$header = new Utilitaires;



?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sign_up_and_log_in.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

</head>

<body class="bodysign">
    <div class="container-fluid">
        <?php echo $header->GetNav() ?>
        <?php echo $header->GetImageheader(true) ?>

        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="row w-50 text-center ">
                <div class="entete">
                    <h1 class="text-dark">Se Connecter</h1>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center  formss">
            <div class="d-flex justify-content-center align-items-center w-50 inputform">
                <div class="row w-50 center-inputs">
                    <div class="col">
                        <form action="log_in_script.php" method="POST">
                            <div class="mb-3">
                                <h5><label for="Nom Prénom" class="form-label text-dark">Nom d'utilisateur</label></h5>
                                <input type="texte" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <h5>
                                    <h5> <label for="email" class="form-label text-dark">Email</label></h5>
                                    <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <h5> <label for="password" class="form-label text-dark">Mot De Passe</label></h5>
                                <input type="password" class="form-control" id="lightpassword" name="password">
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn d-flex justify-content-center align-items-center btnform">
            <div class="row w-50">
                <div class="col">
                    <input type="submit" class="btn bg-dark text-light m-2" value="Se Connecter" id="confirm" name="confirm">
                </div>
                </form>
            </div>
        </div>
</body>

</html>