<?php
include 'php/session_check.php';
include 'php/db_connect.php';
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
    <div id="navbar-container">
        <nav> <!-- Navigacioni bar -->
            <ul>
                <li><a href="index.html">Naslovna</a></li>
                <li><a href="#">Izborni rezultati</a></li>
                <li><a href="#">Kontrolori</a>
                    <ul>
                        <li><a href="controler_input.html">Unesi kontrolora</a></li>
                        <li><a href="controler_list.html">Spisak kontrolora</a></li>
                    </ul>
                </li>
                <li><a href="#">Izborne celine</a>
                    <ul>
                        <li><a href="#">Opstine</a>
                            <ul>
                                <li><a href="add_municipality.html">Unesi opstinu</a></li>
                                <li><a href="list_municipality.html">Spisak opstina</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Izborna mesta</a>
                            <ul>
                                <li><a href="add_voting_place.html">Unesi izborno mesto</a></li>
                                <li><a href="list_voting_place.html">Spisak izbornih mesta</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Vesti</a>
                    <ul>
                        <li><a href="#">Unesi vest</a></li>
                        <li><a href="#">Azuriraj vesti</a></li>
                    </ul>
                </li>
                <li><a href="first_nav.html">Izloguj se</a></li>
            </ul>
        </nav>
    </div>
    <div id="municipality-page-container"> <!-- Glavni deo stranice -->
        <ul id="municipality-list-element">
            <li>
                <p>Opstina</p>
                <p>Broj izbornih mesta</p>
                <p>Broj obradjenih izbornih mesta</p>
            </li>
            <?php
            require_once('php/db_connect.php');
            $query = "SELECT * FROM Opstina";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>";
                    echo "<p><strong>" . $row['Opstina'] . "</strong></p>";
                    echo "<p><strong>" . $row['BrojMesta'] . "</strong></p>";
                    echo "<p><strong>" . $row['BrojRezultata'] . "</strong></p>";
                    echo "</li>";
                }
            }
            else {
                echo "<p>Opstine nisu ubacene</p>";
            }
            mysqli_close($conn);
            ?>
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