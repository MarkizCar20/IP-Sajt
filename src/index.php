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
                        <li><a href="news_input.html">Unesi vest</a></li>
                        <li><a href="news.html">Azuriraj vesti</a></li>
                    </ul>
                </li>
                <li>
                    <?php
                    if (isset($logout_link)) {
                        echo $logout_link;
                    } elseif (isset($login_link)) {
                        echo $login_link;
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
    <div id="main-page-container"> <!-- Glavni deo stranice -->
        <div class="left-main-page"> <!-- Levi deo glavne strane -->
            <ul class="opstine-container">
                <li>
                    <p>Opstina 1</p>
                    <ul>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                    </ul>
                </li>
                <li>
                    <p>Opstina 2</p>
                    <ul>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                    </ul>
                </li>  
                <li>
                    <p>Opstina 3</p>
                    <ul>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                    </ul>
                </li>
                <li>
                    <p>Opstina 1</p>
                    <ul>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                        <li>Stranka 1, glasovi: </li>
                    </ul>
                </li>
            </ul>
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
                <div class="vesti_container">
                    <ul>
                        <li>
                            <p>11.11.2022.</p>
                            <p><a href="google.com"> ipsum dolor sit</a></p>
                        </li>
                        <li>
                            <p>Vest 1</p>
                            <p><a href="google.com"> ipsum dolor sit</a></p>
                        </li>
                        <li>
                            <p>Vest 1</p>
                            <p><a href="google.com"> ipsum dolor sit</a></p>
                        </li>
                        <li>
                            <p>Vest 1</p>
                            <p><a href="google.com"> ipsum dolor sit</a></p>
                        </li>
                        <li>
                            <p>Vest 1</p>
                            <p><a href="google.com"> ipsum dolor sit</a></p>
                        </li>
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