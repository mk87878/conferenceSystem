<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 14:41
 */
include_once '../config/config.php';
$sectionSql = "SELECT * FROM section";
$sectionRe = $db -> query($sectionSql);
