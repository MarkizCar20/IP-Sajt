<?php
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $izbornoMesto = $_POST['izbornoMesto'];
    $partija1 = $_POST['partija1'];
    $partija2 = $_POST['partija2'];
    $partija3 = $_POST['partija3'];
    $ukupanBroj = $_POST['ukupanBroj'];
    $brojNevazecih = $_POST['brojNevazecih'];
    $brojBiraca = $_POST['brojGlasova'];

    // File upload
    // $zapisnik_path = ''; // Set default path
    // if ($_FILES['zapisnik']['error'] === UPLOAD_ERR_OK) {
    //     $zapisnik_tmp_name = $_FILES['zapisnik']['tmp_name'];
    //     $zapisnik_name = $_FILES['zapisnik']['name'];
    //     $zapisnik_path = 'uploads/' . $zapisnik_name; // Set your upload directory path
    //     move_uploaded_file($zapisnik_tmp_name, $zapisnik_path);
    // }

    // Update query
    $query = "UPDATE IzbornaMestaRezultati SET `Stranka Demokratskog Socijalizma`=?, `Stranka Demokratskih Socijalista`=?, `Stranka Zelenaskih levicarskih pokreta`=?, UkupanBroj=?, BrojNevazecih=?, BrojGlasova=? WHERE IzbornoMesto=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $partija1, $partija2, $partija3, $ukupanBroj, $brojNevazecih, $brojGlasova, $izbornoMesto);
    if (mysqli_stmt_execute($stmt)) {
        echo "Update successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}

mysqli_close($conn);
?>
