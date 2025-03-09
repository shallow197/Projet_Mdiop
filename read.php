<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="read.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des utilisateurs</title>
</head>
<body>

<header>
    <h1>Liste des utilisateurs</h1>
</header>

<nav>
    <a href="http://localhost:8080/projet_php/read.php">Liste des utilisateurs</a>
    <a href="http://localhost:8080/projet_php/create.html">Ajout des utilisateurs</a>
</nav>

<div class="container">
    <div class="content">
        <h2>Utilisateurs inscrits</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Login</th>
                    <th>Photo de profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT id, nom, prenom, login, pfp FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $profile_pic = !empty($row["pfp"]) ? htmlspecialchars($row["pfp"]) : "uploads/image.png";
                        
                        echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["nom"]) . "</td>
                                <td>" . htmlspecialchars($row["prenom"]) . "</td>
                                <td>" . htmlspecialchars($row["login"]) . "</td>
                                <td><img src='" . $profile_pic . "' width='50' height='50' style='border-radius: 50%;'></td>

                                <td>
                                    <a href='http://localhost:8080/projet_php/update.php?id=" . htmlspecialchars($row["id"]) . "'>✏ Modifier</a>
                                    |
                                    <a href='http://localhost:8080/projet_php/delete.php?id=" . htmlspecialchars($row["id"]) . "' onclick='return confirm(\"Êtes-vous sur(e) de vouloir supprimer cet utilisateur ?\");'>🗑 Supprimer</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Pas d'utilisateur disponible</td></tr>";
                }

                $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
