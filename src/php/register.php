<?php
session_start();
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['name'];
    $email = $_POST['email'];
    $sifra = $_POST['psw'];
    $prezime = $_POST['lastname'];
    $adresa = $_POST['address'];
    $telefon = $_POST['phone'];
    $izborno_mesto = $_POST['votingplace'];

    // Check if the voting place ID exists
    $check_query = "SELECT idIzbornoMesto FROM IzbornaMestaRezultati WHERE idIzbornoMesto = ?";
    $check_stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($check_stmt, "i", $izborno_mesto);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($check_result) > 0) {
        // Move uploaded file
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $upload_dir = 'uploads/';

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true); // 0777 gives full permissions, use more restrictive permissions as needed
        }

        $target_file = $upload_dir . basename($file_name);
        move_uploaded_file($file_temp, $target_file);

        // Insert user data into database
        $query = "INSERT INTO Kontrolori (idIzbornoMesto, Ime, Prezime, Telefon, Email, Sifra, Adresa, Slike) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "isssssss", $izborno_mesto, $ime, $prezime, $telefon, $email, $sifra, $adresa, $target_file);

        if (mysqli_stmt_execute($stmt)) {
            echo "Registration successful!";
        } else {
            echo "Error: Registration failed. Please try again.";
        }
    } else {
        echo "Error: Invalid voting place ID. Please enter a valid ID.";
    }
}
?>
