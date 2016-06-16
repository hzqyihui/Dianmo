<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>音乐二级页面</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/music_two.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
<!-- <link rel="stylesheet"  href="../../../source/css/Antiquity.css" type="text/css" /> -->
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
<!-- 中间主内容 -->
<div class="main2_1">
	<!-- 精选好歌 -->
	<div class="main_song">
		<div class="main_song_tle">
			<img src="<?php echo base_url('/source/images/second/music/greatsong.png'); ?>">
		</div>
		<div class="main_song_table">
			<table>
				<?php foreach($good_song as $good_music_list){  ?>
				<tr>
					<td class="table_songname">
						<a href="<?php $s_id = $good_music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"><?php echo $good_music_list['music_name'];?></a>
					</td>
					<td class="table_name">
						<a href="<?php $s_id = $good_music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"><?php echo $good_music_list['singer'];?></a>
					</td>
					<td class="play">
						<a href="<?php $s_id = $good_music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"></a>
					</td>
					<td class="download">
						<a href="<?php echo site_url('/music/get_out/music_download'); ?>"></a>
					</td>
					<td class="praise">
						<a href=""></a>
					</td>
				</tr>
				<?php }  ?>
				
			</table>
		</div>
	</div>
	<!-- 榜单 -->
	<div class="main_rank_list">
		<ul class="list_ul">
			<li class="list_li">
				<h3>音乐榜单</h3>
			</li>
			<?php foreach($list as $music_list){  ?>
			<li class="list_li_1">
				<div class="list_songname">
					<a href="<?php $s_id = $music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"><?php echo $music_list['music_name'];?></a>
				</div>
				<div class="list_name">
					<a href="<?php $s_id = $music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"><?php echo $music_list['singer'];?></a>
				</div>
			</li>
			<?php }  ?>
			
		</ul>
	</div>
	<!-- 热门音乐人 -->
	<div class="main_singer">
		<div class="main_singer_tle">
			<img src="<?php echo base_url('/source/images/second/music/greatsinger.png'); ?>">
		</div>
		<div class="singer_head">
			<?php foreach($good_singer_one as $good_singer_one){  ?>
			<div class="sing_head_1">
				<a href="<?php $s_id = $good_singer_one['u_name']; echo site_url('banner/to_other_personal').'/'.$s_id; ?>">
					<img src="<?php $picpath = $good_singer_one['u_pic_path']; echo base_url($picpath);?>" width="175px" height="200px">
				</a>
			</div>
			<?php }  ?>
			<?php foreach($good_singer as $good_singer_six){  ?>
			<div class="sing_head_s">
				<a href="<?php $s_id = $good_singer_six['u_name']; echo site_url('banner/to_other_personal').'/'.$good_singer_six['u_name']; ?>">
					<img src="<?php $picpath = $good_singer_six['u_pic_path']; echo base_url($picpath);?>" width="138px" height="128px">
				</a>
			</div>
			<?php }  ?>
		</div>
	</div>
	<!-- 新歌速递 -->
	<div class="new_song">
		<div class="new_song_main">
			
			<?php foreach($new_song as $new_music_list){  ?>
			<div class="new_song_1">
				<div class="new_song_head">
					<a href="">
						<img src="<?php $picpath = $new_music_list['pic_path']; echo base_url($picpath);?>" width="130px" height="130px">
					</a>
				</div>
				<div class="new_song_char">
					<ul>
						<li class="char1">
							<a href="<?php $s_id = $new_music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"><?php echo $new_music_list['music_name']; ?></a>
						</li>
						<li class="char2">
							<a href="<?php $s_id = $new_music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"><?php echo $new_music_list['singer']; ?></a>
						</li>
						<li class="char3">
							<p><?php echo $new_music_list['lyric']; ?></p>
						</li>
					</ul>
				</div>
			</div>
			<?php }  ?>
			
			
		</div>
	</div>
	</div>
</div>
	<!-- 尾部 -->
<div class="off2_1"></div>

</body>
</html>