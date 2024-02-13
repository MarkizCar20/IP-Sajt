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
</head>
<body>
    <div class="header"> <!-- Zaglavlje stranice -->
        <h1>REPUBLICKI IZBORI REPUBLIKE SRBIJE</h1>
    </div>
    <?php
        include('navigation.php');
    ?>
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
                    echo "<button onClick=\"deleteOpstina('" . $row['Opstina'] . "')\">Izbrisi</button>";
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

    <script>
        function deleteOpstina(opstina) {
            if(confirm("Da li sigurno zelite obrisati opstinu?")) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        setTimeout( () => {
                            window.location.reload();
                        }, 1500);
                    }
                };
                xhttp.open("GET", "php/delete_opstina_row.php?opstina=" + opstina, true);
                xhttp.send();
            }
        }
    </script>
</body>
</html>