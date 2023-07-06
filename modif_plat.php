<<?php
session_start();
include "db.php";
$db = ConnexionBase();

if (isset($_POST['id'])) {
    $id = isset($_POST['id']) && $_POST['id'] !== "" ? $_POST['id'] : null;
    $libelle = isset($_POST['libelle']) && $_POST['libelle'] !== "" ? $_POST['libelle'] : null;
    $active = isset($_POST['active']) && $_POST['active'] !== "" ? $_POST['active'] : null;
    if ($libelle == null || $active == null) {
       echo "Erreur lors de l'envoi", "<br>";
    } 
    else {
        try {
            $requete = $db->prepare("UPDATE plat SET libelle=:libelle, active=:active WHERE id=:id");
            $requete->bindValue(":id", $id, PDO::PARAM_INT);
            $requete->bindValue(":libelle", $libelle, PDO::PARAM_STR);
            $requete->bindValue(":active", $active, PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
            echo "Mise à jour du plat à effectuée avec succès.";
        } catch (PDOException $e) {
            echo "Erreur :" . $e->getMessage(), "<br>";
            die("Fin du script");
        }
    }
}
header("Location: dashboard.php");