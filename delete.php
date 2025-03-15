<?php
include 'connection.php';

    $id = $_GET['id']; 

    $query = "DELETE FROM users WHERE id = " . $id;
    $result = mysqli_query($link, $query);

    if ($result) 
    {
        echo "<script>
        alert('Utilisateur supprimé avec succès !'); 
        window.location.href='read.php';
        </script>";
    } 
    else 
    {
        echo "Une erreur a été rencontrée lors de la suppression !";
    }

    mysqli_close($link); 
    exit();

?>

