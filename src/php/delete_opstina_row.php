<?php
require_once('db_connect.php');

if (isset($_GET['opstina'])) {
    
    $opstina = mysqli_real_escape_string($conn, $_GET['opstina']);
    // console.log("$opstina");
    $query = "DELETE FROM Opstina WHERE Opstina= '$opstina'";

    if(mysqli_query($conn, $query)) {
        echo "Uspesno obrisana opstina";
    }
    else {
        echo "Greska u brisanju opstine: " + mysqli_error($conn);
    }
} else {
    echo "Nije specificirana Opstina za brisanje";
}
?>