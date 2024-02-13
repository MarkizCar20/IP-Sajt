<?php
session_start();
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['uname'];
    $password = $_POST['psw'];

    $query = "SELECT * FROM Kontrolori WHERE Email= '$email' and Sifra='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['idKontrolora'];
        $_SESSION['username'] = $user['Ime'];
        if ($user['Admin']) {
            $_SESSION['user_role'] = 'Admin';
        }
        else {
            $_SESSION['user_role'] = 'Control';
        }
        switch ($_SESSION['user_role']) {
            case 'control':
                header('Location: ../index.php');
                break;
            case 'admin':
                header('Location: ../index.php');
                break;
            default:
                header('Location: ../index.php');
        }
    }
    else {
        echo "Invalid username or password";
    }
}

