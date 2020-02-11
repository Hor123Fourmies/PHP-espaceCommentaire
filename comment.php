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

        <legend> Insérer un commentaire :</legend>
        <form action="commentEnvoi.php" method="post">

            <div>
                <label for="pseudo">Pseudonyme :</label>
                <input name="pseudo" id="pseudo" cols="80" rows="20">
            </div>

            <div>
                <label for="commentaire">Commentaire :</label>
                <textarea name="commentaire" id="commentaire" cols="80" rows="20"></textarea>
            </div>

            <div>
                <button type="submit" name="button" id="boutonEnvoyer">Envoyer</button>
            </div>
        </form>
    </fieldset>
    </div>

    <div id="retourComment">

<?php


$sql = "SELECT commentaires, pseudo, date FROM commentaire WHERE 30";
$result = $conn->query($sql);
echo $conn->error;

while ($row = $result->fetch_assoc()) {

    ?>

          <div id="tableComment">
              <div><?php echo $row['commentaires']."<br>"."par "?>
                  <span style="color:blueviolet; font-style: italic"><?php echo $row['pseudo']?></span>
                         <?php echo " - le ".$row['date']."<br><br>";?>

              </div>
          </div>


<?php

}
?></div>
</div>

<script src="script.js"></script>
</body>
</html>

