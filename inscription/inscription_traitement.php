<?php
require_once 'config.php';

if(isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['password2'])) {
    $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    $password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES);

    // Validation des entrées utilisateur
    if(strlen($pseudo) > 100) {
        header('Location: inscription.php?reg_err=pseudo_length');
        exit;
    }
    if(strlen($email) > 100) {
        header('Location: inscription.php?reg_err=email_length');
        exit;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: inscription.php?reg_err=email');
        exit;
    }
    if($password !== $password2) {
        header('Location: inscription.php?reg_err=password');
        exit;
    }

    // Hachage du mot de passe
    $password = password_hash($password, PASSWORD_ARGON2ID);

    // Vérification si l'utilisateur existe déjà dans la base de données
    $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $row = $check->rowCount();

    if($row === 0) {
        // Insertion de l'utilisateur dans la base de données
        $insert = $bdd->prepare('INSERT INTO `utilisateurs` SET
                                            pseudo = :pseudo,
                                            email = :email,
                                            password = :password,
                                            date_d\'inscription = CURDATE()
    ');
        $insert->execute(array(
            'pseudo'=> $pseudo,
            'email' => $email,
            'password' => $password,
        ));
        header('Location: inscription.php?reg_err=success');
        exit;
    }
    else {
        header('Location: inscription.php?reg_err=already');
        exit;
    } 
}
?>

<!--Voici les modifications apportées :

    Nous avons utilisé ENT_QUOTES comme deuxième argument pour la fonction htmlspecialchars() pour échapper les guillemets simples et doubles. Cela aide à prévenir les attaques XSS.

    Nous avons ajouté une validation des entrées utilisateur avant de les utiliser dans la requête préparée. Cela aide à prévenir les injections SQL.

    Nous avons remplacé l'algorithme de hachage SHA1 et MD5 par l'algorithme de hachage Argon2, qui est considéré comme beaucoup plus sûr.

    Nous avons ajouté exit après chaque appel à header pour éviter que le code s'exécute après la redirection.

    Nous avons omis la variable $data qui n'est pas utilisée.

    Nous n'avons pas utilisé de tokens anti-CSRF pour des raisons de simplicité, mais il est recommandé de les utiliser dans une application en production.-->