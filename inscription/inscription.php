<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/inscription.css">
    <script src="https://kit.fontawesome.com/22d6814c5f.js" crossorigin="anonymous"></script>
    
    <title>Inscription</title>
</head>
<body>
<?php
        if(isset($_GET['reg_err']))
        {
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err)
            {
                case 'success';
                ?>
                    <div class="alert">
                        <strong>Succès</strong> inscription reussi !
                    </div>
                <?php
                break;

                case 'password';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> mot de passe different 
                    </div>
                <?php
                break;

                case 'email';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> email non valide
                    </div>
                <?php
                break;

                case 'email_length';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> email trop long
                <?php
                break;

                case 'pseudo_length';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> pseudo trop long
                <?php
                break;

                case 'already';
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> compte deja existant 
                    </div>
                <?php
                break;
            }
        }
    ?>
            <!--Header-->
            <?php include ('../assets/includes/header.php'); ?>

    <div class="inscription">
        <h1>Inscription</h1><br />
        <form name="inscription" method="POST" action="inscription_traitement.php">
        <label for="login">Pseudo</label>
        <input type="text" name="pseudo" required>
        <br />
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br />
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <br />
        <label for="password2">Répéter Mot de passe:</label>
        <input type="password" name="password2" required>
        <br />

        <button type="submit" name="submit">Envoyer</button>
        </form>
    </div>

        <!--Footer-->
        <?php include ('../assets/includes/footer.php'); ?>
        <script src="assets/js/script.js"></script>
</body>
</html>