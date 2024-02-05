<?php

$db_host = "localhost";
$db_user = "root";
$db_pwd = "123456";
$db_name = "Izbori";

$conn = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

if (!$conn) {
    die("Connection failed ". mysqli_connect_error());
}