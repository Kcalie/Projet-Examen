<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'games';

//on crée la function pour se connecter à la BDD
function pdo_connect()
{
    global $DB_HOST;
    global $DB_USER;
    global $DB_PASSWORD;
    global $DB_NAME;
    try{
        return new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8', $DB_USER, $DB_PASSWORD);
    } catch (PDOException $exception) {
        exit('Erreur de connexion à la base de données');
    }
}

$bdd = pdo_connect();

?>