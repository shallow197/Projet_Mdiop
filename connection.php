<?php

$host = "localhost";
$user = "root";
$password = "";
$bdd = "essai1";


$link =  mysqli_connect($host, $user, $password) or die("erreur de connexion au serveur");
$bd_select = mysqli_select_db($link, $bdd) or die("erreur de connexion a la base de donnees");


?>
