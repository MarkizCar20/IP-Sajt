<?php

include('db_connect.php');

$query = "SELECT Opstina from Opstina";
$result = mysqli_query($conn, $query);

if ($result) {
    $opstine = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $opstine[] = $row['Opstina'];
    }

    mysqli_free_result($result);
    mysqli_close($conn);

    echo json_encode($opstine);
}
else {
    echo json_encode(array('error' => 'Failed to fetch data'));
}
?>



