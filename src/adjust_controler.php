<?php

require_once('php/db_connect.php');
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM Kontrolori WHERE idKontrolora = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $ime = $row['Ime'];
        $prezime = $row['Prezime'];
        $telefon = $row['Telefon'];
        $email = $row['Email'];
        $sifra = $row['Sifra'];
        $adresa = $row['Adresa'];
        $izbornoMesto = $row['idIzbornoMesto'];
    }

}
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
            <form method="post" enctype="multipart/form-data" id="registrationForm">
                <div class="form-container" >
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                    <label for="uname"><b>E-mail adresa</b></label>
                    <input type="text" placeholder="Unesite E-mail adresu" name="email" id="email" value="<?php echo $email; ?>" required>
                    
                    <label for="psw"><b>Sifra</b></label>
                    <input type="password" placeholder="Unesite Sifru" name="psw" id="password" value="<?php echo $sifra; ?>" required>

                    <label for="name"><b>Ime</b></label>
                    <input type="text" placeholder="Unesite Ime" name="name" id="name" value="<?php echo $ime; ?>" required>

                    <label for="lastname"><b>Prezime</b></label>
                    <input type="text" placeholder="Unesite Prezime" name="lastname" id="lastname" value="<?php echo $prezime; ?>" required>

                    <label for="phone"><b>Br. telefona</b></label>
                    <input type="text" placeholder="Unesite br. telefona" name="phone" id="phone" value="<?php echo $telefon; ?>" required>

                    <label for="address"><b>Adresa</b></label>
                    <input type="text" placeholder="Unesite Adresu" name="address" id="address" value="<?php echo $adresa; ?>" required>

                    <label for="votingplace"><b>Biracko mesto</b></label>
                    <input type="text" placeholder="Unesite biracko mesto" name="votingplace" id="votingplace" value="<?php echo $izbornoMesto; ?>"required>
                    
                    <button type="button" onclick="submitForm()">Azuriraj kontrolora</button>
                    <div id="alert-container"></div>
                </div>
            </form>
        </div>
        
        <div class="footer">
            <h1></h1>
        </div>

        <script>
            function submitForm() {
                var form = document.getElementById('registrationForm');
                if (form.checkValidity()) {
                    var formData = new FormData(form);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'php/update_controler.php', true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                if (xhr.responseText.trim() === "Update successful!") {
                                    showAlert('Azuriran Kontroler!');
                                    setTimeout( () => {
                                        window.location.href = 'controler_list.php';
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