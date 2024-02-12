<?php

require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $opstina_name = $_POST['opstina'];
    $name = $_POST['name'];

    $query = "SELECT idOpstina FROM Opstina WHERE Opstina = '$opstina_name'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
        $opstinaId = $row['idOpstina'];
    }

    $insert_query = "INSERT INTO IzbornaMestaRezultati (IzbornoMesto, idOpstina) VALUES (?,?)";
    $stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($stmt, "si", $name, $opstinaId);

    if (mysqli_stmt_execute($stmt)) {
        echo "Dodato Izborno Mesto!";
    }
    else {
        echo "Error: Neuspesno dodavanje Izbornog mesta, molimo Vas pokusajte ponovo";
    }
}
else {
    echo "Error: Ne postoji data Opstina. Kontaktirajte admina.";
}
?>



