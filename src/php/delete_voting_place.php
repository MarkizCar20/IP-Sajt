<?php
require_once('db_connect.php');

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "DELETE FROM IzbornaMestaRezultati WHERE idIzbornoMesto = $id";

    if(mysqli_query($conn, $query)) {
        echo "Row deleted successfuly!";
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
} else {
    echo "No ID parameter specified";
}

mysqli_close($conn);
?>