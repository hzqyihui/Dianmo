<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>个人主页</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/personal.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('/source/css/demo.css'); ?>" />
	<script language="javascript" type="text/javascript"> 
		function showDiv(){ 
			document.getElementById('mic_up').style.display='block';
		} 

		function closeDiv(){ 
			document.getElementById('mic_up').style.display='none'; 
		} 

		function showDiv2(){ 
			document.getElementById('pic_up').style.display='block';
		} 

		function closeDiv2(){ 
			document.getElementById('pic_up').style.display='none'; 
		} 
	</script>
</head>
<body>
<div class="m_page">
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
<!-- 中间主内容 -->
<div class="main_box">
	<!-- 左边个人信息 -->
	<div class="left_box">
		<div class="fra">
			<?php foreach($personal as $personal_info){  ?>
			<div class="intro_m">
				<a href="" class="intro_h">
					<img src="<?php $picpath = $personal_info['u_pic_path']; echo base_url($picpath);?>" width="210px" height="210">
				</a>
				<ul class="intro_box">
					<li class="intro_id">
						<h6>ID:</h6>
						<a href="#" class="p_name"><?php $user_name = $personal_info['u_name'];echo $personal_info['u_name']; ?></a>
					</li>
					<li class="intro_per">
						<h5>简介:</h5>
						<p class="introduce_n"><?php echo $personal_info['introduce']; ?></p> 
					</li>
				</ul>
			</div>
			<?php }  ?>
		</div>
	</div>
	<!-- 右边主要作品 -->
	<div class="right_box">
		<!-- 音乐盒子 -->
		<div class="music1_box">
			<div class="music_i myicon">
				<img src="<?php echo base_url('/source/images/third/personal/music.png'); ?>" width="65px" height="65px">
			</div>
			<div class="music_m r_box">
				<h3 class="my_works">他的作品</h3>
				<div class="main_music">
					<div class="header">
						<img src="<?php echo base_url('/source/images/third/personal/icon.png'); ?>" width="25px" height="25px">
						<h5>音乐</h5>
					</div>
					<div class="works">
						<table width="100%">
							<tbody>
								<tr>
									<th class="song">歌曲</th>
									<th>上传时间</th>
								</tr>
								<?php foreach($upload_music as $upload_music_list){  ?>
								<tr>
									<td class="songname">
										<cite>·</cite>
										<a href="<?php $s_id = $upload_music_list['id']; echo site_url('/user/music_get_out/music_adv').'/'.$s_id; ?>"><?php echo $upload_music_list['music_name']; ?></a>
									</td>
									<td><?php echo $upload_music_list['time']; ?></td>
								</tr>
								<?php }  ?>
								
							</tbody>
						</table>
					</div>
					<div class="page">
						<!--<a href="" style="float:left">上一页</a>
						<a href="" style="float:right">下一页</a>-->
					</div>
				</div>
			</div>
		</div>
				<!-- 书画盒子 -->
		<div class="picture_box">
			<div class="picture_i myicon">
				<img src="<?php echo base_url('/source/images/third/personal/pic.png'); ?>" width="65px" height="65px">
			</div>
			<div class="picture_m r_box">
				<div class="main_picture">
					<div class="header">
						<img src="<?php echo base_url('/source/images/third/personal/icon.png'); ?>" width="25px" height="25px">
						<h5>书画</h5>
					</div>
					<div class="pic_works">
						<?php foreach($upload_calli as $upload_calli_list){  ?>
						<div class="pic1">
							<a href="<?php $s_id = $upload_calli_list['id']; echo site_url('/user/calli_get_out/calli_get').'/'.$s_id; ?>"">
								<img src="<?php $picpath = $upload_calli_list['pic_path']; echo base_url($picpath);?>" width="240px" height="240px">
							</a>
						</div>
						<?php }  ?>
						
					</div> 
					<div class="page">
						<!--<a href="" style="float:left">上一页</a>
						<a href="" style="float:right">下一页</a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 尾部 -->
<div class="off2_1"></div>
</div>
</body>
</html>