<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>conference management system</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="conference management system" />
    <meta name="keywords" content="conference management system" />
    <meta name="Author" content="" />
    <meta name="CopyRight" content="conference management system" />
</head>
<?php
include_once 'config/config.php';
include_once 'plugin/loginCheck.php';
?>
<frameset rows="98,*"  frameborder="no" border="0" framespacing="0">
    <!--头部-->
    <frame src="plugin/top.php" name="top" noresize="noresize" frameborder="0"  scrolling="no" marginwidth="0" marginheight="0" />
    <!--主体部分-->
    <frameset cols="185,*">
        <!--主体左部分-->
        <frame src="plugin/left.php" name="left" noresize="noresize" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" />
        <!--主体右部分-->
        <frame src="main.php" name="main" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0"  />
</frameset><noframes></noframes>
</html>