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
            $_SESSION['user_role'] = 'admin';
        }
        else {
            $_SESSION['user_role'] = 'control';
        }
        switch ($_SESSION['user_role']) {
            case 'control':
                header('Location: ../control_nav.html');
                break;
            case 'admin':
                header('Location: ../index.html');
                break;
            default:
                // echo($_SESSION['user_role']);
                header('Location: ../first_nav.html');
        }
    }
    else {
        echo "Invalid username or password";
    }
}

