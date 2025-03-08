<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = " . $id;

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateurs supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression : " . $conn->error;
    }

    $conn->close();
    header("Location: read.php");
    exit();
}
?>
