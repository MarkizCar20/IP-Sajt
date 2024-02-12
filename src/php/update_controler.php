<?php
require_once('db_connect.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['name'];
    $email = $_POST['email'];
    $sifra = $_POST['psw'];
    $prezime = $_POST['lastname'];
    $adresa = $_POST['address'];
    $telefon = $_POST['phone'];
    $izborno_mesto = $_POST['votingplace'];
    $id = $_POST['id'];

    $query = "UPDATE Kontrolori SET Ime='$ime', Email='$email', Sifra='$sifra', Adresa='$adresa', Telefon='$telefon' WHERE idKontrolora='$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "Update successful!";
    } else {
        echo "Error";
    }
} else {
    echo "Invalid parameters";
}
mysqli_close($conn);
?>