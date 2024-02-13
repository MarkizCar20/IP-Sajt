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
    <div id="main-page-container"> <!-- Glavni deo stranice -->
        <div class="left-main-page"> <!-- Levi deo glavne strane -->
            <ul class="controler-list-container">
                <li><p>Izborno mesto 1</p><button>Izbrisi</button></li>
                <li><p>Izborno mesto 2</p><button>Izbrisi</button></li>
                <li><p>Izborno mesto 3</p><button>Izbrisi</button></li>
                <li><p>Izborno mesto 4</p><button>Izbrisi</button></li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <h1></h1>
    </div>
</body>
</html>