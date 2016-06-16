<?php session_start(); error_reporting(); 
	if(isset($_SESSION['last_time'])){
	if((time()-$_SESSION['last_time'])>600){
	echo "<script>alert('检测到您登录超时！请登录，再进入此页面！');</script>";
	header('Refresh:0.01; url='.site_url('banner/to_log'));
	exit;
	}
}
else{
	echo "<script>alert('检测到您未曾登录！请登录，再进入此页面！');</script>";
	header('Refresh:0.01; url='.site_url('banner/to_log'));
}
	?>
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
		function showDiv3(){ 
			document.getElementById('p_pic_up').style.display='block';
		} 

		function closeDiv3(){ 
			document.getElementById('p_pic_up').style.display='none'; 
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
					<img src="<?php $picpath = $personal_info['u_pic_path']; $_SESSION['pic_path'] = $picpath;echo base_url($picpath);?>" width="210px" height="210">
				</a>
				<ul class="intro_box">
					<li class="intro_id">
						<h6>ID:</h6>
						<a href="#" class="p_name"><?php $user_name = $personal_info['u_name'];$_SESSION['other_user_name'] = $user_name;echo $personal_info['u_name']; ?></a>
					</li>
					<li class="intro_per">
						<h5>简介:</h5>
						<p class="introduce_n"><?php echo $personal_info['introduce']; ?></p> 
					</li>
					<li class="intro_per">
						<a href="javascript:showDiv3()" class="uploading_h">修改资料</a>
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
				<h3 class="my_works">我的作品</h3>
				<div class="main_music">
					<div class="header">
						<img src="<?php echo base_url('/source/images/third/personal/icon.png'); ?>" width="25px" height="25px">
						<h5>音乐</h5>
						<a href="javascript:showDiv()" class="uploading">上传作品</a>
					</div>
					<div class="works">
						<table width="100%">
							<tbody>
								<tr>
									<th class="song">歌曲</th>
									<th>上传时间</th>
									<th>操作</th>
								</tr>
								<?php foreach($upload_music as $upload_music_list){  ?>
								<tr>
									<td class="songname">
										<cite>·</cite>
										<a href="<?php $s_id = $upload_music_list['id']; echo site_url('/user/music_get_out/music_adv').'/'.$s_id; ?>"><?php echo $upload_music_list['music_name']; ?></a>
									</td>
									<td><?php echo $upload_music_list['time']; ?></td>
									<td>
										<a href="<?php $s_id = $upload_music_list['id']; echo site_url('/user/music_get_out/music_upload_del').'/'.$s_id; ?>">删除</a>
									</td>
								</tr>
								<?php }  ?>
								
							</tbody>
						</table>
					</div>
					<div class="page">
						<div><?php echo $music_links ?></a></div>
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
						<a href="javascript:showDiv2()" class="uploading">上传作品</a>
					</div>
					<div class="pic_works">
						<?php foreach($upload_calli as $upload_calli_list){  ?>
						<div class="pic1">
							<a href="<?php $s_id = $upload_calli_list['id']; echo site_url('/user/calli_get_out/calli_get').'/'.$s_id; ?>"">
								<img src="<?php $picpath = $upload_calli_list['pic_path']; echo base_url($picpath);?>" width="240px" height="240px">
								<a class="pichover" href="<?php $s_id = $upload_calli_list['id']; echo site_url('/user/calli_get_out/calli_upload_del').'/'.$s_id; ?>">删除</a>
							</a>
						
						</div>

						<?php }  ?>

						
					</div> 
					<div class="page">
						<div><?php echo $calli_links ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 尾部 -->
<div class="off2_1"></div>
</div>
<!-- 上传歌曲弹出框 -->
<div class="up_music" style="display:none" id="mic_up">
	<div class="up_music_m">
		<div class="CCC">
			<div class="closebtn">
				<a href="javascript:closeDiv()">
					<img src="<?php echo base_url('/source/images/third/personal/btnclose.png'); ?>" width="25px" height="25px">
				</a>
			</div>
			<form class="mic_text" method="post" action="<?php echo site_url('user/music_upload_user/music_post') ?>" enctype="multipart/form-data" />
				<div class="mic_name">
					<label>歌曲名:</label>
					<input type="text" name="music_name">
				</div>
				<div class="mic_name">
					<label>演&nbsp&nbsp&nbsp唱:</label>
					<input type="text" name="singer">
				</div>
				<div class="mic_name">
					<label>作&nbsp&nbsp&nbsp词:</label>
					<input type="text" name="writer">
				</div>
				<div class="mic_name">
					<label>作&nbsp&nbsp&nbsp曲:</label>
					<input type="text" name="composer">
				</div>
				<div class="mic_name">
					<label>编&nbsp&nbsp&nbsp曲:</label>
					<input type="text" name="arranger">
				</div>
				<div>
					<input type="file" name="song">
				</div>
				<input type="hidden" name="user_pic_path" value="<?php echo $_SESSION['pic_path']; ?>">
				<input type="hidden" name="user_name" value="<?php echo $_SESSION['other_user_name']; ?>">
				<textarea class="lyric_up" placeholder="歌词" name="lyric"></textarea>
				<input type="submit" class="up_mic_sub" value="上传">
			</form>
		</div>
	</div>
</div>
<!-- 上传图片弹出框 -->
<div class="up_pic" style="display:none" id="pic_up">
	<div class="up_pic_m">
		<div class="pCCC">
			<div class="closebtn">
				<a href="javascript:closeDiv2()">
					<img src="<?php echo base_url('/source/images/third/personal/btnclose.png'); ?>" width="25px" height="25px">
				</a>
			</div>
			<form class="mic_text" method="post" action="<?php echo site_url('user/calli_upload_user/calli_post') ?>" enctype="multipart/form-data" />
				<div>
					<input type="file" name="pic_path">
				</div>
				<input type="hidden" name="user_name" value="<?php echo $_SESSION['other_user_name']; ?>">
				<input type="submit" class="up_mic_sub" value="上传">
			</form>
		</div>
	</div>
</div>
<!-- 个人头像弹出框 -->
<div class="up_pic" style="display:none" id="p_pic_up">
	<div class="up_pic_m">
		<div class="pCCC">
			<div class="closebtn">
				<a href="javascript:closeDiv3()">
					<img src="<?php echo base_url('/source/images/third/personal/btnclose.png'); ?>" width="25px" height="25px">
				</a>
			</div>
			<form class="mic_text" method="post" action="<?php echo site_url('user/upload_pic/user_pic_post') ?>" enctype="multipart/form-data" />
				<div>
					<label>头&nbsp&nbsp&nbsp像(若不修改可为空):</label>
					<input type="file" name="pic_path">
				</div>
				<div >
					<label>简&nbsp&nbsp&nbsp介(若不修改可为空):</label>
					<input type="text" name="introduce">
				</div>
				<input type="hidden" name="user_name" value="<?php echo $_SESSION['other_user_name']; ?>">
				<input type="submit" class="up_mic_sub" value="上传">
			</form>
		</div>
	</div>
</div>
</body>
</html>