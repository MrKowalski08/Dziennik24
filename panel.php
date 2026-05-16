<?php
session_start();
require "db.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="panel.css">
</head>
<body>
    <nav>
        <h1>Dziennik24</h1>
        <?php 
            if ($_SESSION["czy_nauczyciel"]) {
                echo "<a href='nauczyciel/dodaj_zadanie.php'>Dodaj zadanie</a>";
                echo "<a href='nauczyciel/lista_odpowiedzi.php'>Sprawdź odpowiedzi</a>";
            }
            echo "<div>";
            echo "<h2>".$_SESSION["imie"]." ".$_SESSION["nazwisko"]."</h2>";    
            echo "<a href='logout.php'>Wyloguj</a>";
            echo "</div>"
        ?>
    </nav>
    <main>
        <div class="main_left">
            <?php
                if ($_SESSION["czy_nauczyciel"]) {
                    if(isset($_GET["id_k"]))
                    {
                        $id_k = (int)$_GET["id_k"];

                        $sql = "SELECT * FROM zadanie WHERE id_k=$id_k";
                        $wynik = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($wynik) == 0)
                        {
                            echo "Brak zadań";
                        }
                        else
                        {
                            while($zadanie = mysqli_fetch_assoc($wynik))
                            {
                                echo "<div id='zadanie'>";
                                echo "<h3>".$zadanie["tytul"]."</h3>";
                                echo "<p>".$zadanie["tresc"]."</p>";
                                echo "Termin: ".$zadanie["data_zakonczenia"];
                                echo "</div>";
                            }
                        }
                    }
                } else {
                    $id_k = $_SESSION["id_k"];

                    $wynik = $conn->query("SELECT * FROM zadanie WHERE id_k=$id_k");

                    while($zadanie = mysqli_fetch_assoc($wynik)) {
                        echo "<div id='zadanie'>";
                        echo "<h3>".$zadanie["tytul"]."</h3>";
                        echo "<hr>";
                        echo "<p>".$zadanie["tresc"]."</p>";
                        echo "<h5>Termin: ".$zadanie["data_zakonczenia"]."</h5>";
                        echo "<h4> <a href='uczen/wyslij_odpowiedz.php?id=".$zadanie["id_z"]."'>Wyślij odpowiedź</a></h4>";
                        echo "</div>";
                    }

                }
            ?>
        </div>
        <div class="main_right">
            <?php 
                if ($_SESSION["czy_nauczyciel"]) {
                    $wynik = mysqli_query($conn, "SELECT * FROM klasa");

                    echo "<h2>Lista klas</h2>";

                    while($klasa = mysqli_fetch_assoc($wynik))
                    {
                        echo "<a href='panel.php?id_k=".$klasa["id_k"]."'>";
                        echo $klasa["nazwa"];
                        echo "</a><br>";
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>