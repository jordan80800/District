<?php
session_start();
include 'db.php';
$db= ConnexionBase();



if($_SERVER['REQUEST_METHOD']=="POST"){
$username= $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$query=$db->prepare("select nom_prenom,email,password from utilisateur where nom_prenom=:username");
$query->bindValue(':username',$username);
$query->execute();
$user= $query->fetch();


if($password==$user["password"]){
$_SESSION['name']=$user['nom_prenom'];
 header("Location: index.php");
exit;
}
else{
    unset($_SESSION['name']);
    echo 'user ou mdp incorrect';
}

}