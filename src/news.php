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

    <div class="footer">
        <h1></h1>
    </div>
</body>
</html>