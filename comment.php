<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "espace_commentaire";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>


<div id="pageComment">

    <div id="commentLeft">

    <fieldset>

        <legend style="font-size: 20px"> Insérer un commentaire :</legend>

        <?php echo "<br>";?>

        <form action="commentEnvoi.php" method="post">

            <div>
                <label for="pseudo">Pseudonyme :</label>
                <input name="pseudo" id="pseudo" cols="80" rows="20">
            </div>

            <?php echo "<br>";?>

            <div>
                <label for="commentaire">Commentaire :</label>
                <textarea name="commentaire" id="commentaire" cols="80" rows="20"></textarea>
            </div>

            <?php echo "<br>";?>

            <div>
                <button type="submit" name="button" id="boutonEnvoyer">Envoyer</button>
            </div>

            <?php echo "<br>";?>

        </form>
    </fieldset>

        <?php echo "<br>";?>

        <form action="login.php" method="post">
            <button type="submit">Se déconnecter</button>
        </form>

    </div>

    <div id="retourComment">

<?php


//$sql = "SELECT commentaires, pseudo, date FROM commentaire WHERE 30";
//$sql = "SELECT commentaires, pseudo, DAY(date) as jour, MONTH(date) as mois, YEAR(date) as annee FROM commentaire WHERE 30";
$sql = "SELECT id, commentaires, pseudo, DATE_FORMAT(date, '%d-%m-%Y') as date FROM commentaire ORDER BY id desc LIMIT 6";
$result = $conn->query($sql);
echo $conn->error;

while ($row = $result->fetch_assoc()) {

    ?>

          <div id="tableComment">
              <div>
                  <span><?php echo $row['id']."<br>"?></span>
                  <span style="font-size: 18px"> <?php echo $row['commentaires']."<br>"?></span>
                  <span><?php echo "par "?></span>
                  <span style="color:blueviolet; font-style: italic; font-weight: bold"><?php echo $row['pseudo']?></span>
                  <span><?php echo " - le " . $row['date']. "<br><br>"?></span>
                  <?php // echo " - le ".$row['jour']."-".$row['mois']."-".$row['annee']."<br><br>";?>

              </div>
          </div>

<?php

}
?></div>
</div>

<script src="script.js"></script>
</body>
</html>

