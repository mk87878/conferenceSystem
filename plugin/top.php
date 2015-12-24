<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>top</title>
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/common.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topBox"><div id="logo"><img src="../images/adminLogo.png" width="566" height="48" /></div>
  <div id="logoText">
    <div id="user">Welcome ：<a href="#"  target="_parent"><?php echo $_SESSION['userName'];?></a> </div>
    <ul>
      <li><a href="../register.php" target="_parent">Register</a></li>
      <li style="border:none"> <a href="../plugin/logout.php" target="_parent">log out</a></li>
    </ul>
  </div>
<topLine></topLine></div>
</body>
</html>
