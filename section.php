<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>list</title>
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
  <!--其他引入项目-->
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  <link href="css/common.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/list.css">
</head>

<?php
include_once 'config/config.php';
$userName = isset($_SESSION['userName']) ? $_SESSION['userName']:'';
$userId = isset($_SESSION['userId']) ? $_SESSION['userId']:'';
$admin = isset($_SESSION['admin']) ? $_SESSION['admin']:'';
//检查是否为管理员
include_once 'plugin/admin.php';
//查询数据库用户信息
$sql = "SELECT * FROM section ";
$re = $db -> query($sql);
$url = $_SERVER['PHP_SELF'];
//删除部门
if(isset($_GET['del'])) {
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $delSql = "DELETE FROM section  WHERE id = '$id' ";
  $delRe = $db->exec($delSql);
  if ($delRe) {
    echo "<meta http-equiv=refresh content='0; url = ".$url."'>";
//    echo "<script>location.href='adminUser.php';alert('Delete  success.');</script>";
  }
}

?>

<body>

<div id="listBox" >
  <div id="title">
    <ul>
      <li><span><a href="#">Section Setting</a></span></li>
      <a style="color: red" class=" glyphicon-plus pull-right newSection" href="register.php" target="_parent">add New Section</a>

    </ul>
    </div>
  <div id="content">
    <div class="container-fluid listBg contentHig">
      <div class="row title">
        <div class="col-xs-1 text-center num">Num</div>
        <div class="col-xs-2 text-center section">Section</div>
        <div class="col-xs-7"><span class="details">Section details</span></div>
        <div class="col-xs-2 text-center control">control</div>
      </div>

      <?php
      //列表显部门信息
      $i = 1;
      while ($info = $re -> fetch()) {
      ?>
      <div class="row listItem">
        <div class="col-xs-1 text-center"><?php echo $i; ?></div>
        <div class="col-xs-2 text-center"><?php echo $info['section']; ?></div>
        <div class="col-xs-7 "><?php echo $info['sectionDetails']; ?></div>
        <div class="col-xs-2 text-center">
          <a class="btn-sm btn-success edit"  href="section.php?edit=1&id=<?php echo $info['id'] ?>" >Edit</a>
          <a class="btn-sm btn-danger del" href="section.php?del=1&id=<?php echo $info['id'] ?>" >Del</a>
        </div>
      </div>
      <?php
      $i++;
      }
      ?>


  </div>
  </div>

  <div id="contact">
    <ul>
        <li> conference management system</li>
        <li>  Coyright © 2014-2020 conference management system 版权所有</li>
    </ul>
</div>
</div>


<!--存放所有公共js(大杂烩)-->
<script src="bootstrap-3.3.5-dist/js/common.js"></script>

</body>
</html>
