<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>书画二级页面</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/pricture_two.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('/source/js/banner_picture.js'); ?>"></script>
</head>
<body>
<!-- 登陆栏 -->
<div class="title1">
	<div class="title_fix">
		<a href="<?php echo site_url('banner/to_index'); ?>" class="logo">
			<img src="<?php echo base_url('/source/images/homepage/logo2.png'); ?>" width="75px" height="60px">
		</a>
		<div class="research">
		<select class="classfiy">
				<option>歌曲</option>
				<option>诗词</option>
				<option>书画</option>
				<option>文章</option>
			</select>
			<input type="text" id="research" class="seh" placeholder="歌曲/诗词/书画/文章">
			<a href="" class="seh1">搜索</a>
		</div>
		<div class="login_box">
	    <?php if(!(isset($_SESSION['username']) && !empty($_SESSION['username'])) || (time()-$_SESSION['last_time'] > 600)) {?>
	    	<div class="login" id="no-login" >
	        <a href="<?php echo site_url('/banner/to_log'); ?>" target="_blank">登录</a>
	        <a href="<?php echo site_url('/banner/to_register'); ?>" target="_blank">注册</a>
	     </div>
	      <?php }else{ ?>
	      <div class="login1" id="login" style="block">
	        <a href="<?php echo site_url('banner/to_personal').'/'.urlencode($_SESSION['username']); ?>"><?php echo $_SESSION['username']; ?></a>
	        <p class="login_p">欢迎你！</p>
	     </div>
	      <?php } ?>
	    </div>
	</div> 
</div>
<!-- 主内容 -->
<div class="main_pricture">
	<!-- 滑动推送 -->
	<div class="recommend" >
		<div class="re_photo" id="re_photo">
			<div class="re_photo_img" id="re_photo_img" style="left:-900px;"> 
				<img src="<?php echo base_url('/source/photo/music/photo6.jpg'); ?>" alt="" width="900px" height="300px"><img src="<?php echo base_url('/source/photo/music/photo2.jpg'); ?>" alt="" width="900px" height="300px"><img src="<?php echo base_url('/source/photo/music/photo4.jpg'); ?>" alt=""width="900px" height="300px"><img src="<?php echo base_url('/source/photo/music/photo7.jpg'); ?>" alt="" width="900px" height="300px"><img src="<?php echo base_url('/source/photo/music/photo9.jpg'); ?>" alt="" width="900px" height="300px"><img src="<?php echo base_url('/source/photo/music/photo6.jpg'); ?>" alt="" width="900px" height="300px"><img src="<?php echo base_url('/source/photo/music/photo2.jpg'); ?>" alt="" width="900px" height="300px">
			</div>
			<div id="buttons">
        		<span index="1" class="on"></span>
        		<span index="2"></span>
       			<span index="3"></span>
        		<span index="4"></span>
        		<span index="5"></span>
      		</div>

    		<a id="prev" class="arrow">&lt;</a>
    		<a id="next"class="arrow">&gt;</a>

		</div>
		<div class="re_infor">
			<ul>
				<h2>古人书画</h2>
				<li>捉袖提笔，文思泉涌</li>
				<li>静观古人笔下风韵</li>
				<li>跨越千百年</li>
				<li>墨香犹存~</li>
			</ul>
		</div>
	
	</div>
	<!-- 推荐主内容 -->
	<div class="main_reco">
		<!-- 为你推荐 -->
		<div class="reco_inn">
			<h2>为你推荐</h2>
			<div class="types">
				<a href="#">现代古风画</a>
			</div>
		</div>
		<!-- 推荐图片 -->
		<div id="all_photo">
			<?php foreach($modern_detail as $modern_detail_list){  ?>
			<div class="photo1">
				<a href="<?php $s_id = $modern_detail_list['id']; echo site_url('/shuhua/get_out/calli_get').'/'.$s_id; ?>">
					<img src="<?php $picpath = $modern_detail_list['pic_path']; echo base_url($picpath); ?>" width="294px" height="294px">
				</a>
			</div>
			<?php }  ?>
		</div> 
	</div>
</div>
<!-- 尾部 -->
<div class="off2_3"></div>
</body>
</html>