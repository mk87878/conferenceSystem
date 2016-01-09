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
  <!--  打印预览-->
  <script language="javascript" src="js/jquery.PrintArea.js"></script>
  <!--  打印预览-->
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
$sql = "SELECT * FROM conference";
$re = $db -> query($sql);
$url = $_SERVER['PHP_SELF'];

?>

<body>

<div id="listBox" >
  <div id="title">
    <ul>
      <li><span><a href="#">Conference Record</a></span></li>
    
    </ul>
    <a style="color: red" class="glyphicon-plus pull-right newRecord" href="addRecord.php" >add New Conference Record</a>
    </div>
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
          <a class="btn-sm btn-success edit" data-toggle="modal" data-target="#Modal-<?php echo $i; ?>">Open</a>
          <a class="btn-sm btn-primary edit" href="#">Edit</a>
          <a class="btn-sm btn-danger del" href="#">Del</a>
        </div>
      </div>
        <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" id="Modal-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">NO.<?php echo $i."&nbsp;"; echo $info['conferenceName']; ?></h4>
              </div>
              <div class="modal-body">
<!--                modal content-->
                <div class="container-fluid openHeight">
                  <div class="row">
                    <div class="col-xs-1 text-right openTitle section">Section:</div>
                    <div class="col-xs-3"><?php echo $info['section']; ?></div>
                    <div class="col-xs-offset-1 col-xs-1 text-right openTitle location">Location:</div>
                    <div class="col-xs-3"><?php echo $info['location']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1 text-right openTitle compere">Compere:</div>
                    <div class="col-xs-3"><?php echo $info['compere']; ?></div>
                    <div class="col-xs-offset-1 col-xs-1 text-right openTitle time">Time:</div>
                    <div class="col-xs-3"><?php echo $info['time']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1 text-right openTitle participant">Participant:</div>
                    <div class="col-xs-3"><?php echo $info['participant']; ?></div>
                    <div class="col-xs-offset-1 col-xs-1 text-right openTitle scorer">Scorer:</div>
                    <div class="col-xs-3"><?php echo $info['scorer']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1 openTitle summary">Summary:</div>
                    <div class="col-xs-10"><?php echo $info['summary']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 openTitle">Conference Details:</div>
                    <div class="col-xs-12">
                      <?php
                      $details = "upload/".$info['conferenceDetails'];
                      $myFile = fopen($details, "r") or die("Unable to open file!");

                      echo fread($myFile,filesize($details));
                      //                    fclose($myFile);
                      ?>
                    </div>
                  </div>
                </div>
<!--                modal content-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="print">打印</button>
              </div>
            </div>
          </div>
        </div>
        <script language="javascript">
          //打印预览
          $(document).ready(function(){
            $("#print").click(function(){
              $("#Modal-<?php echo $i; ?>").printArea({
                mode:'popup'
            });
            });
          });
        </script>
        <!-- Large modal -->
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
