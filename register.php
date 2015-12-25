<?php session_start(); ?>
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
    <script src="js/jquery-1.11.3.min.js"></script>
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
include_once 'config/config.php';
//安全检测获取数据,避免notice提示信息
$userName = isset($_POST['userName']) ? $_POST['userName']:'';
$passWord = isset($_POST['passWord']) ? md5($_POST['passWord']):'';
$email = isset($_POST['email']) ? $_POST['email']:'';
$sectionId = isset($_POST['sectionId']) ? $_POST['sectionId']:'';
//修改资料时使用的值
$id = isset($_GET['userId']) ? $_GET['userId']:'';
if(!empty($id)){
    $userSql = "SELECT * FROM user WHERE id = '$id' ";
    $userRe = $db -> query($userSql);
    $userInfo = $userRe -> fetch();
}

//当有表单点击register时执行,用于注册用户使用
if(isset($_POST['register'])){
    //检测用户名是否已经被注册
    include_once 'plugin/nameCheck.php';
    //向数据库插入新用户数据
    include_once 'plugin/register.php';
}

//当有表单点击edit时执行,用于用户修改个人资料使用
if(isset($_POST['edit'])){
    include_once 'plugin/loginCheck.php';
    $userId = $_POST['userId'];
    //修改用户信息
    include_once 'plugin/userEdit.php';
}




?>
<body class="bg">
<div class="container">
    <?php if(empty($id)){
        echo "<h2 class='text-center'>come quick! join us!</h2>";
    }else{
        echo "<h2 class='text-center'>My Profile <small><a href='control.php' class='btn-sm btn-danger'> back</a></small></h2>";
    } ?>
    <form method="post" class="form-horizontal  col-sm-12">
        <div class="form-group">
            <label for="text"  class="col-sm-4  control-label">*用户名</label>
            <div class="col-sm-4">
                <input type="text" class="form-control input-sm"  placeholder="UserName" name="userName" value="<?php if(!empty($id)){echo $userInfo['userName'];} ?>">
            </div>
            <div class="col-sm-4 inputTips textRed">*</div>
        </div>
        <!------------------->
        <div class="form-group">
            <label for="text"  class="col-sm-4 control-label">*密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control input-sm"  placeholder="password" name="passWord">
            </div>
            <div class="col-sm-4 inputTips textRed">*</div>
        </div>
        <!------------------->
        <div class="form-group">
            <label for="email"  class="col-sm-4  control-label">*邮箱</label>
            <div class="col-sm-4">
                <input type="email" class="form-control input-sm"  placeholder="email" name="email" value="<?php if(!empty($id)){echo $userInfo['email'];} ?>">
            </div>
            <div class="col-sm-4 inputTips textRed">*</div>
        </div>
        <!------------------->
        <div class="form-group">
            <label for="email"  class="col-sm-4  control-label">*部门</label>
            <div class="col-sm-4">
                <select name="sectionId" class="form-control input-sm">
                    <?php include_once 'plugin/sectionShow.php'; ?>
                </select>
            </div>
            <div class="col-sm-4 inputTips textRed">*</div>
        </div>
        <!------------------->

        <?php
        //如果get到userId,就显示修改信息,未检测到就显示注册
        if(empty($id)){
            echo "<button class='btn  btn-primary btn-block input30' type='submit' name='register'>Register</button>";
        }else{
            echo "<button class='btn  btn-success btn-block input30' type='submit' name='edit'>Edit</button>";
            echo "<input type='hidden' name='userId' value='$id'>";
        }
        ?>

    </form>
</div>
</body>
</html>