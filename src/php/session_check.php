<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $logout_link = '<a href="php/logout.php">Izloguj se</a>';
}
else {
    $login_link = '<a href="login.php">Uloguj se</a>'; 
}