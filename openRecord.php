<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>list</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
  <!--其他引入项目-->
  <script src="js/jquery.printFinal.js"></script>
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  <link href="css/common.css" rel="stylesheet" type="text/css" />
</head>

<?php
include_once 'config/config.php';
include_once 'plugin/loginCheck.php';

$id = $_GET['id'];
$sql = "SELECT * FROM conference WHERE id = '$id' ";
$re = $db -> query($sql);
$info = $re -> fetch();

?>

<script language="javascript" type="text/javascript">
  $(function(){
    function print(preview){
      $("#listBox").printFinal({
        preview: preview,//打印预览
        impcss: true//引入css文件
      });

    }

    $("#printbtn").click(function(){//打印按钮
      print(false);
    });

    $("#previewbtn").click(function(){//预览按钮
      print(true);
    });

  });
</script>

<body>

<div id="listBox" >
  <div id="title">
    <ul>
      <li><span><a href="#">NO.<?php echo $info['id']."&nbsp;"; echo $info['conferenceName']; ?></a></span></li>
    </ul>
    <div class="pull-right"><button class="btn btn-xs btn-danger" id="printbtn">打印</button> </div>
    </div>
  <div id="content">
    <div class="container-fluid">
<!--      内容 start-->
        <div class="container-fluid openHeight box-margin">
          <div class="row border-bottom">
            <div class="col-xs-2"><span class="openTitle section">Section: </span>
              <?php echo $info['section']; ?>
            </div>
            <div class="col-xs-2">
              <span class="openTitle location">Location: </span><?php echo $info['location']; ?>
            </div>
            <div class="col-xs-2"><span class="openTitle compere">Compere:</span>
            <?php echo $info['compere']; ?></div>
            <div class="col-xs-2"><span class="openTitle time">Time:</span>
            <?php echo $info['time']; ?></div>
            <div class="col-xs-2"><span class=" openTitle participant">Participant:</span>
              <?php echo $info['participant']; ?></div>
            <div class="col-xs-2"><span class=" openTitle scorer">Scorer:</span>
              <?php echo $info['scorer']; ?></div>
          </div>
          <div class="row border-bottom">
            <div class="col-xs-12"><span class="openTitle summary">Summary:</span>
              <?php echo $info['summary']; ?></div>
          </div>
          <div class="row border-bottom">
            <div class="col-xs-12"><span class="details openTitle ">Conference Details:</span></div>
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


<!--      内容 end-->
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
