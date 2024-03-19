<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$imie = isset($_POST['imie']) ? $_POST['imie'] : '';
$nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefon = isset($_POST['telefon']) ? $_POST['telefon'] : '';
$wiadomosc = isset($_POST['wiadomosc']) ? $_POST['wiadomosc'] : '';
$plik = isset($_FILES['plik']['name']) ? $_FILES['plik']['name'] : '';

$sql = "INSERT INTO Uzytkownicy (imie, nazwisko, email, telefon) VALUES ('$imie', '$nazwisko', '$email', '$telefon')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $sql = "INSERT INTO Wiadomosci (id_uzytkownika, tresc) VALUES ('$last_id', '$wiadomosc')";
    $conn->query($sql);

    if ($plik) {
        $docelowa_sciezka = "uploads/" . basename($_FILES["plik"]["name"]);
        if (move_uploaded_file($_FILES["plik"]["tmp_name"], $docelowa_sciezka)) {
            $sql = "INSERT INTO Pliki (id_uzytkownika, nazwa_pliku) VALUES ('$last_id', '$plik')";
            $conn->query($sql);
        } else {
            echo "Wystąpił błąd podczas wgrywania pliku.";
        }
    }

    echo "<div style='font-family: Arial, sans-serif; margin: 20px; padding: 20px; border-radius: 5px; background-color: #e8f5e9; color: #2e7d32;'>" .
         "<h2 style='text-align: center;'>Gotowe!</h2>" .
         "<p style='text-align: center;'>Wiadomość została wysłana. Oto podane dane:</p>" .
         
         "<p style='text-align: center;'><strong>Imię:</strong> $imie</p>" .
         "<p style='text-align: center;'><strong>Nazwisko:</strong> $nazwisko</p>" .
         "<p style='text-align: center;'><strong>Email:</strong> $email</p>" .
         "<p style='text-align: center;'><strong>Telefon:</strong> $telefon</p>" .
         "<p style='text-align: center;'><strong>Wiadomość:</strong> $wiadomosc</p>" .
         "<p style='text-align: center;'><strong>Nazwa pliku:</strong> $plik</p>" .
         "<div style='text-align: center;'>" .
         "<a href='kontakt.html' style='display: inline-block; padding: 10px 20px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; text-decoration: none;'>Powrót do strony</a>" .
         "</div>" .
         "<div style='text-align: center; margin-top: 20px;'>" .
         "<a href='usun.php?id=$last_id' style='display: inline-block; padding: 10px 20px; border: none; border-radius: 5px; background-color: #f44336; color: white; text-decoration: none;'>Cofnij wysyłanie wiadomości</a>" .
         "</div>" .
         "</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
