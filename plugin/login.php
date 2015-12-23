<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 11:07
 *
 * 用户登录
 */
include_once '../config/config.php';
if(isset($_POST['submit'])){//判断是否有提交表单动作（是否需要登录）
    $userName = $_POST['userName'];
    $passWord = md5($_POST['passWord']);
    $loginSql = "SELECT * FROM user WHERE userName = '$userName' AND passWord = '$passWord'";
    $loginRe = $db -> query($loginSql);
    $count = $loginRe -> rowCount();
    if($count){
        $loginInfo = $loginRe -> fetch();//取出$loginRe中的一行存入$loginInfo的数组
        $_SESSION['admin'] = $loginInfo['admin'];//登录用户管理员权限存入session
        $_SESSION['userName'] = $loginInfo['userName'];//登录用户名存入session
        $_SESSION['userId'] = $loginInfo['id'];//登录用户id存入session

        echo "<script>alert('Login success. Welcome to here!');location.href='./index.html';</script>";
    }
}

