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
    <script src="js/clock.js"></script>
</head>
<body>
    <div class="header">
        <!-- Zaglavlje stranice -->
        <h1>REPUBLICKI IZBORI REPUBLIKE SRBIJE</h1>
    </div>
    <?php
        include('navigation.php');
    ?>

    <div id="login-container">
        <form method="post" enctype="multipart/form-data" id="registrationForm">
            <div class="form-container">
                <label for="uname"><b>E-mail adresa</b></label>
                <input type="text" placeholder="Unesite E-mail adresu" name="email" id="email" required>

                <label for="psw"><b>Sifra</b></label>
                <input type="password" placeholder="Unesite Sifru" name="psw" id="password" required>

                <label for="name"><b>Ime</b></label>
                <input type="text" placeholder="Unesite Ime" name="name" id="name" required>

                <label for="lastname"><b>Prezime</b></label>
                <input type="text" placeholder="Unesite Prezime" name="lastname" id="lastname" required>

                <label for="phone"><b>Br. telefona</b></label>
                <input type="text" placeholder="Unesite br. telefona" name="phone" id="phone" required>

                <label for="address"><b>Adresa</b></label>
                <input type="text" placeholder="Unesite Adresu" name="address" id="address" required>

                <label for="votingplace"><b>Biracko mesto</b></label>
                <input type="text" placeholder="Unesite biracko mesto" name="votingplace" id="votingplace" required>

                <label for="image"><b>Slika</b></label>
                <input type="file" placeholder="Unesite sliku" name="image" id="image" required>

                <button type="button" onclick="submitForm()">Registruj se</button>
                <div id="alert-container"></div>
            </div>
        </form>
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
        <div class="point" id="point"></div>
    </div>

    <script>
        function submitForm() {
            var form = document.getElementById('registrationForm');
            if (form.checkValidity()) {
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'php/register.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            if (xhr.responseText.trim() === "Registration successful!") {
                                showAlert('Registration successful!');
                                setTimeout(() => {
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
