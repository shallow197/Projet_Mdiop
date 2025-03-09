<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = " . $id;

    if ($link->query($query) === TRUE) 
    {
        echo "Utilisateurs supprimé avec succès.";
    } 
    else 
    {
        echo "Erreur lors de la suppression : " . $link->error;
    }

    $link->close();
    header("Location: read.php");
    exit();
}
?>
