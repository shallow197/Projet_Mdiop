<?php
include 'connection.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = " . $id;

    if($query) 
        echo "Utilisateur supprimé avec succès";
        echo "Erreur lors de la suppression : " .  mysqli_error($link);;


     mysqli_close($link);
    header("Location: read.php");
    exit();
}
?>
