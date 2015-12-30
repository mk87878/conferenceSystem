<?php
session_start();
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/30
 * Time: 15:37
 */
include_once '../config/config.php';
include_once 'admin.php';
$section = isset($_POST['section']) ? $_POST['section']:'';
$sectionDetails = isset($_POST['sectionDetails']) ? $_POST['sectionDetails']:'';

if(isset($_POST['sectionEdit'])){
    $sectionId = isset($_POST['SectionId']) ?$_POST['SectionId']:'';
    $sql = "UPDATE section SET section = '$section', sectionDetails = '$sectionDetails' WHERE id = '$sectionId' ";
}
if(isset($_POST['sectionAdd'])){
    $sql = "INSERT INTO section  (section,sectionDetails) VALUES ('$section','$sectionDetails')";
}
$re = $db -> query($sql);
$count = $re -> rowCount();
if($count){
    echo "<script>alert('success.');location.href='../section.php';</script>";
}else{
    echo "<script>alert('failed.');history.back();</script>";
}
