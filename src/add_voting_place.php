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
        <div id="voting_place_add_container">
            <form method="post" enctype="multipart/form-data" id="votingplaceForm">
                <label>
                    <select class="dropdown" id="opstina_dropdown" name="opstina">
                        <!-- Options dinamically generated -->
                    </select>
                </label>
                <div class="form-container">
                    <label for="voteplace"><b>Izborno mesto</b></label>
                    <input type="text" placeholder="Unesite izborno mesto" name="name" required>
                    <button type="button" onclick="submitForm()">Unesi izborno mesto</button>
                    <div id="alert-container"></div>
                </div>
            </form>
        </div>
    <div class="footer">
        <h1></h1>
    </div>

    <script>
        fetch('php/fetch_opstina.php')
            .then(response => response.json())
            .then(data => {
                const dropdown = document.getElementById("opstina_dropdown");
                data.forEach(opstina => {
                    const option = document.createElement('option');
                    option.value = opstina;
                    option.textContent = opstina;
                    dropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching opstina data: ', error));
    </script>

    <script>
        function submitForm() {
            var form = document.getElementById('votingplaceForm');
            if (form.checkValidity()) {
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'php/create_voting_place.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            if(xhr.responseText.trim() === "Dodato Izborno Mesto!") {
                                showAlert('Uspesno dodata Opstina!');
                                setTimeout( () => {
                                    window.location.href = 'add_voting_place.html';
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
                showAlert('Please fill out all requested fields');
            }
        }

        function showAlert(message) {
            document.getElementById('alert-container').innerHTML = "<div class='alert'>" + message + "</div>";
        }
    </script>
</body>
</html>