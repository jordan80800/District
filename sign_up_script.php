<?php
session_start();
include 'db.php';
$db = ConnexionBase();
if (isset($_POST['confirm'])) {
  $name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : null;
  $email = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : null;
  $password = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : null;

  if ($name != null && $password != null && $email != null) {
    try {
      $requete = $db->prepare("INSERT INTO utilisateur (nom_prenom, email, password) VALUES (:name, :email, :password)");
      $requete->bindValue(":name", $name);
      $requete->bindValue(":email", $email);
      $requete->bindValue(":password", $password);
      $requete->execute();
    } catch (PDOException $e) {
      echo "Une erreur est survenue lors de l'exécution de la requête : " .$e->getMessage();
    }
    header("Location: index.php");
    exit;
  }
  else{
    header("Location: sign_up_form.php ");
  }
}

