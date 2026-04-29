<?php
session_start();
require "../db.php";

$sql = "
SELECT
u.imie,
u.nazwisko,
z.tytul,
o.tresc,
o.data_odpowiedzi
FROM odpwiedz o
JOIN uzytkownik u ON o.id_u=u.id_u
JOIN zadanie z ON o.id_z=z.id_z
";

$wynik = $conn->query($sql);

while($r = $wynik->fetch_assoc()) {
    echo "<h3>".$r["tytul"]."</h3>";
    echo $r["imie"]." ".$r["nazwisko"]."<br>";
    echo $r["tresc"]."<br>";
    echo $r["data_odpowiedzi"];
    echo "<hr>";
}
?>