<?php
require_once('db_connect.php');

$totalVoters = 0;
$totalPartija1Votes = 0;
$totalPartija2Votes = 0;
$totalPartija3Votes = 0;
$totalInvalidVotes = 0;
$totalVotes = 0;

$query = "SELECT `Stranka Demokratskog Socijalizma`, `Stranka Demokratskih Socijalista`, `Stranka Zelenaskih levicarskih pokreta`, UkupanBroj, BrojNevazecih, BrojGlasova FROM IzbornaMestaRezultati";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    // Accumulate values for each party and total votes
    $totalVoters += $row['UkupanBroj'];
    $totalPartija1Votes += $row['Stranka Demokratskog Socijalizma'];
    $totalPartija2Votes += $row['Stranka Demokratskih Socijalista'];
    $totalPartija3Votes += $row['Stranka Zelenaskih levicarskih pokreta'];
    $totalInvalidVotes += $row['BrojNevazecih'];
    $totalVotes += $row['BrojGlasova'];

}

$percentagePartija1 = ($totalPartija1Votes / $totalVoters) * 100;
$percentagePartija2 = ($totalPartija2Votes / $totalVoters) * 100;
$percentagePartija3 = ($totalPartija3Votes / $totalVoters) * 100;
// Close database connection
// mysqli_close($conn);
?>