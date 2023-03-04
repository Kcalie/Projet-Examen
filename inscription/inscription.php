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
        if(isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err) {
                case 'success':
                    $message = "Succès inscription réussi !";
                    break;

                case 'password':
                    $message = "Erreur : mot de passe différent.";
                    break;

                case 'email':
                    $message = "Erreur : email non valide.";
                    break;

                case 'email_length':
                    $message = "Erreur : email trop long.";
                    break;

                case 'pseudo_length':
                    $message = "Erreur : pseudo trop long.";
                    break;

                case 'already':
                    $message = "Erreur : compte déjà existant.";
                    break;
            }
        }
    ?>

    <!-- Header -->
    <header>
        <?php include ('../assets/includes/headerinscription.php'); ?>
    </header>
    <!-- Header -->

    <!-- Formulaire d'inscription -->
    <section>
        <div class="form-box">
            <div class="inscription">
                <h1>Inscription</h1>
                <form name="inscription" method="POST" action="inscription_traitement.php">
                    <div class="inputbox">
                        <i class="fa-regular fa-user"></i>
                        <label for="login">Pseudo</label>
                        <input type="text" name="pseudo" required>
                    </div>

                    <div class="inputbox">
                        <i class="fa-regular fa-envelope"></i>
                        <label for="email">Email:</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="inputbox">
                        <i class="fa-solid fa-lock"></i>
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="password" required>
                    </div>

                    <div class="inputbox">
                        <i class="fa-solid fa-unlock"></i>
                        <label for="password2">Répéter Mot de passe:</label>
                        <input type="password" name="password2" required>
                    </div>

                    <button type="submit" name="submit">Envoyer</button>

                    <div class="register">
                        <p>Vous avez un compte ? <a href="inscription/form.php">Connectez-vous</a></p>
                    </div>
                </form>

                <?php if(isset($message)): ?>
                    <p class="error"><?php echo $message; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Fin Formulaire -->


    <!-- Footer -->
    <footer>
        <?php include ('../assets/includes/footer.php'); ?>
    </footer>


    <script src="../assets/js/script.js"></script>
</body>
</html>
