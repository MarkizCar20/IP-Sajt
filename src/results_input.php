<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Results</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h2>Update Results</h2>
    <div id="main-page-container">
        <form action="update_results.php" method="post" enctype="multipart/form-data" id="resultsForm">
            <label for="izbornoMesto">Izborno Mesto:</label>
            <select name="izbornoMesto" id="izbornoMesto">
                <?php
                require_once('php/db_connect.php');
                $query = "SELECT IzbornoMesto FROM IzbornaMestaRezultati";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"" . $row['IzbornoMesto'] . "\">" . $row['IzbornoMesto'] . "</option>";
                }
                mysqli_close($conn);
                ?>
            </select>
            <br><br>
            <label for="partija1">Stranka Demokratskog Socijalizma:</label>
            <input type="text" name="partija1" id="Stranka Demokratskog Socijalizma"><br><br>
            <label for="partija2">Stranka Demokratskih Socijalista:</label>
            <input type="text" name="partija2" id="Stranka Demokratskih Socijalista"><br><br>
            <label for="partija3">Stranka Zelenaskih levicarskih pokreta:</label>
            <input type="text" name="partija3" id="Stranka Zelenaskih levicarskih pokreta"><br><br>
            <label for="ukupanBroj">Ukupan Broj Glasova:</label>
            <input type="text" name="ukupanBroj" id="ukupanBroj"><br><br>
            <label for="brojNevazecih">Broj Nevazecih Listica:</label>
            <input type="text" name="brojNevazecih" id="brojNevazecih"><br><br>
            <label for="brojGlasova">Broj Glasova:</label>
            <input type="text" name="brojGlasova" id="brojGlasova"><br><br>
            <label for="zapisnik">Zapisnik:</label>
            <input type="file" name="zapisnik" id="zapisnik"><br><br>
            <button type="button" onclick="submitForm()">Registruj se</button>
            <div id="alert-container"></div>
        </form>
    </div>
    <script>
        function submitForm() {
            var form = document.getElementById('resultsForm');
            if (form.checkValidity()) {
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'php/update_results.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            if (xhr.responseText.trim() === "Update successful!") {
                                showAlert('Dodati rezultati!');
                                setTimeout( () => {
                                    window.location.href = 'index.php';
                                }, "3000");
                            } else {
                                showAlert(xhr.responseText);
                            }
                        } else {
                            showAlert('Error: ' + xhr.status);
                        }
                    }
                };
                xhr.send(formData);
            } else {
                showAlert('Please fill out all required fields.');
            }
        }
        function showAlert(message) {
            document.getElementById('alert-container').innerHTML = "<div class='alert'>" + message + "</div>";
        }
    </script>
</body>
</html>
