<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 13:48
 */
//查询用户名是否被占用
$checkSql = "SELECT * FROM user WHERE userName = '$userName'";
$checkRe = $db -> query($checkSql);//执行查询，返回结果集（resource类型）
$count = $checkRe -> rowCount();//判断返回结果集中的记录行数
if($count){//如果返会结果集中的记录行数非0（1）测说明用户名已被占用
    echo "<script language='javascript'>alert('sorry,userName has registered!');history.back();</script>";
    exit;
};