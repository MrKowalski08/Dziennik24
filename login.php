<?php
session_start();
require "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];

    $sql = "SELECT * FROM uzytkownik WHERE login='$login'";
    $wynik = $conn->query($sql);

    if ($wynik->num_rows == 1) {
        $u = $wynik->fetch_assoc();

        if (password_verify($haslo, $u["hash_haslo"])) {
            $_SESSION["id"] = $u["id_u"];
            $_SESSION["imie"] = $u["imie"];
            $_SESSION["nazwisko"] = $u["nazwisko"];
            $_SESSION["czy_nauczyciel"] = $u["czy_nauczyciel"];
            $_SESSION["id_k"] = $u["id_k"];

            header("Location: panel.php");
            exit;
        }
    }

    echo "Błędne dane";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form method="POST">
        <h1>Dziennik24</h1>
        <div>
            <input type="text" name="login" placeholder="login">
            <input type="password" name="haslo" placeholder="hasło">
            <button>Zaloguj</button>
        </div>
    </form>
</body>
</html>
