<?php
include "db.php";
include "DAO/fonction.classe.php";

$db = connexionBase();


if (isset($_POST['commande'])) goto TrtRedirection; {
    
    $fonctions = new Fonction();
    $id_plat= (isset($_POST['id_plat']) && $_POST['id_plat'] != "") ? $_POST['id_plat'] : Null;
    $quantite = (isset($_POST['quantite']) && $_POST['quantite'] != "") ? $_POST['quantite'] : Null;
    $plat = $fonctions->GetPlatById($id_plat);
    $total = $plat['prix'] * $quantite;
    $date_commande = New DateTime('now');
    $date_commande_formatee = $date_commande->format('Y-m-d H:i:s');
    $etat = "En attente";
    $nom_client = (isset($_POST['nom_client']) && $_POST['nom_client'] != "") ? $_POST['nom_client'] : Null;
    $telephone_client = (isset($_POST['telephone_client']) && $_POST['telephone_client'] != "") ? $_POST['telephone_client'] : Null;
    $email_client = (isset($_POST['email_client']) && $_POST['email_client'] != "") ? $_POST['email_client'] : Null;
    $adresse_client = (isset($_POST['adresse_client']) && $_POST['adresse_client'] != "") ? $_POST['adresse_client'] : Null;
}


try {
    // Construction de la requête UPDATE sans injection SQL :
    $requete = $db->prepare("INSERT INTO commande (id_plat,quantite,total,date_commande,etat,nom_client,telephone_client,email_client,adresse_client) Values (:id_plat,:quantite,:total,:date_commande_formatee,:etat,:nom_client,:telephone_client,:email_client,:adresse_client)");
    $requete->bindValue(":id_plat",$id_plat);
    $requete->bindValue(":quantite", $quantite, PDO::PARAM_INT);
    $requete->bindValue(":total", $total);
    $requete->bindValue(":date_commande_formatee", $date_commande_formatee);
    $requete->bindValue(":etat", $etat);
    $requete->bindValue(":nom_client", $nom_client);
    $requete->bindValue(":telephone_client", $telephone_client);
    $requete->bindValue(":email_client", $email_client);
    $requete->bindValue(":adresse_client", $adresse_client);
    $requete->execute();
    $requete->closeCursor();
} catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script");
}
TrtRedirection:
header("Location: index.php");
exit;


?>