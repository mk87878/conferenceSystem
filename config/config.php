<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/18
 * Time: 15:22
 */
date_default_timezone_set("Asia/Shanghai");//时区

$dsn = 'mysql:dbname=conference;host=127.0.0.1';//定义数据源
$user = 'root';//用户名
$passWord = '';//密码
try{
    $db = new PDO($dsn, $user,$passWord);//连接数据库
    $db -> query('set names utf8');//设置编码
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置关联索引获取数据集的时候，关联索引是大写还是小写,不设置就为默认
}
catch(PDOException $e){
    die("Error:".$e -> getMessage());
}
?>