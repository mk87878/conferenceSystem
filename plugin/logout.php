<?php
session_start();
$_SESSION['login'] = '';
$_SESSION['admin'] = '';
session_destroy();
header("Location: ../index.html");
?>
