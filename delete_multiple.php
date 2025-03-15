<?php
include 'connection.php';

if (isset($_POST['users_to_delete'])) 
{

    $users_to_delete = $_POST['users_to_delete'];


    $ids = implode(',', array_map('intval', $users_to_delete));  
    $query = "DELETE FROM users WHERE id IN ($ids)";
    
    $result = mysqli_query($link, $query);

    if ($result) 
    {
        echo "<script>
                 alert('Utilisateur(s) supprimé(s) avec succès !');
                 window.location.href = 'read.php'; 
              </script>";
    } 
    else 
    {
        echo "Une erreur a été rencontrée lors de la suppression !";
    }

} 
else 
{
    echo "<script>
    alert('Aucun utilisateur selectionné !'); 
    window.location.href='read.php';
    </script>";
}

mysqli_close($link);
?>
