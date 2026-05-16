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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="wyslij_odpowiedz.css">
</head>
<body>
    <form method="POST">
        Odpowiedź:<br>
        <textarea name="tresc"></textarea><br><br>
    <button>Wyślij</button>
</form>
</body>
</html>
