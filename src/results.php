<?php
include 'php/session_check.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="header">
        <h1>REPUBLICKI IZBORI REPUBLIKE SRBIJE</h1>
    </div>
    <?php
        include('navigation.php');
    ?>
    <div id="main-page-container">
        <div id="results-container-wrapper">
            <div id="results-container">
                <h2>Rezultati Izbora</h2>

                <?php
                require_once('php/parlament_results.php');
                require_once('php/opstina_results.php');

                // Output the cumulative results for the whole Parliament
                echo "<div id='overall-results'>";
                echo "<h3>Rezultati parlamentarnih izbora:</h3>";
                echo "<div>";
                echo "<p>Ukupan broj glasova: $totalVotes</p>";
                echo "<p>Nevažeći Listići: $totalInvalidVotes</p>";
                echo "<p>Ukupan broj birača: $totalVoters</p>";
                echo "</div>";
                echo "</div>";

                // Output results for each party for the whole Parliament
                echo "<div id='party-results'>";
                echo "<h3>Rezultati parlamentarnih izbora po strankama:</h3>";
                echo "<div>";
                echo "<p>Stranka Demokratskog Socijalizma: ($percentagePartija1% of $totalVoters)</p>";
                echo "<p>Stranka Demokratskih Socijalista: ($percentagePartija2% of $totalVoters)</p>";
                echo "<p>Stranka Zelenaskih levicarskih pokreta: ($percentagePartija3% of $totalVoters)</p>";
                echo "</div>";
                echo "</div>";

                // Output results for each Opstina
                echo "<div id='opstina-results'>";
                echo "<h3>Rezultati po opstinama:</h3>";
                echo "<ul>";

                // Sort opstinaResults by opstina name alphabetically
                ksort($opstinaResults);

                // Loop through opstinaResults
                foreach ($opstinaResults as $opstinaName => $opstinaResult) {
                    echo "<li><strong>$opstinaName:</strong></li>";
                    echo "<ul>";
                    echo "<li>Ukupan broj glasova: {$opstinaResult['totalVotes']}</li>";
                    echo "<li>Nevažeći Listići: {$opstinaResult['invalidVotes']}</li>";
                    echo "<li>Ukupan broj birača: {$opstinaResult['totalVoters']}</li>";
                    // Output results for each party for the Opstina
                    echo "<li>Rezultati po strankama:";
                    echo "<ul>";
                    echo "<li>Stranka Demokratskog Socijalizma: ({$opstinaResult['percentagePartija1']}% of {$opstinaResult['partija1Votes']})</li>";
                    echo "<li>Stranka Demokratskih Socijalista: ({$opstinaResult['percentagePartija2']}% of {$opstinaResult['partija2Votes']})</li>";
                    echo "<li>Stranka Zelenaskih levicarskih pokreta: ({$opstinaResult['percentagePartija3']}% of {$opstinaResult['partija3Votes']})</li>";
                    echo "</ul>";
                    echo "</li>";
                    echo "</ul>";
                }
                echo "</ul>";
                echo "</div>";
                ?>
            </div>
        </div>
        
    </div>
</body>
</html>
