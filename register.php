<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <!--其他引入项目-->
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/register.css">
</head>
<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/18
 * Time: 13:30
 */
?>
<body class="bg">
<div class="container">
    <h2 class="text-center">come quick! join us!</h2>
    <form action="" class="form-horizontal  col-sm-12">
        <div class="form-group">
            <label for="text"  class="col-sm-4  control-label">*用户名</label>
            <div class="col-sm-4">
                <input type="text" class="form-control input-sm"  placeholder="UserName">
            </div>
            <div class="col-sm-4 inputTips textRed">*</div>
        </div>
        <!------------------->
        <div class="form-group">
            <label for="text"  class="col-sm-4 control-label">*密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control input-sm"  placeholder="password">
            </div>
            <div class="col-sm-4 inputTips textRed">*</div>
        </div>
        <!------------------->
        <div class="form-group">
            <label for="email"  class="col-sm-4  control-label">*邮箱</label>
            <div class="col-sm-4">
                <input type="email" class="form-control input-sm"  placeholder="email">
            </div>
            <div class="col-sm-4 inputTips textRed">*</div>
        </div>
        <!------------------->
        <button class="btn  btn-primary btn-block input30" type="submit">Login</button>
    </form>
</div>
</body>
</html>