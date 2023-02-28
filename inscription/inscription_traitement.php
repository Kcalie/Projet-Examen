<?php
    require_once 'config.php';

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']) )
        {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);

            $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
        
            if($row == 0)
            {
               if(strlen($pseudo) <= 100)
               {
                    if(strlen($email) <= 100)
                    {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                         {
                            if($password == $password2)
                            {
                                $password = sha1(md5($_POST['password']));

                                $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo, :email, :password)');
                                $insert->execute(array(
                                    'pseudo'=> $pseudo,
                                    'email' => $email,
                                    'password' => $password,
                                ));
                                header('location:inscription.php?reg_err=success');
                            }else header('location:inscription.php?reg_err=password');

                         }else header('location:inscription.php?reg_err=email');

                    }else header('location:inscription.php?reg_err=email_length'); 

               }else header('location:inscription.php?reg_err=pseudo_length'); 

               
            }else header('location:inscription.php?reg_err=already'); 
        }
?>