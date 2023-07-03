<?php
session_start();
include 'db.php';
$db= ConnexionBase();



if($_SERVER['REQUEST_METHOD']=="POST"){
$username= $_poste['name'];
$password = $_POST['password'];
$query=$db->prepare("select nom_prenom,password from user where nom_prenom=:user");
$query->bindValue(':user,$username');
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