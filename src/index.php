<?php
include 'php/session_check.php'
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/clock.js"></script>
</head>
<body>
    <div class="header"> <!-- Zaglavlje stranice -->
        <h1>REPUBLICKI IZBORI REPUBLIKE SRBIJE</h1>
    </div>
        <?php
        include('navigation.php');
        ?>
    <div id="main-page-container"> <!-- Glavni deo stranice -->
        <div class="left-main-page"> <!-- Levi deo glavne strane -->
            <?php
            include('php/opstina_results.php');
            ksort($opstinaResults);
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
            ?>
        </div>
        <div class="right-main-page"> <!-- Desni deo glavne strane --> <!-- Ne prikazuje se na mobilnoj verziji -->
            <div class="upper-right-main-page">
                <p> Pretraga opstina po imenu </p>
                <div class="search_opstine_container">
                    <input type="text" class="search_opstine" name="search_opstine">
                    <button class="search_opstine_button">Pretrazi</button>
                </div>
            </div>
            <div class="lower-right-main-page">
                <h2>VESTI O IZBORIMA</h2>
                <div class="news-page-container">
                    <ul id="news-list-element">
                        <?php
                        require_once('php/db_connect.php');
                        $query = "SELECT * FROM Vesti";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li>";
                                echo "<h5><strong>" . $row['Naslov'] . "</strong></h5>";
                                echo "<p>Datum: " . $row['Datum'] . "</p>";
                                echo "<p>" . $row['Sadrzaj'] . "</p>";
                                echo "</li>";
                            }
                        } else {
                            echo "<p>No news available.</p>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <h1></h1>
    </div>

    <div id="clock-container">
        <!--dodavanje kazaljki na sat-->
        <div class="clock-hand" id="hour-hand"></div>
        <div class="clock-hand" id="minute-hand"></div>
        <div class="clock-hand" id="second-hand"></div>
        <!--dodavanje brojeva na sat-->
        <div class="number" id="number-12">12</div>
        <div class="number" id="number-1">1</div>
        <div class="number" id="number-2">2</div>
        <div class="number" id="number-3">3</div>
        <div class="number" id="number-4">4</div>
        <div class="number" id="number-5">5</div>
        <div class="number" id="number-6">6</div>
        <div class="number" id="number-7">7</div>
        <div class="number" id="number-8">8</div>
        <div class="number" id="number-9">9</div>
        <div class="number" id="number-10">10</div>
        <div class="number" id="number-11">11</div>
        <div class="point"  id="point"></div>
    </div>
</body>
</html>