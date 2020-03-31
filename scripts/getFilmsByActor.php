<?php 
include("dbConnect.php");
$name = $_GET['name'];

$stmt = $db->prepare("SELECT * FROM film WHERE ID_FILM IN (SELECT FID_FILM FROM FILM_ACTOR WHERE FID_Actor = (SELECT ID_Actor FROM Actor Where name = ?));");
$stmt->execute(array($name));

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td style = 'border: 1px solid'>".$row['name']."</td></tr>";
}
?>