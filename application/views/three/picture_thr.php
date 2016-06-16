<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/pricture_thr.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
	<title>书画三级页面</title>
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
	<!-- 大图 -->
	<?php foreach($detail as $detail_list){  ?>
	<div class="pricture_b">
		<div >
			<label>人气量:<?php echo $detail_list['admire_num']; ?></label>
		</div>
		<div class="big_pric">
			<img src="<?php $picpath = $detail_list['pic_path']; echo base_url($picpath); ?>" width="655px">
		</div>
	</div>
	<!-- 简介 -->
	<div class="introduce">
		<div class="fra">
			<div class="intro_m">
				<a href="" class="intro_h">
					<img src="<?php $pic_path = $detail_list['u_pic_path']; echo base_url($pic_path); ?>" width="210px" height="210">
				</a>
				<h6>画师:</h6>
				<a href="<?php echo site_url('banner/to_other_personal').'/'.urlencode($detail_list['writer']); ?>" class="p_name"><?php echo $detail_list['writer']; ?></a>
			</div>
		</div>
	</div>
	<?php }  ?>
	<!-- 评论 -->
	<div class="commit">
		<div class="commit_h">
			<img src="<?php echo base_url('/source/images/third/calligraphy/commit.png'); ?>">
		</div>
		<div class="commit_m">
			<ul>
				<?php foreach($comment as $comment_list){  ?>
				<li>
					<div class="header">
						<img src="<?php $pic_path = $comment_list['u_pic_path']; echo base_url($pic_path); ?>" width="60px" height="60px">
						<div class="commit_n">
							<a href="<?php echo site_url('banner/to_other_personal').'/'.urlencode($comment_list['u_name']); ?>"><?php echo $comment_list['u_name']; ?></a>
						</div>
					</div>
					<p class="content"><?php echo $comment_list['comment']; ?></p>
					<div class="data">
						<p><?php echo $comment_list['time']; ?></p>
					</div>
				</li>
				<?php }  ?>
				<div id="last">
					<a><?php echo $links ?></a>
				</div>
			</ul>
			<form id="Antiquity_04" name="Antiquity_04" method="post" action="<?php echo site_url('comments/calli_comment_get/get_comment') ?>"/>
			<div class="recommit">
				<textarea type="text" name='comment' id="recommitphoto" placeholder="添加评论" class="reco_t"></textarea>
				<input name="object_id" type="hidden" value="<?php echo $id ?>" />
				
				<input name="user_name" type="hidden" value="<?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])){$username = $_SESSION['username']; echo $username; }?>" />
				<input name="TiJiao" type="submit" />
			</div>
			</form>
		</div>
	</div>
</div>
<!-- 尾部 -->
<div class="off3_3"></div>
</body>
</html>