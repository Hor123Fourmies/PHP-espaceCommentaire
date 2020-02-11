<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "espace_commentaire";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

global $conn;

// ouvrir une session avant le HTML
session_start();

$pseudo = $_POST['pseudo'];
$commentaires = $_POST['commentaire'];
$date = date("Y-m-d");
$sql = "INSERT INTO commentaire VALUES (NULL, '$pseudo', '$commentaires', '$date')";
if ($conn->query($sql)){
    echo "Merci $pseudo. Votre commentaire a bien été envoyé.";
}
else{
    echo $conn->error;
}

