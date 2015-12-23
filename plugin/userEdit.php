<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 15:08
 *
 * 修改用户个人资料
 */

$userEditSql = "UPDATE  user SET userName = '$userName',passWord = '$passWord',email = '$email',sectionId = '$sectionId' WHERE id = '$id'";
$userEditRe = $db -> exec($userEditSql);

//$userEditCount = $userEditRe -> rowCount();

if($userEditRe){
    echo "<script>alert('modify success.');history.back();</script>";
}else{
    echo "<script>alert('modify failed.');history.back();</script>";
}