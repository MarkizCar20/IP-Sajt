<?php
session_start();
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = $_POST['naslov'];
    $datum = $_POST['datum'];
    $sadrzaj = $_POST['sadrzaj'];

    // Prepare and bind the SQL statement with placeholders to prevent SQL injection
    $query = "INSERT INTO Vesti (Naslov, Datum, Sadrzaj) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $naslov, $datum, $sadrzaj);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
