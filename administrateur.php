<?php
session_start();
if (isset($_POST['login'])) 
{
    $_SESSION['login'] = $_POST['login'];
}
include 'connection.php';

$login = $_POST['login'];
$mdp_hashe = hash('sha256', $_POST['password']);

$query = "SELECT * FROM admins WHERE login = '$login' AND password = '$mdp_hashe'";
$result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) 
    {
    $admin = mysqli_fetch_assoc($result);
    $prenom_admin = htmlspecialchars($admin['prenom']);
    $nom_admin = htmlspecialchars($admin['nom']);
    echo "<script>
             alert('Bienvenue administrateur $prenom_admin $nom_admin!');
             window.location.href='create.html';
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
?>

