<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="<?php echo base_url('/source/css/poem_three.css'); ?>" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
<title>Antiquity</title>
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
<div class="Topmargin_00"></div>
<!--内容-->
<section id="Section">
  <!--主要内容-->
  <article id="article3">
  	<?php foreach($artical_detail as $artical_some_detail){  ?>
  <header class="topic2"><p class="Typeface_11"><strong><?php $_SESSION['artical_name']=$artical_some_detail['name'];echo $artical_some_detail['name'];?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作者：<?php echo $artical_some_detail['writer'];?>&nbsp;&nbsp;&nbsp;</p><label>人气量:<?php echo $artical_some_detail['admire_num']; ?></label></header>
      <h2 class="Typeface_04">原文：</h2>
      <p class="Typeface_06">
      <?php echo $artical_some_detail['artical'];?>
      </p>
      <?php }  ?>
  </article>
  <!--评论-->
  <article id="article4">
    <aside class="Comment2">
      <header class="Comment2_header2"><img src="<?php echo base_url('/source/images/third/music/commit.png'); ?>"></header>
      <?php foreach($comment as $comment_list){  ?>
      <div class="Comment2_1">
        <a href="#"><figure><img src="<?php $pic_path = $comment_list['u_pic_path']; echo base_url($pic_path); ?>"><figcaption><a href="<?php echo site_url('banner/to_other_personal').'/'.urlencode($comment_list['u_name']); ?>"><?php echo $comment_list['u_name']; ?></a></figcaption></figure></a>
        
        <p class="Typeface_09"><?php echo $comment_list['comment']; ?></p>
        <p class="Typeface_10"><?php echo $comment_list['time']; ?></p>
      </div>
      <?php }  ?>
      	<div id="last">
      		<a><?php echo $links ?></a>
      	</div>
      <div class="commit_my">
		<div class="my_p"><h2>我要评论</h2></div>
		</div>
		<!-- 评论提交框 -->
		<form id="Antiquity_04" name="Antiquity_04" method="post" action="<?php echo site_url('comments/artical_comment_get/get_comment') ?>"/>
		<div class="commit_f">
			<textarea name="comment"   cols="100" rows="8" placeholder=" 我要评论"></textarea>
		</div>
		<input name="object_id" type="hidden" value="<?php echo $id ?>" />
		<input name="object" type="hidden" value="<?php echo $_SESSION['artical_name'] ?>" />
		<input name="user_name" type="hidden" value="<?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])){$username = $_SESSION['username']; echo $username; }?>" />
		<div class="commit_b">
				<input name="TiJiao" type="submit" />
	  </div>
	 </form>
    </aside>
  </article>
</section>
<!--页脚-->
<footer id="Footer"></footer>
</body>
</html>
