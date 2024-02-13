<?php
// Include the database connection
require_once('db_connect.php');

// Initialize an empty array to store municipality results
$opstinaResults = [];

// Fetch all municipalities
$queryOpstina = "SELECT * FROM Opstina";
$resultOpstina = mysqli_query($conn, $queryOpstina);

// Check if there are municipalities
if (mysqli_num_rows($resultOpstina) > 0) {
    while ($rowOpstina = mysqli_fetch_assoc($resultOpstina)) {
        // Get the idOpstina and name of the municipality
        $idOpstina = $rowOpstina['idOpstina'];
        $opstinaName = $rowOpstina['Opstina'];

        // Initialize variables for cumulative results for each municipality
        $totalVotesOpstina = 0;
        $totalInvalidVotesOpstina = 0;
        $totalVotersOpstina = 0;
        $totalPartija1VotesOpstina = 0;
        $totalPartija2VotesOpstina = 0;
        $totalPartija3VotesOpstina = 0;

        // Query IzbornaMestaRezultati for each municipality
        $queryIzbornaMesta = "SELECT * FROM IzbornaMestaRezultati WHERE idOpstina = $idOpstina";
        $resultIzbornaMesta = mysqli_query($conn, $queryIzbornaMesta);

        // Calculate cumulative results for each municipality
        if (mysqli_num_rows($resultIzbornaMesta) > 0) {
            while ($rowIzbornaMesta = mysqli_fetch_assoc($resultIzbornaMesta)) {
                $totalVotesOpstina += $rowIzbornaMesta['UkupanBroj'];
                $totalInvalidVotesOpstina += $rowIzbornaMesta['BrojNevazecih'];
                $totalVotersOpstina += $rowIzbornaMesta['BrojGlasova'];
                $totalPartija1VotesOpstina += $rowIzbornaMesta['Stranka Demokratskog Socijalizma'];
                $totalPartija2VotesOpstina += $rowIzbornaMesta['Stranka Demokratskih Socijalista'];
                $totalPartija3VotesOpstina += $rowIzbornaMesta['Stranka Zelenaskih levicarskih pokreta'];
            }
        }

        // Calculate percentages only if totalVotesOpstina is not 0
        if ($totalVotesOpstina > 0) {
            $percentagePartija1Opstina = ($totalPartija1VotesOpstina / $totalVotesOpstina) * 100;
            $percentagePartija2Opstina = ($totalPartija2VotesOpstina / $totalVotesOpstina) * 100;
            $percentagePartija3Opstina = ($totalPartija3VotesOpstina / $totalVotesOpstina) * 100;
        } else {
            // Set percentages to 0 if totalVotesOpstina is 0
            $percentagePartija1Opstina = 0;
            $percentagePartija2Opstina = 0;
            $percentagePartija3Opstina = 0;
        }
        // Store the results for the municipality in the opstinaResults array
        $opstinaResults[$opstinaName] = [
            'totalVotes' => $totalVotesOpstina,
            'invalidVotes' => $totalInvalidVotesOpstina,
            'totalVoters' => $totalVotersOpstina,
            'partija1Votes' => $totalPartija1VotesOpstina,
            'partija2Votes' => $totalPartija2VotesOpstina,
            'partija3Votes' => $totalPartija3VotesOpstina,
            'percentagePartija1' => $percentagePartija1Opstina,
            'percentagePartija2' => $percentagePartija2Opstina,
            'percentagePartija3' => $percentagePartija3Opstina
        ];
        // echo "<div class='municipality-results'>";
        // echo "<h3>Rezultati za opštinu: $opstinaName</h3>";
        // echo "<div>";
        // echo "<p>Ukupan broj glasova: $totalVotesOpstina</p>";
        // echo "<p>Nevažeći listići: $totalInvalidVotesOpstina</p>";
        // echo "<p>Ukupan broj birača: $totalVotersOpstina</p>";
        // echo "<p>Partija1: ($percentagePartija1Opstina% of $totalPartija1VotesOpstina)</p>";
        // echo "<p>Partija2: ($percentagePartija2Opstina% of $totalPartija2VotesOpstina)</p>";
        // echo "<p>Partija3: ($percentagePartija3Opstina% of $totalPartija3VotesOpstina)</p>";
        // echo "</div>";
        // echo "</div>";
    }
}
?>
