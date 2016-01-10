<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/12/23
 * Time: 15:03
 *
 * 检查是否已经登录
 */

if(empty($_SESSION['userName'])) {
    echo "<script>alert('Not login or logon timeout.');location.href=index.html</script>";//登录超时或者未登录
    exit;
}