<?php
session_start();
$login = isset($_SESSION['login']) ? htmlspecialchars($_SESSION['login']) : '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Accueil</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="administrateur.php" method="post">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" value="<?php echo $login; ?>" required><br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

