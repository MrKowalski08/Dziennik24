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
            $_SESSION["czy_nauczyciel"] = $u["czy_nauczyciel"];
            $_SESSION["id_k"] = $u["id_k"];

            header("Location: panel.php");
            exit;
        }
    }

    echo "Błędne dane";
}
?>

<form method="POST">
    Login: <input type="text" name="login"><br>
    Hasło: <input type="password" name="haslo"><br>
    <button>Zaloguj</button>
</form>