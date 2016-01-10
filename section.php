<?php session_start(); ?>
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
//查询数据库部门信息
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
      <a style="color: red" class=" glyphicon-plus pull-right newSection" data-toggle="modal" data-target="#Modal">Add New Section</a>
      <!--        弹出add模态框 start-->
      <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" >
          <form action="plugin/sectionEdit.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add New Section</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Section:</label>
                  <input type="text" class="form-control" id="recipient-name"  name="section">
                </div>
                <div class="form-group">
                  <label for="message-text" class="control-label">Detail:</label>
                  <textarea class="form-control" id="message-text" name="sectionDetails"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="sectionAdd" class="btn btn-success">Confirm</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--        弹出add模态框 end-->

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
          <a class="btn-sm btn-success edit" data-toggle="modal" data-target="#Modal-<?php echo $i; ?>" >Edit</a>
          <a class="btn-sm btn-danger del" href="section.php?del=1&id=<?php echo $info['id'] ?>" >Del</a>
        </div>
      </div>
<!--        弹出修改模态框 start-->
        <div class="modal fade" id="Modal-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" >
            <form action="plugin/sectionEdit.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Modify</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Section:</label>
                  <input type="text" class="form-control" id="recipient-name" value="<?php echo $info['section']; ?>" name="section">
                </div>
                <div class="form-group">
                  <label for="message-text" class="control-label">Detail:</label>
                  <textarea class="form-control" id="message-text" name="sectionDetails"><?php echo $info['sectionDetails']; ?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="sectionEdit" class="btn btn-success">Confirm</button>
                <input type="hidden" value="<?php echo $info['id']; ?>" name="SectionId">
              </div>
            </div>
            </form>
          </div>
        </div>
<!--        弹出修改模态框 end-->

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
