<?php
session_start();
require_once('db_connect.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime_opstine = $_POST['opstina'];

    $query = "INSERT INTO Opstina (Opstina) VALUES (?) ";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $ime_opstine);

    if (mysqli_stmt_execute($stmt)) {
        echo "Opstina dodata uspesno!";
    }
    else {
        echo "Error: Opstina nije ubacena, pokusajte opet";
    }
}

?>