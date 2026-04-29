<?php
session_start();
require "db.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

echo "<br><a href='logout.php'>Wyloguj</a>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav></nav>
    <main>
        <div class="main_right">
            <?php 
                echo "<h1>Witaj ".$_SESSION["imie"]."</h1>";    
                if ($_SESSION["czy_nauczyciel"]) {
                    echo "<a href='nauczyciel/dodaj_zadanie.php'>Dodaj zadanie</a><br>";
                    echo "<a href='nauczyciel/lista_odpowiedzi.php'>Sprawdź odpowiedzi</a><br>";
                } else {
                    echo "<a href='uczen/moje_zadania.php'>Moje zadania</a><br>";
                }
            ?>
        </div>
        <div class="main_left">
            <?php 
                $wynik = mysqli_query($conn, "SELECT * FROM klasa");

                echo "<h2>Lista klas</h2>";

                while($klasa = mysqli_fetch_assoc($wynik))
                {
                    echo "<a href='klasy.php?id_k=".$klasa["id_k"]."'>";
                    echo $klasa["nazwa"];
                    echo "</a><br>";
                }
            ?>
        </div>
    </main>
</body>
</html>