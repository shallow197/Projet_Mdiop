<?php 
	include 'connection.php';


    $prenom = $_POST["prenom"];
    $name = $_POST["name"];
    $password = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
    $login = $_POST["login"];
    $profile_pic = "";
    if (isset($_FILES["pfp"])) 
    {
	        $file = basename($_FILES['pfp']['name']);
            $tmp = $_FILES['pfp']['tmp_name'];
            $new_file = "pics/" . $file;
            move_uploaded_file($tmp, $new_file);
            $profile_pic = $new_file;
            
    }

    $query = "INSERT INTO users(nom, prenom, login, password, pfp)  VALUES ('$name', '$prenom', '$login', '$password', '$profile_pic')";
    $result = mysqli_query($link, $query);
  
    if ($result) 
    {
        echo "<script>
	      alert('Nouvel utilisateur enregistré avec succès !'); 
          window.location.href='create.html';
 	      </script>";
    } 
    else 
    {
        echo "Une erreur a été rencontrée lors de l'ajout !";
    }

  
    mysqli_close($link);

?>

