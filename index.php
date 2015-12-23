<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <!--其他引入项目-->
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/login.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/18
 * Time: 13:30
 */
include_once 'config/config.php';

?>

<body class="bg">
<div class="container">
    <form class="form-login">
        <h2 class="form-login-heading">Please login</h2>

        <input type="text" id="inputUserName" name="userName" class="form-control" placeholder="userName" required autofocus>

        <input type="password" name="passWord" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-success btn-block" type="submit">login</button>
    </form>

</div>
</body>
</html>