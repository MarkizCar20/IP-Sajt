<?php
include 'php/session_check.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Results</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php
        include('navigation.php');
    ?>
    <div id="main-page-container">
        <div id="login-container">
            <form id="resultsForm" enctype="multipart/form-data">
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
                <input type="text" name="partija1" id="partija1"><br><br>
                <label for="partija2">Stranka Demokratskih Socijalista:</label>
                <input type="text" name="partija2" id="partija2"><br><br>
                <label for="partija3">Stranka Zelenaskih levicarskih pokreta:</label>
                <input type="text" name="partija3" id="partija3"><br><br>
                <label for="ukupanBroj">Ukupan Broj Glasova:</label>
                <input type="text" name="ukupanBroj" id="ukupanBroj"><br><br>
                <label for="brojNevazecih">Broj Nevazecih Listica:</label>
                <input type="text" name="brojNevazecih" id="brojNevazecih"><br><br>
                <label for="brojBiraca">Broj Biraca:</label>
                <input type="text" name="brojGlasova" id="brojGlasova"><br><br>
                <label for="zapisnik">Zapisnik:</label>
                <input type="file" name="zapisnik" id="zapisnik"><br><br>
                <button type="button" onclick="submitForm()">Submit</button>
                <div id="alert-container"></div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('izbornoMesto').addEventListener('change', function() {
            var izbornoMesto = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'php/fetch_results.php?izbornoMesto=' + izbornoMesto, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    document.getElementById('partija1').value = data['Stranka Demokratskog Socijalizma'];
                    document.getElementById('partija2').value = data['Stranka Demokratskih Socijalista'];
                    document.getElementById('partija3').value = data['Stranka Zelenaskih levicarskih pokreta'];
                    document.getElementById('ukupanBroj').value = data['UkupanBroj'];
                    document.getElementById('brojNevazecih').value = data['BrojNevazecih'];
                    document.getElementById('brojGlasova').value = data['BrojGlasova'];
                }
            };
            xhr.send();
        });

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
                                showAlert('Results updated successfully!');
                                setTimeout(() => {
                                    window.location.reload();
                                }, 3000);
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
