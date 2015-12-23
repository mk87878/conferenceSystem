<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 13:09
 * 检查是否为管理员用户
 */
if($_SESSION['admin'] != 1){//判断是否为管理员登录此页面
    echo "<script>alert('Login failed. you are not the administrator!');history.back();</script>";
}