<?php
session_start();
session_destroy();
header("location:first_nav.html");
exit();
?>