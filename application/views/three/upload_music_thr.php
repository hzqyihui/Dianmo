<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>音乐三级页面</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/music_thr.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('/source/css/demo.css'); ?>" />

<!--必要样式-->
<link rel="stylesheet" href="<?php echo base_url('/source/css/audioplayer.css'); ?>" />
<script type="text/javascript">
/*
	VIEWPORT BUG FIX
	iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
*/
(function(doc){
	var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];
	function fix(){
		meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];
		doc.removeEventListener(type,fix,true);
	}if((meta=meta[meta.length-1])&&addEvent in doc){
		fix();
		scales=[.25,1.6];
		doc[addEvent](type,fix,true);
	}
}(document));
</script>
<style type="text/css">
#last{
	text-align: center;
}
#last a{
	display:inline-block;
} 
</style>
</head>
<body>
<!-- 登陆栏 -->
<div class="title1">
	<div class="title_fix">
		<a href="<?php echo site_url('banner/to_index'); ?>" class="logo">
			<img src="<?php echo base_url('/source/images/homepage/logo2.png'); ?>" width="75px" height="60px">
		</a>
		<div class="research">
			<!-- <nav>
				<ul class="classfiy">
					<li><a href="">歌曲</a>
						<ul>
							<li><a href="">诗词</a></li>
							<li><a href="">书画</a></li>
							<li><a href="">文章</a></li>
						</ul>
					</li>
				</ul>
			</nav> -->
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
<div class="main_song3">
	<div class="songframe">
		<?php foreach($detail as $music_detail){  ?>
		<div class="frame_m">
			<div class="frame_l">
				<div class="frame_l_tle">
					<h1><?php $_SESSION['music_name'] = $music_detail['music_name'];echo $music_detail['music_name']; ?></h1>
				</div>
				<div class="l_main">
				<div class="l_photo">
					<img src="<?php $picpath = $music_detail['pic_path']; echo base_url($picpath); ?>" width="195px" height="200px">
				</div>
					<ul>
						<li>
							<em>演唱:</em>
							<p><?php echo $music_detail['singer']; ?></p>
						</li>
						<li>
							<em>作词:</em>
							<p><?php echo $music_detail['writer']; ?></p>
						</li>
						<li>
							<em>作曲:</em>
							<p><?php echo $music_detail['composer']; ?></p>
						</li>
						<li>
							<em>编曲:</em>
							<p><?php echo $music_detail['arranger']; ?></p>
						</li>
						<!--<li>
							<em>下载设置:</em>
							<a href="<?php $s_id = $music_detail['id']; echo site_url('/music/get_out/music_download').'/'.$s_id; ?>"><p>免费下载</p></a>
						</li>-->
						<li>
							<!--<em>点赞:</em>
							<a href="">
								<p class="praise_mic_thr"></p>
							</a>-->
						</li>
					</ul>
				</div>
				<div class="player">
					<div id="wrapper">

					<audio preload="auto" controls>
					<source src="<?php $music_path = $music_detail['music_path']; echo base_url($music_path); ?>">
					<source src="<?php $music_path = $music_detail['music_path']; echo base_url($music_path); ?>">
					<source src="<?php $music_path = $music_detail['music_path']; echo base_url($music_path); ?>">
					</audio>

					</div>

					<script type="text/javascript" src="<?php echo base_url('/source/js/jquery.js'); ?>"></script>
					<script type="text/javascript" src="<?php echo base_url('/source/js/audioplayer.js'); ?>"></script>
					<script type="text/javascript">
					$(function(){
						$( 'audio' ).audioPlayer();
					});
					</script>


					

				</div>
			</div>
			<div class="frame_r">
				<div class="lyric">
					<?php echo $music_detail['lyric']; ?>
				</div>
			</div>
		</div>
		<?php }  ?>
	</div>
	<!-- 评论专区 -->
	<!--<div class="commit">
		<div class="commit_h">
			<img src="<?php echo base_url('/source/images/third/music/commit.png'); ?>">
		</div>
		<div class="commit_m">
			<ul>
				<?php foreach($comment as $comment_list){  ?>
				<li>
					<div class="header">
						<img src="<?php $pic_path = $comment_list['u_pic_path']; echo base_url($pic_path); ?>" width="60px" height="60px">
						<div class="commit_n">
							<a href="<?php echo site_url('banner/to_other_personal').'/'.$comment_list['u_name']; ?>"><?php echo $comment_list['u_name']; ?></a>
						</div>
					</div>
					<p class="content"><?php echo $comment_list['comment']; ?></p>
					<div class="data">
						<p><?php echo $comment_list['time']; ?></p>
					</div>
				</li>
				<?php }  ?>
			</ul>	
			<div id="last">
				<a><?php echo $links ?></a>
			</div>
			<div class="commit_my">
				<div class="my_p"><h2>我要评论</h2></div>
			</div>
			<!-- 评论提交框 -->
			<!--<form id="Antiquity_04" name="Antiquity_04" method="post" action="<?php echo site_url('comments/music_comment_get/get_comment') ?>"/>
			<div class="commit_f">
				<textarea type="text" id="commit" name='comment' class="commitinput" placeholder="添加评论"></textarea>
				<input name="object_id" type="hidden" value="<?php echo $id ?>" />
				<input name="object" type="hidden" value="<?php echo $_SESSION['music_name'] ?>" />
				<input name="user_name" type="hidden" value="<?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])){$username = $_SESSION['username']; echo $username; }?>" />
			</div>
			<div class="commit_b">
				<input name="TiJiao" type="submit" />
			</div>
			</form>
		</div>
		
	</div>-->-->
</div>
<!-- 尾部 -->
<div class="off3_1"></div>
</body>
</html>