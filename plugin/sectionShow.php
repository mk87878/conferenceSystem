<?php
session_start();
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 14:55
 *
 * 列表option项
 */
$sectionSql = "SELECT * FROM section";
$sectionRe = $db -> query($sectionSql);
while($sectionInfo = $sectionRe -> fetch()) {
    echo "<option value ='";
    echo $sectionInfo['id'];
    echo "'>";
    echo $sectionInfo['section'];
    echo "</option>";
}