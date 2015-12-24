<?php
session_start();
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 15:08
 *
 * 修改用户个人资料
 */
//判断是否修改密码
if(empty($passWord)){
    $userEditSql = "UPDATE  user SET userName = '$userName',email = '$email',sectionId = '$sectionId' WHERE id = '$id'";
}else{
    $userEditSql = "UPDATE  user SET userName = '$userName',passWord = '$passWord',email = '$email',sectionId = '$sectionId' WHERE id = '$id'";
}

$userEditRe = $db -> exec($userEditSql);


if($userEditRe){
    $_SESSION['userName'] = $userName;
    echo "<script>alert('modify success.');location.href='./register.php?userId=";
    echo $id;
    echo "';";
    echo "</script>";
}else{
    echo "<script>alert('modify failed.');history.back();</script>";
}