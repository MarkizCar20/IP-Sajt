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
        <form action="php/login.php" method="post">
            <div class="form-container">
                <label for="uname"><b>E-mail adresa</b></label>
                <input type="text" placeholder="Unesite E-mail adresu" name="uname" id="email" required>
                
                <label for="psw"><b>Sifra</b></label>
                <input type="password" placeholder="Unesite Sifru" name="psw" id="password" required>
                
                <button type="submit">Login</button>
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Zapamti me
                </label>
                <div><a href="register.html">Registruj se</a></div>
            </div>
        </form>
    </div>
    
    <div class="footer">
        <h1></h1>
    </div>
</body>
</html>