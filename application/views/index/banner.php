<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content=8;url="<?php echo site_url('/banner/to_index'); ?>">
<title>ZXin Antiquity</title>
<style type="text/css">
body {
	background-color: #f5f5f5;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: "黑体";
	font-size: 16px;
	overflow-x:hidden;
    overflow-y:hidden;
}

html {
overflow-x:hidden;
overflow-y:hidden;
}

img{
	vertical-align:middle;
}

span{
	height:100%;
	display:inline-block;
	vertical-align:middle;
}

#div_001{
	width:100%;
	height:1000px;
	text-align:center;
	margin:0 auto;
	background-color:#f5f5f5;
	background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
	background-image:url('<?php echo base_url('/source/images/banner/blackground_001.jpg'); ?>');
}
.div_001_01{
	width:100%;
	height:50px;
	margin:0 auto;
}

#div_002{
	width:50%;
	height:200px;
	text-align:center;
	margin:0 auto;
}
.div_002_01{
	width:15%;
	height:200px;
	float:left;
	text-align:center;
}
.div_002_01:hover img{opacity:0.7;}
.div_002_01:hover{
	-webkit-transform:scale(1.4);
	-moz-transform:scale(1.4);
	-o-transform:scale(1.4);
}

.div_002_02{
	width:40%;
	height:200px;
	float:left;
	text-align:center;
}

#div_003{
	width:850px;
	height:400px;
	margin-left: 150px;
	float:left;

	
}

</style>
</head>

<body>
<div id="div_001">
  <div class="div_001_01"></div>
  <div id="div_002">
  <div class="div_002_02"></div>
  <div class="div_002_01"><a href="<?php echo site_url('/banner/to_index'); ?>"><img src="<?php echo base_url('/source/images/banner/HomeNavigation_01.png'); ?>" height="200px"></a></div>
  <div class="div_002_01"><a href="<?php echo site_url('/banner/to_index'); ?>"><img src="<?php echo base_url('/source/images/banner/HomeNavigation_02.png'); ?>" height="200px"></a></div>
  <div class="div_002_01"><a href="<?php echo site_url('/banner/to_index'); ?>"><img src="<?php echo base_url('/source/images/banner/HomeNavigation_03.png'); ?>" height="200px"></a></div>
  <div class="div_002_01"><a href="<?php echo site_url('/banner/to_index'); ?>"><img src="<?php echo base_url('/source/images/banner/HomeNavigation_04.png'); ?>" height="200px"></a></div>
  </div>
  <div class="div_001_01"></div>
  <div class="div_001_01"></div>
  <div id="div_003">
  	<iframe src="<?php echo base_url('/source/scroll/juanzhou.html'); ?>" frameborder="0" scrolling="no" style="width:840px;height:310px;"></iframe>
  </div>
</div>
</body>
</html>
