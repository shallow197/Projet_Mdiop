<?php 
	include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prenom = $_POST["prenom"];
    $name = $_POST["name"];
    $password = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
    $login = $_POST["login"];
    $profile_pic = "";
    if (isset($_FILES["pfp"])) {
	    $file = basename($_FILES['pfp']['name']);
            $tmp = $_FILES['pfp']['tmp_name'];
            $new_file = "pics/" . $file);
            move_uploaded_file($tmp, $new_file);
            $profile_pic = $new_file;
    }

    $query = "INSERT INTO users(nom, prenom, login, password, pfp)  VALUES ('$name', '$prenom', '$login', '$password', '$profile_pic')";
    $result = mysqli_query($link, $query);
  
    if ($result) 
    {
        echo "<script>
	      alert('Utilisateur ajouté avec succès!'); 
              header( Location: 'http://localhost:8080/projet_php/create.html');
 	      </script>";
    } 
    else 
    {
        echo "Erreur lors de l'ajout : " . mysqli_error($link);
    }

  
    mysqli_close($link);
}
?>
