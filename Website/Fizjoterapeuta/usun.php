<?php
if (!isset($_GET['id'])) {
    echo "Nie podano ID.";
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";
$id = $_GET['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM Pliki WHERE id_uzytkownika='$id'";
$conn->query($sql);

$sql = "DELETE FROM Wiadomosci WHERE id_uzytkownika='$id'";
$conn->query($sql);

$sql = "DELETE FROM Uzytkownicy WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "<div style='font-family: Arial, sans-serif; margin: 20px; padding: 20px; border-radius: 5px; background-color: #e8f5e9; color: #2e7d32;'>" .
         "<h2 style='text-align: center;'>Usunięto!</h2>" .
         "<p style='text-align: center;'>Wiadomość została usunięta.</p>" .
         "<div style='text-align: center;'>" .
         "<a href='kontakt.html' style='display: inline-block; padding: 10px 20px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; text-decoration: none;'>Powrót do strony</a>" .
         "</div>" .
         "</div>";
} else {
    echo "Wystąpił błąd podczas usuwania danych: " . $conn->error;
}

$conn->close();
?>
