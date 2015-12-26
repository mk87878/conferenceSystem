<?php
session_start();
//error_reporting(E_ALL || ~E_NOTICE);//屏蔽notice错误提示
?>
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
$sql = "SELECT user.*,section.section FROM user,section WHERE user.sectionId = section.id";
$re = $db -> query($sql);
$url = $_SERVER['PHP_SELF'];

//重置密码为abc123
if(isset($_GET['rePw'])) {
  $userId = isset($_GET['userId']) ? $_GET['userId'] : '';
  $passWord = md5('abc123');
  $rePwSql = "UPDATE user SET passWord = '$passWord' WHERE id = '$userId' ";
  $rePwRe = $db->exec($rePwSql);
  if ($rePwRe) {
    echo "<meta http-equiv=refresh content='0; url = ".$url."'>";
    echo "<script>alert('Password reset  success.');</script>";

  } else {
    echo "<meta http-equiv=refresh content='0; url = ".$url."'>";
    echo "<script>alert('Password reset failed.');</script>";
  }
}
//删除用户
if(isset($_GET['del'])) {
  $userId = isset($_GET['userId']) ? $_GET['userId'] : '';
  $delSql = "DELETE FROM user  WHERE id = '$userId' ";
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
      <li><span><a href="#">userInfo</a></span></li>
    
    </ul>
    <a style="color: red" class=" glyphicon-plus pull-right newUer" href="register.php" target="_parent">add New User</a>
    </div>
  <div id="content">
    <div class="container-fluid listBg contentHig">
      <div class="row text-center title">
        <div class="col-xs-1 num">Num</div>
        <div class="col-xs-1 name">Name</div>
        <div class="col-xs-2 email">Email</div>
        <div class="col-xs-1 section">Section</div>
        <div class="col-xs-2 password">PassWord</div>
        <div class="col-xs-1 admin">Admin</div>
        <div class="col-xs-1 block">Block</div>
        <div class="col-xs-2 control">Control</div>
      </div>
      <?php
      //列表显示用户信息
      $i = 1;
      while ($info = $re -> fetch()) {

      ?>
      <div class="row text-center listItem">
        <div class="col-xs-1"><?php echo $i; ?></div>
        <div class="col-xs-1"><?php echo $info['userName'] ?></div>
        <div class="col-xs-2"><?php echo $info['email'] ?></div>
        <div class="col-xs-1"><?php echo $info['section'] ?></div>
        <div class="col-xs-2">
          <?php if($info['admin'] != 1){?>
          <a class="btn-sm btn-success rePassword"
             href="adminUser.php?rePw=1&userId=<?php echo $info['id'] ?>">
            &nbsp;Reset&nbsp;
          </a>
          <?php }else{
            echo "<span class='text-danger root'>root</span>";
          }  ?>
        </div>
        <div class="col-xs-1"><?php echo $info['admin'] ? 'YES':'NO'; ?></div>
        <div class="col-xs-1"><?php echo $info['block'] ? 'YES':'NO'; ?></div>
        <div class="col-xs-2">
          <?php if($info['admin'] != 1){?>
            <a  class="btn-sm btn-danger del" href="adminUser.php?del=1&userId=<?php echo $info['id'] ?>" >Del</a>
          <?php }else{
            echo "<span class=' text-danger root'>root</span>";
          }  ?>

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

<!--存放所有公共js-->
<script src="bootstrap-3.3.5-dist/js/common.js"></script>

</body>
</html>
