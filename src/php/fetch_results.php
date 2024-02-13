<?php
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['izbornoMesto'])) {
    $izbornoMesto = $_GET['izbornoMesto'];
    
    // Prepare and execute the query to fetch the record
    $query = "SELECT * FROM IzbornaMestaRezultati WHERE IzbornoMesto = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $izbornoMesto);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the record as an associative array
    $row = mysqli_fetch_assoc($result);

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Return the record data as JSON
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    // Invalid request
    http_response_code(400);
    echo "Invalid request";
}
?>
