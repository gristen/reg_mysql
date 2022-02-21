<?php
session_start();


$_SESSION[auth] = false;
unset($result);
header('Location: /login.php');


?>
