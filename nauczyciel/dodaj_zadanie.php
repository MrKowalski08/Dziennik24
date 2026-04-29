<?php
session_start();
require "../db.php";

if (!$_SESSION["czy_nauczyciel"]) {
    die("Brak dostępu");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tytul = $_POST["tytul"];
    $tresc = $_POST["tresc"];
    $data = $_POST["data"];
    $klasa = $_POST["klasa"];

    $sql = "INSERT INTO zadanie(tytul,tresc,data_zalozenie,data_zakonczenia,id_k)
            VALUES('$tytul','$tresc',CURDATE(),'$data','$klasa')";

    $conn->query($sql);

    echo "Dodano zadanie";
}
?>

<form method="POST">
    Tytuł:<br>
    <input name="tytul"><br><br>

    Treść:<br>
    <textarea name="tresc"></textarea><br><br>

    Termin:<br>
    <input type="date" name="data"><br><br>

    ID klasy:<br>
    <input name="klasa"><br><br>

    <button>Dodaj</button>
</form>