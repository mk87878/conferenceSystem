<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>list</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="../js/jquery-1.11.3.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <!--其他引入项目-->
    <link href="../css/left.css" rel="stylesheet" type="text/css" />
    <link href="../css/common.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="container">
  <div class="leftsidebar_box">
<DIV class="title">· Control</DIV>
    <dl>
      <dt>· Conference</dt>
        <dd class="first_dd"><a href="../conference.php"  target="main" >·
                <span data-toggle="tooltip" data-placement="left" data-original-title="会议信息">Conference</span>
            </a></dd>
        <dd class="first_dd"><a href="../register.php?userId=<?php echo $_SESSION['userId'];?>"  target="_parent" data-toggle="tooltip" data-placement="top" data-original-title="修改个人资料">· My Profile</a> </dd>
    </dl>
      <?php if($_SESSION['admin'] == 1){?>
      <dl>
          <dt>· adminControl</dt>
          <dd class="first_dd"><a href="../adminUser.php"  target="main" >·
                  <span data-toggle="tooltip" data-placement="left" data-original-title="用户资料">UserInfo</span>
              </a></dd>
          <dd class="first_dd"><a href="../section.php"  target="main" >·
                  <span data-toggle="tooltip" data-placement="left" data-original-title="部门信息">Section</span>
              </a></dd>
      </dl>
      <?php } ?>
  </div>
</div>

<script>
$(function(){
	$(".leftsidebar_box dt").css({"background-color":"#229159"});
	$(".leftsidebar_box dd").hide();
	$(".leftsidebar_box dt").click(function(){
		$(".leftsidebar_box dt").css({"background-color":"#229159"})
		$(this).css({"background-color": "#229159"});

		$(this).parent().find('dd').slideToggle();
		$(this).parent().find('dd').addClass("menu_chioce");
	});
})
</script> 
<!--存放所有公共js(大杂烩)-->
<script src="../bootstrap-3.3.5-dist/js/common.js"></script>

</body>
</html>

