<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "games";

// Créer une connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (mysqli_connect_errno()) {
  echo "Erreur de connexion à la base de données: " . mysqli_connect_error();
  exit;
}

echo "Connexion à la base de données réussie !";
?>
