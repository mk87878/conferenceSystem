<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 14:41
 *
 * 遍历显示部门选项,供sectionShow调用
 */
$sectionSql = "SELECT * FROM section";
$sectionRe = $db -> query($sectionSql);
