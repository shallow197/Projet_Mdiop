<?php
include 'connection.php';


    $id = $_GET['id']; 
    $query = "SELECT * FROM users WHERE id = " . $id;
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);

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
<a href="read.php" class="nav-button">Liste des utilisateurs</a>
<a href="create.html" class="nav-button">Ajout d'utilisateurs</a>
</nav>

<div class="container">
    <div class="content">
        <h2>Modifier les informations</h2>
        <form action="update_utilisateurs.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">


            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" pattern="[A-Za-zÀ-ÿ]+" title="Le prénom ne doit contenir que des lettres." value="<?= htmlspecialchars($user['prenom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" pattern="[A-Za-zÀ-ÿ]+" title="Le nom ne doit contenir que des lettres." value="<?= htmlspecialchars($user['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" value="<?= htmlspecialchars($user['login']) ?>" required>
            </div>

            <div class="form-group">
                <label for="pfp">Photo de profil</label>
                <img src="<?= htmlspecialchars($user['pfp']) ?>" width="50" height="50">
                <input type="file" id="pfp" name="pfp" accept="image/jpeg, image/png, image/gif"><br><br>
            </div>

            <button type="submit">Confirmer modification</button>
        </form>
    </div>
</div>

</body>
</html>
