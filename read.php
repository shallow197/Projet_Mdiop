<?php
session_start();
include 'connection.php';


if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 20)) 
{
    session_unset();
    session_destroy();
 
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="read.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des utilisateurs</title>
    <script>
        let timeout;

        function resetTimer() 
        {
            clearTimeout(timeout);
            timeout = setTimeout(() => 
            {
                alert("Vous êtes déconnecté(e) pour inactivité.");
                window.location.href = "admin.php"; 
            }, 20000); 
        }

        document.addEventListener("DOMContentLoaded", resetTimer);
        document.addEventListener("mousemove", resetTimer);
        document.addEventListener("keydown", resetTimer);
    </script>
</head>
<body>


<nav>
    <a href="create.html" class="nav-button">Ajout d'utilisateurs</a>
    <a href="deconnect.php" class="nav-button">Se déconnecter</a>
</nav>

<div class="container">
    <div class="content">
        <h2>Utilisateurs</h2>

        <form action="delete_multiple.php" method="post">
            <table>
                <tr>
                    <th><input type="checkbox" id="selectAll" onclick="toggle(this)"></th> 
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Login</th>
                    <th>Photo de profil</th>
                    <th>Action</th>
                </tr>
                <tbody>
                <?php
                    $query = "SELECT id, nom, prenom, login, pfp FROM users ORDER BY id";
                    $result = mysqli_query($link, $query);

                    if ($result->num_rows > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            $profile_pic = htmlspecialchars($row["pfp"]);

                            echo "<tr>
                                    <td><input type='checkbox' name='users_to_delete[]' value='" . htmlspecialchars($row["id"]) . "'></td>
                                    <td>" . htmlspecialchars($row["id"]) . "</td>
                                    <td>" . htmlspecialchars($row["nom"]) . "</td>
                                    <td>" . htmlspecialchars($row["prenom"]) . "</td>
                                    <td>" . htmlspecialchars($row["login"]) . "</td>
                                    <td><img src='". $profile_pic."' width='50' height='50' style='border-radius: 50%;'></td>
                                    <td>
                                        <a href='update.php?id=" . htmlspecialchars($row["id"]) . "'>modifier</a><br> 
                                        <a href='delete.php?id=" . htmlspecialchars($row["id"]) . "' onclick='return confirm(\"Êtes-vous sûr(e) de vouloir supprimer cet utilisateur ?\");'>supprimer</a>
                                    </td>
                                  </tr>";
                        }
                    } 
                    else 
                    {
                        echo "<tr><td colspan='7'>Aucun utilisateur inscrit.</td></tr>";
                    }

                    mysqli_close($link);
                ?>
                </tbody>
            </table>

            <button type="submit" onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer ces utilisateurs ?');">Supprimer les utilisateurs sélectionnés</button>
        </form>

    </div>
</div>

<script>
function toggle(source) {
    checkboxes = document.getElementsByName('users_to_delete[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
}
</script>

</body>
</html>

