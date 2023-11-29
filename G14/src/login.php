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
    <div id="navbar-container">
        <nav>
            <uL>
                <li><a href="first_nav.html">Naslovna</a></li>
                <li><a href="#">Izborni rezultati</a></li>
                <li><a href="news.html">Vesti</a>
                </li>
                <li><a href="login.html">Uloguj se</a></li>
            </uL>
        </nav>
    </div>
    <div id="login-container">
        <form action="login_p.php" method="post">
            <div class="form-container">
                <label for="uname"><b>E-mail adresa</b></label>
                <input type="text" placeholder="Unesite E-mail adresu" name="uname" required>
                
                <label for="psw"><b>Sifra</b></label>
                <input type="password" placeholder="Unesite Sifru" name="psw" required>
                
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