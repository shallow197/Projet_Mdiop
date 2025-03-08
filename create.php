<?php 
	include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nom = $_POST["name"];
    $prenom = $_POST["prenom"];
    $password = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
    $login = $_POST["login"];
    $profile_pic = "";
    if (isset($_FILES["pfp"]) && $_FILES["pfp"]["error"] == 0) {
        $target_dir = "uploads/";  // Dossier où stocker les images
        $target_file = $target_dir . basename($_FILES["pfp"]["name"]);
        move_uploaded_file($_FILES["pfp"]["tmp_name"], $target_file);
        $profile_pic = $target_file;
    }

    $sql = "INSERT INTO users(nom, prenom, login, password, pfp)  VALUES ('$nom', '$prenom', '$login', '$password', '$profile_pic')";

  
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Utilisateur ajouté avec succès !'); window.location.href='http://localhost:8080/projet_diop/utilisateur/utilisateur/create.html';</script>";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
    }

  
    $conn->close();
}
?>