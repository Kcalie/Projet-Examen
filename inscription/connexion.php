<?php
session_start();
require_once 'config.php';

if(isset($_POST['email']) && isset($_POST['password']))
{

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 1)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $hashed_password = $data['password'];
            if(password_verify($password, $hashed_password))
            {
                $_SESSION['user'] = $data['pseudo'];
                header('location:landing.php');

            }
            else 
            {
            header('location:form.php?login_err=password');
            }

        }
        else 
        {
        header('location:form.php?login_err=email'); 
        }

    }
    else 
    {
    header('location:form.php?login_err=already');
    } 

}
else 
{
header('location:form.php');
}

?>