<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nom = $_POST["name"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];

    if ($_FILES["pfp"]["name"] != "") {
        $chemin = "pics/"; 
        $new_file = $chemin . basename($_FILES["pfp"]["name"]);
        $extension_image = strtolower(pathinfo($new_file, PATHINFO_EXTENSION));

        $extensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($extension_image, $extensions)) 
        {
            die("La photo de profil ne peut être qu'une image !");
        }

        if (!move_uploaded_file($_FILES["pfp"]["tmp_name"], $new_file)) 
        {
            die("Une erreur a été rencontrée lors du téléchargement de l'image.");
        }

        
        $query = mysqli_prepare($link, "UPDATE users SET nom=?, prenom=?, login=?, pfp=? WHERE id=?");
        mysqli_stmt_bind_param($query, "ssssi", $nom, $prenom, $login, $new_file, $id);
    } 
    else 
    {
        
        $query = mysqli_prepare($link, "UPDATE users SET nom=?, prenom=?, login=? WHERE id=?");
        mysqli_stmt_bind_param($query, "sssi", $nom, $prenom, $login, $id);
    }

    if (mysqli_stmt_execute($query)) 
    {
        echo "<script>
             alert('Utilisateur mis à jour avec succès !'); 
             window.location.href='read.php';
             </script>";
    } 
    else 
    {
        echo "Erreur lors de la mise à jour : " . mysqli_error($link);
    }

    mysqli_stmt_close($query);
    mysqli_close($link);
}
?>
