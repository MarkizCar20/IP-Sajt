<?php
include 'php/session_check.php';
include 'php/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Display</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/clock.js"></script>
</head>
<body>
    <div class="header">
        <h1>REPUBLICKI IZBORI REPUBLIKE SRBIJE</h1>
    </div>

    <div id="navbar-container">
        <nav>
            <uL>
                <li><a href="first_nav.html">Naslovna</a></li>
                <li>
                    <a href="results.html">Izborni rezultati</a>
                    <ul>
                        <li><a href="#">Unesi rezultate</a></li>
                        <li><a href="#">Azuriraj rezultate</a></li>
                    </ul>
                </li>
                <li>
                    <a href="news.html">Vesti</a>
                    <ul>
                        <li><a href="add_news.html">Unesi vest</a></li>
                        <li><a href="news_input.html">Azuriraj vesti</a></li>
                    </ul>
                </li>
                <li><a href="login.html">Uloguj se</a></li>
            </uL>
        </nav>
    </div>

    <div id="news-page-container">
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
                mysqli_close($conn);
                ?>
            </ul>
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

    <div class="footer">
        <h1></h1>
    </div>
</body>
</html>