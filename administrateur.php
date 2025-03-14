<?php
include 'connection.php';

$login = $_POST['login'];
$hashed_password = hash('sha256', $_POST['password']);

$query = "SELECT * FROM admins WHERE login = '$login' AND password = '$hashed_password'";
$result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<script>
             alert('Bienvenue adminstrateur !'); 
             window.location.href='create.html';
             </script>";
    } 
    else 
    {
    echo "<script>
             alert('Login ou mot de passe incorrect !'); 
             window.location.href='admin.html';
             </script>";
    } 

mysqli_close($link);
?>

