<?php
require 'db.php';
$db=ConnexionBase();


if(isset($_POST['id'])){

try{
    $id=$_POST['id'];
    $requete = $db->prepare("DELETE FROM plat where id=:id");
    $requete->execute(array(':id'=>$id ));
    $requete->closeCursor();

} catch(Exception $e){
    echo 'Impossible de supprimer';
}
}
