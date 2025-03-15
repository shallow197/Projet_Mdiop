<?php
session_start();
if (isset($_POST['login'])) 
{
    $_SESSION['login'] = $_POST['login'];
}
include 'connection.php';


    $id = $_POST['id'];
    $nom = $_POST["name"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];

    if ($_FILES["pfp"]["name"] != "") 
    {
        $chemin = "pics/"; 
        $new_file = $chemin . basename($_FILES["pfp"]["name"]);

        if (!move_uploaded_file($_FILES["pfp"]["tmp_name"], $new_file)) 
        {
            die("Une erreur a été rencontrée lors du téléchargement de l'image.");
        }

        
        $query = "UPDATE users SET nom='$nom', prenom='$prenom', login='$login', pfp='$new_file' WHERE id=$id";
        $result = mysqli_query($link, $query);
        
    } 
    else 
    {        
        $query = "UPDATE users SET nom='$nom', prenom='$prenom', login='$login' WHERE id=$id";
        $result = mysqli_query($link, $query);
        
    }

    if ($result) 
    {
        echo "<script>
             alert('Informations modifiées avec succès !'); 
             window.location.href='read.php';
             </script>";
    } 
    else 
    {
        echo "Une erreur a été rencontrée lors de la modfication. Les nouvelles données n'ont pas été sauvegardées : " . mysqli_error($link);
    }

    mysqli_close($link);

?>

