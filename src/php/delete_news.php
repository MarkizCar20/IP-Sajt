<?php
require_once('db_connect.php');

if(isset($_GET['Naslov'])) {
    
    $Naslov = mysqli_real_escape_string($conn, $_GET['Naslov']);

    $query = "DELETE FROM Vesti WHERE Naslov = '$Naslov'";

    if(mysqli_query($conn, $query)) {
        echo "Row deleted successfully";
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
} else {
    echo "No ID parameter specified";
}

mysqli_close($conn);
?>