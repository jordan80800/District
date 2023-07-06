<?php
require 'db.php';
$db=ConnexionBase();


if(isset($_POST['id'])){

try{
    $id=$_POST['id'];
    $requete = $db->prepare("DELETE FROM categorie where id=:id");
    $requete->execute(array(':id'=>$id ));
    $requete->closeCursor();

} catch(Exception $e){
    echo 'Impossible de supprimer';
}
}
 TrtRedirection:
 header("Location: dashboard.php");
 exit;