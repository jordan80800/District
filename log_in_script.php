<?php
session_start();
include 'db.php';
$db= ConnexionBase();



if($_SERVER['REQUEST_METHOD']=="POST"){
$username= $POST['name'];
$password = $_POST['password'];
$query=$db->prepare("select nom_prenom,password from utilisateur where nom_prenom=:user");
$query->bindValue(':name,$name');
$query->execute();
$user= $query->fetch();


if($user && password_verify($password,$user['password'])){
$_SESSION['name']=$user['nom_prenom'];
header("Location: index.php");
exit;
}
else{
    unset($_SESSION['name']);
    echo 'user ou mdp incorrect';
}

}