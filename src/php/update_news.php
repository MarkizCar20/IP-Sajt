<?php
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the POST request
    $old_naslov = $_POST['old_naslov'];
    $new_naslov = $_POST['naslov'];
    $datum = $_POST['datum'];
    $sadrzaj = $_POST['sadrzaj'];

    // Prepare the SQL statement with parameterized query
    $query = "UPDATE Vesti SET Naslov = ?, Datum = ?, Sadrzaj = ? WHERE Naslov = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind the parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssss", $new_naslov, $datum, $sadrzaj, $old_naslov);
    if (mysqli_stmt_execute($stmt)) {
        echo "Update successful!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($conn);
?>
