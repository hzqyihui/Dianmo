<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>文章二级页面</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/article_two.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('/source/js/script.js'); ?>"></script>
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
<!-- 文章精选 -->
<div class="main2_1">
	<div class="main_song">
		<div class="main_song_tle">
			<img src="<?php echo base_url('/source/images/second/artical/2.png'); ?>">
		</div>
		<div id="main_song_table">

			<h3 class="active">现代美文</h3>
			<h3>古人风韵</h3>
			
			<div style="display:block">
				<ul class="table_l">
					<!-- 现代文的遍历 -->
					<?php foreach($modern_detail as $modern_some_detail){  ?>
					<li>
						<a href="<?php $s_id = $modern_some_detail['id']; echo site_url('/artical/get_out/artical_get').'/'.$s_id; ?>" class="t_name"><?php echo $modern_some_detail['name'];?></a>
						<a href="<?php $s_id = $modern_some_detail['writer_id']; echo site_url('banner/to_artical_writer_personal').'/'.$s_id; ?>" class="t_writer"><?php echo $modern_some_detail['writer'];?></a>
					</li>
					<?php }  ?>
				</ul>
	
			</div>
			<div>
				<ul class="table_l">
					<!-- 现代文的遍历 -->
					<?php foreach($anti_detail as $anti_some_detail){  ?>
					<li>
						<a href="<?php $s_id = $anti_some_detail['id']; echo site_url('/artical/get_out/artical_get').'/'.$s_id; ?>" class="t_name"><?php echo $anti_some_detail['name'];?></a>
						<a href="<?php $s_id = $anti_some_detail['writer_id']; echo site_url('banner/to_artical_writer_personal').'/'.$s_id; ?>" class="t_writer"><?php echo $anti_some_detail['writer'];?></a>
					</li>
					<?php }  ?>
				</ul>
			</div>
			
		</div>
	</div>
	<!-- 榜单 -->
	<div class="main_rank_list">
		<ul class="list_ul">
			<li class="list_li">
				<h3>热门榜单</h3>
			</li>
			<!-- 总榜的遍历 -->
			<?php foreach($article_list as $article_list_detail){  ?>
			<li class="list_li_1">
				<div class="list_songname">
					<a href="<?php $s_id = $article_list_detail['id']; echo site_url('/artical/get_out/artical_get').'/'.$s_id; ?>"><?php echo $article_list_detail['name'];?></a>
				</div>
				<div class="list_name">
					<a href="<?php $s_id = $article_list_detail['writer_id']; echo site_url('banner/to_artical_writer_personal').'/'.$s_id; ?>"><?php echo $article_list_detail['writer'];?></a>
				</div>
			</li>
			<?php }  ?>
		</ul>
	</div>
	<!-- 热门词人 -->
	<div class="main_singer">
		<div class="main_singer_tle">
			<img src="<?php echo base_url('/source/images/second/artical/3.png'); ?>">
		</div>
		<div class="singer_head">
			<?php foreach($good_writer_one as $good_writer_one){  ?>
			<div class="sing_head_1">
				<a href="<?php $s_id = $good_writer_one['id']; echo site_url('banner/to_artical_writer_personal').'/'.$s_id; ?>" class="img">
					<img src="<?php $picpath = $good_writer_one['pic_path']; echo base_url($picpath);?>" width="175px" height="200px">
				</a>
				<p class="tit">
					<a href="" class="tit_a1"><?php $s_id = $good_writer_one['name']; echo $s_id; ?></a>
				</p>
			</div>
			<?php }  ?>
			<?php foreach($good_writer as $good_writer_six){  ?>
			<div class="sing_head_s">
				<a href="<?php $s_id = $good_writer_six['id']; echo site_url('banner/to_artical_writer_personal').'/'.$s_id; ?>" class="img2">
					<img src="<?php $picpath = $good_writer_six['pic_path']; echo base_url($picpath);?>" width="138px" height="128px">
				</a>
				<p class="s_name"><?php $s_id = $good_writer_six['name']; echo $s_id; ?></p>
			</div>
			<?php }  ?>
	</div>
</div>
	<!-- 新诗推荐 -->
	<div class="new_song">
		<div class="new_song_main">
			<?php foreach($new_artical as $new_artical_list){  ?>
			<div class="new_song_1">
				<div class="new_song_head">
					<a href="<?php $s_id = $new_artical_list['writer_id']; echo site_url('banner/to_artical_writer_personal').'/'.$s_id; ?>">
						<img src="<?php $picpath = $new_artical_list['pic_path']; echo base_url($picpath);?>" width="130px" height="130px">
					</a>
				</div>
				<div class="new_song_char">
					<ul>
						<li class="char1">
							<a href="<?php $s_id = $new_artical_list['id']; echo site_url('/artical/get_out/artical_get').'/'.$s_id; ?>"><?php echo $new_artical_list['name']; ?></a>
						</li>
						<li class="char2">
							<a href="<?php $s_id = $new_artical_list['writer_id']; echo site_url('banner/to_artical_writer_personal').'/'.$s_id; ?>"><?php echo $new_artical_list['writer']; ?></a>
						</li>
						<li class="char3">
							<p><?php echo $new_artical_list['artical']; ?></p>
						</li>
					</ul>
				</div>
			</div>
			<?php }  ?>
			
		</div>
	</div>
	</div>
	<!-- 尾部 -->
<div class="off2_1"></div>

</body>
</html>