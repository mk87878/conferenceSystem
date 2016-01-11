<?php
session_start();
//error_reporting(E_ALL || ~E_NOTICE);//屏蔽notice错误提示
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<title>list</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">
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
    echo "<script>alert('Password reset  success.');</script>";

  } else {
    echo "<script>alert('Password reset failed.');</script>";

  }
}
//设置管理员权限
if(isset($_GET['admin'])) {
  $userId = isset($_GET['userId']) ? $_GET['userId'] : '';
  $admin = isset($_GET['admin']) ? $_GET['admin'] : '';
  if($admin){
    $attr = '0';
  }else{
    $attr = '1';
  }
  $rePwSql = "UPDATE user SET admin = '$attr' WHERE id = '$userId' ";
  $rePwRe = $db->exec($rePwSql);
  if ($rePwRe) {
    echo "<script>alert('admin set  success.');location.href='adminUser.php';</script>";

  } else {
    echo "<script>alert('admin set failed.');location.href='adminUser.php';</script>";

  }
}
//设置冻结用户
if(isset($_GET['block'])) {
  $userId = isset($_GET['userId']) ? $_GET['userId'] : '';
  $block = isset($_GET['block']) ? $_GET['block'] : '';
  if($block){
    $attr = '0';
  }else{
    $attr = '1';
  }
  $rePwSql = "UPDATE user SET block = '$attr' WHERE id = '$userId' ";
  $rePwRe = $db->exec($rePwSql);
  if ($rePwRe) {
    echo "<script>alert('block reset  success.');location.href='adminUser.php';</script>";

  } else {
    echo "<script>alert('block reset failed.');location.href='adminUser.php';</script>";

  }
}
//编辑用户信息.当有表单点击edit时执行,用于用户修改个人资料使用
if(isset($_POST['edit'])){
//安全检测获取数据,避免notice提示信息
  $userName = isset($_POST['userName']) ? $_POST['userName']:'';
  $passWord = isset($_POST['passWord']) ? md5($_POST['passWord']):'';
  $email = isset($_POST['email']) ? $_POST['email']:'';
  $sectionId = isset($_POST['sectionId']) ? $_POST['sectionId']:'';
//修改资料时使用的值
  $id = isset($_POST['userId']) ? $_POST['userId']:'';
  include_once 'plugin/loginCheck.php';
  //修改用户信息
  include_once 'plugin/userListEdit.php';
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
$yes='btn-danger';
$no='btn-success';
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
        <?php if($info['userName'] != 'admin'){?>
        <div class="col-xs-1">
          <a href="adminUser.php?admin=<?php echo $info['admin'] ?>&userId=<?php echo $info['id'] ?>" class="btn-sm <?php echo $info['admin'] ? $yes:$no; ?>"><?php echo $info['admin'] ? 'YES':'N O'; ?></a>
        </div>
        <div class="col-xs-1">
          <a href="adminUser.php?block=<?php echo $info['block'] ?>&userId=<?php echo $info['id'] ?>" class="btn-sm <?php echo $info['block'] ? $yes:$no; ?>"><?php echo $info['block'] ? 'YES':'N O'; ?></a>
        </div>
        <div class="col-xs-2">
            <a  class="btn-sm btn-primary edit" data-toggle="modal" data-target="#Modal-<?php echo $i; ?>" >Edit</a>
            <a  class="btn-sm btn-danger del" href="adminUser.php?del=1&userId=<?php echo $info['id'] ?>" >Del</a>
        </div>
        <?php }else{?>
          <div class="col-xs-1">
            <span class=' text-danger root'>root</span>
          </div>
          <div class="col-xs-1">
            <span class=' text-danger root'>root</span>
          </div>
          <div class="col-xs-2">
            <span class=' text-danger root'>root</span>
          </div>
        <?php }  ?>
      </div>
        <!--        弹出add模态框 start-->
        <div class="modal fade" id="Modal-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" >
            <form  method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Add New Section</h4>
                </div>
                <div class="modal-body">
                  <div class="row form-group">
                    <label for="text"  class="col-sm-4  control-label text-right">*用户名</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm"  placeholder="UserName" name="userName" value="<?php echo $info['userName']; ?>">
                    </div>
                    <div class="col-sm-4 inputTips textRed">*</div>
                  </div>
                  <!------------------->
                  <div class="row form-group">
                    <label for="text"  class="col-sm-4 control-label text-right">*密码</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control input-sm"  placeholder="password" name="passWord">
                    </div>
                    <div class="col-sm-4 inputTips textRed">*</div>
                  </div>
                  <!------------------->
                  <div class="row form-group">
                    <label for="email"  class="col-sm-4  control-label text-right">*邮箱</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control input-sm"  placeholder="email" name="email" value="<?php echo $info['email']; ?>">
                    </div>
                    <div class="col-sm-4 inputTips textRed">*</div>
                  </div>
                  <input type="hidden" name="userId" value="<?php echo $info['id']; ?>">

                  <!------------------->
                  <div class="row form-group">
                    <label for="email"  class="col-sm-4  control-label text-right">*部门</label>
                    <div class="col-sm-4">
                      <select name="sectionId" class="form-control input-sm">
                        <?php include 'plugin/sectionShow.php'; ?>
                      </select>
                    </div>
                    <div class="col-sm-4 inputTips textRed">*</div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" name="edit" class="btn btn-success">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--        弹出add模态框 end-->
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
