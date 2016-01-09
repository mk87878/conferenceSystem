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
$conferenceName =isset($_POST['conferenceName']) ? $_POST['conferenceName']:'';
if(isset($_POST['submit'])){
  include_once 'plugin/uploadFile.php';
  if(isset($uploadName)){
    $conferenceDetails = $uploadName;
    $location = $_POST['location'];
    $section = $_POST['section'];
    $time = $_POST['time'];
    $compere = $_POST['compere'];
    $participant = $_POST['participant'];
    $scorer = $_POST['scorer'];
    $summary = $_POST['summary'];
    $conSql = "INSERT INTO conference  (conferenceName,location,section,time,compere,participant,scorer,summary,conferenceDetails) VALUES ($conferenceName,'$location','$section','$time','$compere','$participant','$scorer','$summary','$conferenceDetails')";
    $conRe = $db -> exec($conSql);
    if($conRe){
      echo "<script>location.href='conference.php';alert('add New Conference Record success!');</script>";
    }
  }else{
    echo "<script>location.href='addRecord.php';alert('Invalid file');</script>";
  }
}


?>


<body>

<div id="listBox" >
  <div id="title">
    <ul>
      <li><span><a href="#">add New Conference Record</a></span></li>

    </ul>
    </div>
  <div id="content">
    <div class="container-fluid">
<!--      内容 start-->
      <form class="form-horizontal" method="post" enctype="multipart/form-data" >
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Conference Name</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="conferenceName">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Section</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="section" >
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Location</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="location">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Time</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="time">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Compere</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="compere">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Participant</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="participant">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Scorer</label>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="scorer">
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Summary</label>
          <div class="col-xs-5">
            <textarea class="form-control" rows="2" name="summary"></textarea>
          </div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label">Details</label>
          <div class="col-xs-2">
            <input type="file" name="file" placeholder="only .txt file">
          </div>
          <div class="col-xs-3 text-danger">only '.txt' file</div>
        </div>
        <div class="form-group-sm form-group">
          <label for="" class="col-xs-2 control-label"></label>
          <div class="col-xs-5">
            <button type="submit" name="submit" class="btn btn-sm btn-success col-xs-12">Add</button>
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
