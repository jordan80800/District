<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'vendor/autoload.php';

if(isset($_POST['envoye'])){
 $nom = (isset($_POST['prenom']) && $_POST['prenom'] != "") ? $_POST['prenom'] : Null;
 $prenom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
 $telephone = (isset($_POST['telephone']) && $_POST['telephone'] != "") ? $_POST['telephone'] : Null;
 $email = (isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : Null;
 $demande = (isset($_POST['demande']) && $_POST['demande'] != "") ? $_POST['demande'] : Null;

}
var_dump($_POST);
 try {

    $mail = new PHPMailer(true);

    $mail->CharSet = "utf-8";
    // On va utiliser le SMTP
    $mail->isSMTP();

    // On configure l'adresse du serveur SMTP
    $mail->Host     = 'localhost';

    // On désactive l'authentification SMTP
    $mail->SMTPAuth  = false;

    // On configure le port SMTP (MailHog)
    $mail->Port       = 1025;

    // Expéditeur du mail - adresse mail + nom (facultatif)
    $mail->setFrom($email);

    // Destinataire(s) - adresse et nom (facultatif)
    $mail->addAddress("District@compagny.fr", "District");

    //Adresse de reply (facultatif)
    $mail->addReplyTo("reply@thedistrict.com", "Reply");



    // On précise si l'on veut envoyer un email sous format HTML 
    $mail->isHTML(true);
    // Sujet du mail
    $mail->Subject = 'Demande ';

    // Corps du message
    $mail->Body = $demande;

    // On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
    if ($mail) {
        try {
            $mail->send();
            echo 'Email envoyé avec succès';
                var_dump($mail);

        } catch (Exception $e) {
            echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }
} catch (Exception $e) {
    var_dump($e);

    echo "Erreur : " ,"<br>";
    die("Fin du script");
}


