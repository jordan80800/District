<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

include "db.php";
include "DAO/fonction.classe.php";

$db = connexionBase();

if (isset($_POST['commande'])) goto TrtRedirection; {

    $fonctions = new Fonction();
    $id_plat = (isset($_POST['id_plat']) && $_POST['id_plat'] != "") ? $_POST['id_plat'] : Null;
    $quantite = (isset($_POST['quantite']) && $_POST['quantite'] != "") ? $_POST['quantite'] : Null;
    $plat = $fonctions->GetPlatById($id_plat);
    $total = $plat['prix'] * $quantite;
    $date_commande = new DateTime('now');
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
    $requete->bindValue(":id_plat", $id_plat);
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

    require_once 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    $mail->CharSet = "utf-8";
    // On va utiliser le SMTP
    $mail->isSMTP();

    // On configure l'adresse du serveur SMTP
    $mail->Host       = 'localhost';

    // On désactive l'authentification SMTP
    $mail->SMTPAuth   = false;

    // On configure le port SMTP (MailHog)
    $mail->Port       = 1025;

    // Expéditeur du mail - adresse mail + nom (facultatif)
    $mail->setFrom('District@commande.com', 'The District Company');

    // Destinataire(s) - adresse et nom (facultatif)
    $mail->addAddress("jordan80800@hotmail.fr", "Mr Client1");
    $mail->addAddress("client2@example.com");

    //Adresse de reply (facultatif)
    $mail->addReplyTo("reply@thedistrict.com", "Reply");

    //CC & BCC
    $mail->addCC("cc@example.com");
    $mail->addBCC("bcc@example.com");

    // On précise si l'on veut envoyer un email sous format HTML 
    $mail->isHTML(true);
    // Sujet du mail
    $mail->Subject = 'commande ';

    // Corps du message
    $mail->Body = "$nom_client Votre Commande d'un total de $total € c'est bien  passée <br> passée le $date_commande_formatee";

    // On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
    if ($mail) {
        try {
            $mail->send();
            echo 'Email envoyé avec succès';
        } catch (Exception $e) {
            echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }
} catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script");
}



TrtRedirection:
// header("Location: index.php");
exit;
