<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="header">
        <!-- Zaglavlje stranice -->
        <h1>REPUBLICKI IZBORI REPUBLIKE SRBIJE</h1>
    </div>
    <?php
    include('navigation.php');
    ?>
        <div id="news-page-container">
            <form method="post" enctype="multipart/form-data" id="newsForm">
                <div class="form-container">
                    <label for="naslov">Naslov:</label><br>
                    <input type="text" id="naslov" name="naslov" required><br>
                    
                    <label for="datum">Datum:</label><br>
                    <input type="date" id="datum" name="datum" required><br>
                    
                    <label for="sadrzaj">Sadrzaj:</label><br>
                    <textarea id="sadrzaj" name="sadrzaj" required></textarea><br>
                    
                    <button type="button" onclick="submitForm()">Dodaj Vest</button>
                    <div id="alert-container"></div>
                </div>
            </form>
        </div>

    <script>
        function submitForm() {
            var form = document.getElementById('newsForm');
            if (form.checkValidity()) {
                // Validate date range
                var inputDate = new Date(document.getElementById('datum').value);
                var minDate = new Date('1900-01-01');
                var maxDate = new Date('2100-12-31');
                
                if (inputDate >= minDate && inputDate <= maxDate) {
                    var formData = new FormData(form);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'php/add_news.php', true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                if (xhr.responseText.trim() === "New record created successfully") {
                                    showAlert('News added successfully!');
                                    setTimeout(() => {
                                        window.location.href = 'news_input.html';
                                    }, 1500);
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
                    showAlert('Molimo Vas ubacite validan datum izmedju 1900-01-01 i 2100-12-31.');
                }
            } else {
                showAlert('Popunite sva polja');
            }
        }

        function showAlert(message) {
            document.getElementById('alert-container').innerHTML = "<div class='alert'>" + message + "</div>";
        }
    </script>
    
    <div class="footer">
        <h1></h1>
    </div>
</body>
</html>