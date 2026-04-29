<?php
$conn = new mysqli("localhost", "root", "", "jonkisz");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>