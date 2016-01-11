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
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  <link href="css/common.css" rel="stylesheet" type="text/css" />
</head>

<?php
include_once 'config/config.php';
include_once 'plugin/loginCheck.php';
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $conferenceName =$_POST['conferenceName'];
  $conferenceDetails = $_POST['conferenceDetails'];
  $location = $_POST['location'];
  $section = $_POST['section'];
  $time = $_POST['time'];
  $compere = $_POST['compere'];
  $participant = $_POST['participant'];
  $scorer = $_POST['scorer'];
  $summary = $_POST['summary'];
  $conSql = "UPDATE conference SET conferenceName = '$conferenceName', conferenceDetails = '$conferenceDetails', location = '$location', section = '$section', time = '$time',  compere= '$compere', participant = '$participant', scorer = '$scorer', summary = '$summary' WHERE id = '$id' ";
  $conRe = $db -> exec($conSql);
  if($conRe){
    echo "<script>location.href='conference.php';alert('update Conference Record success!');</script>";
  } else {
    echo "<script>location.href='addRecord.php';alert('update Conference Record failed!');</script>";
  }
}



?>


<body>

<div id="listBox" >
  <div id="title">
    <ul>
      <li><span><a href="#">Edit Conference Record</a></span></li>

    </ul>
    </div>
  <?php
  $id = $_GET['id'];
  $sql = "SELECT * FROM conference WHERE id = '$id' ";
  $re = $db -> query($sql);
  $show = $re -> fetch();
  ?>
  <div id="main">
    <div class="container-fluid">
<!--      内容 start-->
      <form class="form-horizontal" method="post" enctype="multipart/form-data" >
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Conference Name</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="conferenceName" value="<?php echo $show['conferenceName'] ?>">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Section</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="section"  value="<?php echo $show['section'] ?>">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Location</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="location" value="<?php echo $show['location'] ?>">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Time</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="time"  value="<?php echo $show['time'] ?>">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Compere</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="compere" value="<?php echo $show['compere'] ?>">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Participant</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="participant" value="<?php echo $show['participant'] ?>">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Scorer</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="scorer" value="<?php echo $show['scorer'] ?>">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Summary</label>
          <div class="col-xs-5">
            <textarea class="form-control" rows="1" name="summary"> <?php echo $show['summary'] ?></textarea>
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Details</label>
          <div class="col-xs-5">
            <textarea class="form-control" rows="3" name="conferenceDetails"><?php echo $show['conferenceDetails'] ?></textarea>
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label"></label>
          <div class="col-xs-5">
            <input type="hidden" value="<?php echo $show['id']; ?>" name="id">
            <button type="submit" name="submit" class="btn btn-sm btn-success col-xs-12">Edit</button>
          </div>
        </div>

      </form>


      
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
