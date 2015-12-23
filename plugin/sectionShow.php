<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 14:55
 *
 * 列表option项
 */
include_once 'sectionShow.php';
while($sectionInfo = $sectionRe -> fetch()) {
    echo "<option value ='";
    echo $sectionInfo['id'];
    echo "'>";
    echo $sectionInfo['section'];
    echo "</option>";
}