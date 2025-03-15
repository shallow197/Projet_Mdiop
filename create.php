<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="create.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajout</title>
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

    <h1>Ajout d'utilisateurs</h1>

    <nav>
        <a href="read.php" class="nav-button">Voir liste utilisateurs</a>
        <a href="deconnect.php" class="nav-button">Se déconnecter</a>
    </nav>

    <div class="container">
        <div class="content">
            <h2>Ajouter un utilisateur</h2>
            <form action="create.php" enctype="multipart/form-data" method="post">

                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" pattern="[A-Za-zÀ-ÿ]+" title="Le prénom ne doit contenir que des lettres." required>
                </div>
            
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" pattern="[A-Za-zÀ-ÿ]+" title="Le nom ne doit contenir que des lettres." required>
                </div>

                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" required>
                </div>

                <div class="form-group">
                    <label for="mdp">Mot de Passe</label>
                    <input type="password" id="mdp" name="mdp" required>
                </div>
               
                <div class="form-group">   
                    <label for="pfp">Photo de profil</label>               
                    <input type="file" id="pfp" name="pfp" accept="image/jpeg, image/png, image/gif" required><br><br>
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>

</body>
</html>
