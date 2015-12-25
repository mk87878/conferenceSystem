<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>top</title>
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css">
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
  <!--其他引入项目-->
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/common.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topBox"><div id="logo"><img src="../images/adminLogo.png" width="566" height="48" /></div>
  <div id="logoText">
    <div id="user">Welcome ：<a href="../register.php?userId=<?php echo $_SESSION['userId'];?>"  target="_parent" data-toggle="tooltip" data-placement="top" data-original-title="修改个人资料"><?php echo $_SESSION['userName'];?></a> </div>
    <ul>
      <li><a href="../register.php" target="_parent" data-toggle="tooltip" data-placement="top" data-original-title="注册新用户">Register</a></li>

      <li style="border:none"> <a href="../plugin/logout.php" target="_parent" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="注销">Log out</a></li>
    </ul>
  </div>
<topLine></topLine></div>
<!--存放所有公共js(大杂烩)-->
<script src="../bootstrap-3.3.5-dist/js/common.js"></script>
</body>
</html>
