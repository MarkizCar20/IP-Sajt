<?php
session_start();

//upisati validne podatke
$_validuname="admin";
$_validpsw="admin";

$_uname=$_POST['uname'];
$_psw=$_POST['psw'];

if ($_uname==$_validuname && $_psw==$_validpsw) {
    $_SESSION['uname']="admin";
    header("location: index.html");
    exit();
}else {
    $_SESSION['loggedin']='false';
    echo '<h3>Invalid username or password! \n probaj sa user: admin, pass:admin</h3>';
}


?>
