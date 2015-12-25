<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 14:29
 *
 * 注册新用户
 */
$registerSql = "INSERT INTO user (userName,passWord,email,sectionId) VALUES ('$userName','$passWord','$email','$sectionId')";
$registerRe = $db -> query($registerSql);

$registerCount = $registerRe -> rowCount();

if($registerCount){
    echo "<script>alert('registered success.');location.href='./index.html';</script>";
}else{
    echo "<script>alert('registered failed.');history.back();</script>";
}