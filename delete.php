<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécurisation de l'ID

    $query = "DELETE FROM users WHERE id = " . $id;

    if (mysqli_query($link, $query)) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($link);
    }

    mysqli_close($link); // Fermeture de la connexion
    header("Location: read.php");
    exit();
}
?>
