<?php
session_start();
require_once('db_connect.php');

if($_SERVER['REQUEST_METHOD']==='POST') {
    $ime = $_POST['name'];
    $email = $_POST['email'];
    $sifra = $_POST['psw'];
    $prezime = $_POST['lastname'];
    $adresa = $_POST['address'];
    $telefon = $_POST['phone'];
    $izborno_mesto = $_POST['votingplace'];

    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $upload_dir = 'uploads/';

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true); // 0777 gives full permissions, use more restrictive permissions as needed
    }

    $target_file = $upload_dir . basename($file_name);
    move_uploaded_file($file_temp, $target_file);

    $querry = "INSERT INTO Kontrolori (idIzbornoMesto, Ime, Prezime, Telefon, Email, Sifra, Adresa, Slike) VALUE (?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = mysqli_prepare($conn, $querry);
        mysqli_stmt_bind_param($stmt, "isssssss", $izborno_mesto, $ime, $prezime, $telefon, $email, $sifra, $adresa, $target_file);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>showAlert('Registration successful!');</script>";
            exit();
        } else {
            throw new Exception("Failed to execute statement.");
        }
    } catch (Exception $e) {
        echo "<script>showAlert('Registration failed. Please try again.');</script>";
    }
}
?>
