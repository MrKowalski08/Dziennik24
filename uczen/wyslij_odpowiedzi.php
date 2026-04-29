<?php
session_start();
require "../db.php";

$id_z = $_GET["id"];
$id_u = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tresc = $_POST["tresc"];

    $sql = "INSERT INTO odpwiedz(id_z,id_u,tresc,data_odpowiedzi)
            VALUES($id_z,$id_u,'$tresc',CURDATE())";

    $conn->query($sql);

    echo "Wysłano";
}
?>

<form method="POST">
    Odpowiedź:<br>
    <textarea name="tresc"></textarea><br><br>
    <button>Wyślij</button>
</form>