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
    <section>
        <div class="form-box">
            <div class="inscription">
                    <form name="inscription" method="POST" action="connexion.php">
                    <h2>Connexion</h2>
                    <div class="inputbox">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" name="email" required>
                    <label for="email">Email :</label>
                    </div>
                    <div class="inputbox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" required>
                    <label for="password">Mot de passe :</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Se souvenir de moi <a href="#">Mot de passe oublié</a></label>
                    </div>
                        <button type="submit" name="submit">Envoyer</button>
                    <div class="register">
                        <p>Vous n'avez pas de compte ? <a href="inscription/inscription.php">Inscrivez vous</a></p>
                    </div>
                    </form>
            </div>
        </div>
    </section>
        
</body>
</html>