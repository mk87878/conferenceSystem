<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>list</title>
<link href="../css/left.css" rel="stylesheet" type="text/css" />
<link href="../css/common.css" rel="stylesheet" type="text/css" />
</head></head>
<body>

<div class="container">
  <div class="leftsidebar_box">
<DIV class="title">· 栏&nbsp;&nbsp;目</DIV>
    <dl>
      <dt>· 菜单管理</dt>
      <dd class="first_dd"><a href="../goods_list.php"  target="main">· 书籍</a></dd>

    </dl>
    <dl>
      <dt>· 系统设置</dt>
      <dd class="first_dd"><a href="../sys.php"  target="main">· 网站设置</a></dd>
      <dd class="first_dd"><a href="../control.php" target="main">· 管理员设置</a></dd>
    </dl>
  </div>
</div>
<script src="../js/jquery-1.11.0.min.js"></script>
<script>
$(function(){
	$(".leftsidebar_box dt").css({"background-color":"#009900"});
	$(".leftsidebar_box dd").hide();
	$(".leftsidebar_box dt").click(function(){
		$(".leftsidebar_box dt").css({"background-color":"#009900"})
		$(this).css({"background-color": "#009900"});

		$(this).parent().find('dd').slideToggle();
		$(this).parent().find('dd').addClass("menu_chioce");
	});
})
</script> 

</body>
</html>

