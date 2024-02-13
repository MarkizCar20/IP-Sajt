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
            <!-- Your navigation menu here -->
        </nav>
    </div>
    <div id="main-page-container"> <!-- Glavni deo stranice -->
        <div class="left-main-page"> <!-- Levi deo glavne strane -->
            <ul class="controler-list-container" id="izbornaMestaList">
                <?php
                require_once('php/db_connect.php');
                $query = "SELECT idIzbornoMesto, IzbornoMesto FROM IzbornaMestaRezultati";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li>";
                        echo "<p>" . $row['idIzbornoMesto'] . " - " . $row['IzbornoMesto'] . "</p>";
                        echo "<input type='hidden' name='izbornaMestoId' value='" . $row['idIzbornoMesto'] . "'>";
                        echo "<button onClick=\"deleteIzbornoMesto('" . $row['idIzbornoMesto'] . "')\">Izbrisi</button>";
                        echo "</form>";
                        echo "</li>";
                    }
                }
                mysqli_close($conn);
                ?>
            </ul>
        </div>
    </div>
    <div class="footer">
        <h1></h1>
    </div>

    <script>
        function deleteIzbornoMesto(id) {
            if(confirm("Da li sigurno zelite da obrisete izborno mesto?")) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        setTimeout( () => {
                            window.location.reload();
                        }, 2000);
                    }
                };
                xhttp.open("GET", "php/delete_voting_place.php?id=" + id, true);
                xhttp.send();
            }
        }
    </script>
</body>
</html>
