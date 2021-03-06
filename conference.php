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
include_once 'plugin/loginCheck.php';
//查询数据库用户信息
$sql = "SELECT * FROM conference";
$re = $db -> query($sql);
$url = $_SERVER['PHP_SELF'];
//删除
if(isset($_GET['del'])) {
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $delSql = "DELETE FROM conference  WHERE id = '$id' ";
  $delRe = $db->exec($delSql);
  if ($delRe) {
    echo "<meta http-equiv=refresh content='0; url = ".$url."'>";
  }
}
if(isset($_POST['search'])) {
  $searchItem = isset($_POST['searchItem']) ? $_POST['searchItem']:'';
  $searchText = isset($_POST['searchText']) ? $_POST['searchText']:'';
  $searchSql = "SELECT * FROM conference WHERE ".$searchItem." = '$searchText' ";
  $re = $db->query($searchSql);
}


?>

<body>

<div id="listBox" >
  <div id="title">
    <ul>
      <li><span><a href="#">Conference Record</a></span></li>
    </ul>
    <div class="pull-right">
    <a  class="btn-sm btn-success" data-toggle="modal" data-target="#Modal">Search</a>
      <a  class="btn-sm btn-primary" href="conference.php">All Conference</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a style="color: red" class="glyphicon-plus newRecord" href="addRecord.php" >add New Conference Record</a>
    </div>
    </div>
  <!--        弹出add模态框 start-->
  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" >
      <form  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Search</h4>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row form-group">
                  <select class="form-control" name="searchItem">
                    <option value="conferenceName">会议名称</option>
                    <option value="id">会议编号</option>
                    <option value="section">部门</option>
                  </select>
              </div>
              <div class="row form-group">
                <input type="text" class="form-control" name="searchText">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="search" class="btn btn-success">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--        弹出add模态框 end-->
  <div id="content">
    <div class="container-fluid listBg contentHig">
      <div class="row text-center title">
        <div class="col-xs-1 num">Num</div>
        <div class="col-xs-2 name">Conference Name</div>
        <div class="col-xs-1 section">Section</div>
        <div class="col-xs-1 location">Location</div>
        <div class="col-xs-1 time">Time</div>
        <div class="col-xs-1 compere">Compere</div>
        <div class="col-xs-2 participant">Participant</div>
        <div class="col-xs-1 scorer">Scorer</div>
        <div class="col-xs-2 control">Control</div>
      </div>
      <?php
      //列表显示会议信息
      $i = 1;
      while ($info = $re -> fetch()) {
      ?>
      <div class="row text-center listItem">
        <div class="col-xs-1 num"><?php echo $i; ?></div>
        <div class="col-xs-2 name"><?php echo $info['conferenceName']; ?></div>
        <div class="col-xs-1 section"><?php echo $info['section']; ?></div>
        <div class="col-xs-1 location"><?php echo $info['location']; ?></div>
        <div class="col-xs-1 time"><?php echo $info['time']; ?></div>
        <div class="col-xs-1 compere"><?php echo $info['compere']; ?></div>
        <div class="col-xs-2 participant"><?php echo $info['participant']; ?></div>
        <div class="col-xs-1 scorer"><?php echo $info['scorer']; ?></div>
        <div class="col-xs-2">
          <a class="btn-sm btn-success open" href="openRecord.php?id=<?php echo $info['id']; ?>">Open</a>
          <a class="btn-sm btn-primary edit" href="editRecord.php?id=<?php echo $info['id']; ?>">Edit</a>
          <?php if($_SESSION['admin'] == 1){?>
          <a class="btn-sm btn-danger del" href="conference.php?del=1&id=<?php echo $info['id']; ?>">Del</a>
          <?php } ?>
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
