<?php
session_start();

include 'connection.php';

if (isset($_POST['login'])) 
{
    $login = $_POST['login'];
    $mdp_hashe = hash('sha256', $_POST['password']);

    $query = "SELECT * FROM admins WHERE login = '$login' AND password = '$mdp_hashe'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) 
    {
        $admin = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $admin['login']; 
        $_SESSION['prenom'] = $admin['prenom']; 
        $_SESSION['nom'] = $admin['nom']; 

        $prenom_admin = htmlspecialchars($admin['prenom']);
        $nom_admin = htmlspecialchars($admin['nom']);

        echo "<script>
                 alert('Bienvenue administrateur $prenom_admin $nom_admin!');
                 window.location.href='create.php';
              </script>";
    } 
    else 
    {
        echo "<script>
                 alert('Login ou mot de passe incorrect !'); 
                 window.location.href='admin.php';
              </script>";
    } 

    mysqli_close($link);
}
?>
