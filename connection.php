<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "essai1";


$conn =  new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) 
    die("La connexion a échoué: " . $conn->connect_error);

?>
