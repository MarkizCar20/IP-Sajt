<?php
include 'php/session_check.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <div id="login-container">
        <form id="municipalityForm" method="post" enctype="multipart/form-data">
            <div class="form-container">
                <label for="munname"><b>Ime opstine</b></label>
                <input type="text" placeholder="Opstina" name="opstina" id="opstina"required>
                <button type="button" onclick="submitForm()">Unesi opstinu</button>
                <div id="alert-container"></div>
            </div>
        </form>
    </div>
    
    <div class="footer">
        <h1></h1>
    </div>

    <script>
        function submitForm() {
            var form = document.getElementById('municipalityForm');
            if (form.checkValidity()) {
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'php/add_municipality.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            if (xhr.responseText.trim() === "Municipality added!") {
                                showAlert('Opstina dodata uspesno');
                                setTimeout( () => {
                                    window.location.href = 'index.php';
                                }, 2000);
                            }
                            else {
                                showAlert(xhr.responseText);
                            }
                        }
                        else {
                            showAlert('Error: ' + xhr.status);
                        }
                    }
                };
                xhr.send(formData);
            }
            else {
                showAlert('Molimo Vas popunite sva obavezna polja.');
            }
        }

        function showAlert(message) {
            document.getElementById('alert-container').innerHTML = "<div class='alert'>" + message + "</div>";
        }
    </script>
</body>
</html>