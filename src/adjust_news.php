<?php
include 'php/session_check.php'
?>

<?php
require_once('php/db_connect.php');
if(isset($_GET['Naslov'])) {
    $Naslov = mysqli_real_escape_string($conn, $_GET['Naslov']);

    $query = "SELECT * FROM Vesti WHERE Naslov='$Naslov'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $Naslov = $row['Naslov'];
        $Datum = $row['Datum'];
        $Sadrzaj = $row['Sadrzaj'];
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
        <form method="post" enctype="multipart/form-data" id="newsForm">
            <div class="form-container" >
                <input type="hidden" id="stari_naslov" name="old_naslov" value="<?php echo $Naslov; ?>">
                <label for="naslov"><b>Naslov: </b></label>
                <input type="text" placeholder="Unesite naslov" name="naslov" id="naslov" value="<?php echo $Naslov; ?>" required>
                
                <label for="datum"><b>Datum</b></label>
                <input type="date" placeholder="Unesite Datum" name="datum" id="datum" value="<?php echo $Datum; ?>" required>

                <label for="sadrzaj"><b>Sadrzaj</b></label>
                <input type="text" placeholder="Unesite Sadrzaj" name="sadrzaj" id="sadrzaj" value="<?php echo $Sadrzaj; ?>" required>
                <button type="button" onclick="submitForm()">Azuriraj vest</button>
                <div id="alert-container"></div>
            </div>
        </form>
    </div>
    
    <div class="footer">
        <h1></h1>
    </div>

    <script>
        function submitForm() {
            var form = document.getElementById('newsForm');
            if (form.checkValidity()) {
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'php/update_news.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            if (xhr.responseText.trim() === "Update successful!") {
                                showAlert('Azurirana Vest!');
                                setTimeout( () => {
                                    window.location.href = 'news.php';
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

