<?php
include 'connection.php';

if (isset($_GET['id'])) 
{
    $id = intval($_GET['id']); 
    $query = mysqli_prepare($link, "SELECT * FROM users WHERE id = ?");
    mysqli_stmt_bind_param($query, "i", $id);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) 
    {
        echo "Utilisateur inexistant.";
        exit();
    }
} 
 else 
 {
    echo "ID invalide.";
    exit();
 }

mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="update.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de modification</title>
</head>
<body>

<header>
    <h1>Modifier infos utilisateur</h1>
</header>

<nav>
    <a href="http://localhost:8080/projet_php/read.php">Liste des utilisateurs</a>
    <a href="http://localhost:8080/projet_php/create.html">Ajout d'utilisateurs</a>
</nav>

<div class="container">
    <div class="content">
        <h2>Modifier les informations</h2>
        <form action="update_utilisateurs.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" value="<?= htmlspecialchars($user['login']) ?>" required>
            </div>

            <div class="form-group">
                <label for="pfp">Photo de profil</label>
                <img src="<?= htmlspecialchars($user['pfp']) ?>" alt="Photo de profil" width="25" height="25">
                <input type="file" id="pfp" name="pfp">
            </div>

            <button type="submit">Confirmer modification</button>
        </form>
    </div>
</div>

</body>
</html>
