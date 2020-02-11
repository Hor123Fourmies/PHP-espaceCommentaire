<?php


//Check if credentials are valid


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "espace_commentaire";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


$pseudo = $_POST['pseudo'];
var_dump($pseudo);

$recup = "SELECT pseudo FROM utilisateurs WHERE pseudo = '$pseudo'";
$requete = $conn->query($recup);

$row = $requete->fetch_assoc();
//echo $row['username'];
if ($row['pseudo'] === $pseudo) {
    //echo 'bravo !';
    session_start();
    $session['pseudo'] = $_POST['pseudo'];
    header('location: comment.php');
    //header('location: read.php');
} else {
    echo "Erreur";
}
