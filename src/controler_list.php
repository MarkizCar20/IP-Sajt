<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
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
    <div id="main-page-container"> <!-- Glavni deo stranice -->
        <ul class="controler-list-container">
            <?php
            require_once('php/db_connect.php');
            $query = "SELECT * FROM Kontrolori";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>";
                    echo "<p>". $row['Ime'] . " " . $row['Prezime'] . " id:" . $row['idKontrolora'] . "</p>";
                    echo "<button onClick=\"redirectToAzuriraj(" . $row['idKontrolora'] . ")\">Azuriraj</button>";
                    echo "<button onClick=\"deleteKontrolora(" . $row['idKontrolora'] . ")\"\>Izbrisi</button>";
                    echo "</li>";
                }
            }
            ?>
        </ul>
    </div>
    <div class="footer">
        <h1></h1>
    </div>

    <script>
        function redirectToAzuriraj(id) {
            window.location.href="adjust_controler.php?id=" + id;
        }

        function deleteKontrolora(id) {
            if(confirm("Da li sigurno zelite da obrisete kontrolera?")) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200 ){
                        setTimeout( () => {
                            window.location.reload();
                        }, 2000);
                    }
                };
                xhttp.open("GET", "php/delete_row.php?id=" + id, true);
                xhttp.send();
            }
        }
    </script>
</body>
</html>