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
        $extension = strtolower(pathinfo($new_file, PATHINFO_EXTENSION));

      
        $extensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($extension, $extensions)) {
            die("Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
        }

        
        if (!move_uploaded_file($_FILES["pfp"]["tmp_name"], $new_file)) {
            die("Erreur lors de l'upload de l'image.");
        }

       
        $query = $link->prepare("UPDATE users SET nom=?, prenom=?, login=?, pfp=? WHERE id=?");
        $query->bind_param("ssssi", $nom, $prenom, $login, $new_file, $id);
    } 
    else 
    {
        $query = $link->prepare("UPDATE users SET nom=?, prenom=?, login=?, pfp=? WHERE id=?");
        $query->bind_param("ssssi", $nom, $prenom, $login, $new_file, $id);
    }

    if ($query->execute()) 
    {
        echo "<script>alert('Utilisateur mis à jour avec succès !'); window.location.href='read.php';</script>";
    } 
    else 
    {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }

    $query->close();
    $conn->close();;
}
?>
