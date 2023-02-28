<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/inscription.css">
    <script src="https://kit.fontawesome.com/22d6814c5f.js" crossorigin="anonymous"></script>
    <title>connexion</title>
</head>
<body>
    <?php
        if(isset($_GET['login_err']))
        {
            $err = htmlspecialchars($_GET['login_err']);

            switch($err)
            {
                case 'password';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> mot de passe incorrect
                    </div>
                <?php
                break;

                case 'email';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> email incorrect
                    </div>
                <?php
                break;

                case 'already';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> compte non existant 
                    </div>
                <?php
                break;
            }
        }
    ?>
        <div class="inscription">
                <h1>Connexion</h1><br />
                <form name="inscription" method="POST" action="connexion.php">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br />
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" required>
                <br />
                <button type="submit" name="submit">Envoyer</button>
                </form>
                <br />
                <a href="inscription.php">Inscription</a>
        </div>

        <!--Footer-->
        <footer>
            <p>&copy; Kevin</p>
            <div class="social-media">
                <p>
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
                </p>
                <p>
                    <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter-square"></i></a>
                </p>
                <p>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram-square"></i></a>
                </p>
                <p>
                    <a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </p>
        </div>
        </footer>
        <!--Fin footer-->
</body>
</html>