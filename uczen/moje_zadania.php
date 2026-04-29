<?php
session_start();
require "../db.php";

$id_k = $_SESSION["id_k"];

$sql = "SELECT * FROM zadanie WHERE id_k=$id_k";
$wynik = $conn->query($sql);

while($z = $wynik->fetch_assoc()) {
    echo "<h3>".$z["tytul"]."</h3>";
    echo $z["tresc"]."<br>";
    echo "Termin: ".$z["data_zakonczenia"]."<br>";
    echo "<a href='wyslij_odpowiedz.php?id=".$z["id_z"]."'>Wyślij odpowiedź</a><hr>";
}
?>