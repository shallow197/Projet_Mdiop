<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];
    $sql = $conn->prepare("SELECT pfp FROM users WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();
    $user = $result->fetch_assoc();
    $profile_pic = $user['pfp']; 

    if (isset($_FILES["pfp"]) && $_FILES["pfp"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["pfp"]["name"]);
        move_uploaded_file($_FILES["pfp"]["tmp_name"], $target_file);
        $profile_pic = $target_file; 
    }


    $sql = $conn->prepare("UPDATE users SET nom = ?, prenom = ?, login = ?, pfp = ? WHERE id = ?");
    $sql->bind_param("ssssi", $nom, $prenom, $login, $profile_pic, $id);

    if ($sql->execute()) {
        echo "<script>alert('Utilisateur mis à jour avec succès !'); window.location.href='read.php';</script>";
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }

    $sql->close();
    $conn->close();
}
?>