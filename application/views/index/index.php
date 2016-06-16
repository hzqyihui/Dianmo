<?php if(!isset($_SESSION)){session_start();} ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>点墨 原创古风交流平台</title>
<link rel="stylesheet"  href="<?php echo base_url('/source/css/Antiquity.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('/source/css/style.css'); ?>" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/source/css/lead.css'); ?>">
<!-- The JavaScript -->
<script type="text/javascript" src="<?php echo base_url('/source/js/jquery-1.4.2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/source/js/banner.js'); ?>"></script>
<script type="text/javascript">
$(function(){
  $('#menu li').hover(function(){
    var $this = $(this);
    $('a',$this).stop(true,true).animate({'bottom':'-51px'},300);/*图片球的运动*//*b表示（整个）起点，t上升终点*/
    $('i',$this).stop(true,true).animate({'top':'-10px'}, 400);/*时间分别表示上升和回落的时间间隔*/
  },function(){
    var $this = $(this);
    $('a',$this).stop(true,true).animate({'bottom':'-90px'},300);/*回缩停止的高度*/
    $('i',$this).stop(true,true).animate({'top':'40px'},400);
  });
});
</script>
</head>

<body>
<!--置顶栏-->
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
<!--导航栏-->
<div id="Navigation">
  <div class="container">
      <ul id="menu">
    <li>
      <a href="<?php echo site_url('/banner/to_music'); ?>">
        <i class="icon_about"></i>
        <span class="title">丝竹古韵</span>
        <span class="description">千年古韵，琶音轻鸣</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('/banner/to_poem'); ?>">
        <i class="icon_work"></i>
        <span class="title">诗词赏析</span>
        <span class="description">曲水流觞，古逸飞扬</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('/banner/to_calli'); ?>">
        <i class="icon_help"></i>
        <span class="title">古人书画</span>
        <span class="description">执笔天下，墨点春秋</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('/banner/to_artical'); ?>">
        <i class="icon_search"></i>
        <span class="title">陌上遗风</span>
        <span class="description">斜阳古道，仗剑天涯</span>
      </a>
    </li>
      </ul>
  </div>
</div>
<!--首页图片栏-->

<div id="DDD">
<div id="DynamicGraph_01">
      <div id="DynamicGraph" style="left:-1800px;">
        <img src="<?php echo base_url('/source/photo/music/photo6.jpg'); ?>" alt="" width="1200px" height="400px"><img src="<?php echo base_url('/source/photo/music/photo2.jpg'); ?>" alt="" width="1200px" height="400px"><img src="<?php echo base_url('/source/photo/music/photo3.jpg'); ?>" alt="" width="1200px" height="400px"><img src="<?php echo base_url('/source/photo/music/photo4.jpg'); ?>" alt="" width="1200px" height="400px"><img src="<?php echo base_url('/source/photo/music/photo5.jpg'); ?>" alt="" width="1200px" height="400px"><img src="<?php echo base_url('/source/photo/music/photo6.jpg'); ?>" alt="" width="1200px" height="400px"><img src="<?php echo base_url('/source/photo/music/photo2.jpg'); ?>" alt="" width="1200px" height="400px">
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
</div>

<!--首页精选类容栏-->
<div id="MainBody">
  <div class="MainBody_0"></div>
  <!--丝竹古韵-->
  <div class="MainBody_01">
    <div class="MainBody_01_1">
      <div class="MainBody_01_1_logo"><a href="#"><img src="<?php echo base_url('/source/images/homepage/HomeNavigation_01.png'); ?>"></a></div>
      <div class="MainBody_01_1_more"><a href="<?php echo site_url('/banner/to_music'); ?>"><p class="Typeface_02">更多...</p></a></div>
    </div>
    <div class="MainBody_01_2">
    	<?php foreach($music_one as $music_list_one){  ?>
    	<a href="<?php $s_id = $music_list_one['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>"><img src="<?php $picpath = $music_list_one['pic_path']; echo base_url($picpath);?>"></a>
    	<?php }  ?>
    </div>
    <div class="MainBody_01_3">
    	<?php foreach($music as $music_list){  ?>
      <div class="MainBody_01_3_1">
      	<a href="<?php $s_id = $music_list['id']; echo site_url('/music/get_out/music_adv').'/'.$s_id; ?>">
         <figure class="text1">
          <img src="<?php $picpath = $music_list['pic_path']; echo base_url($picpath);?>">
          <figcaption>
          <h2><?php echo $music_list['music_name'];?></h2>
          <p><?php echo $music_list['singer'];?></p>
          
          </figcaption>
        </figure> 
        </a>
      </div>
      <?php }  ?>
    </div>
  </div>
  <div class="MainBody_00"></div>
  <!--诗词欣赏-->
  <div class="MainBody_02">
    <div class="MainBody_01_1">
      <div class="MainBody_01_1_logo"><a href="#"><img src="<?php echo base_url('/source/images/homepage/HomeNavigation_02.png'); ?>"></a></div>
      <div class="MainBody_01_1_more"><a href="<?php echo site_url('/banner/to_poem'); ?>"><p class="Typeface_02">更多...</p></a></div>
    </div>
    <?php foreach($poem as $poem_list){  ?>
    <div class="MainBody_02_1">
    	<a href="<?php $s_id = $poem_list['id']; echo site_url('/shici/get_out/shici_get').'/'.$s_id; ?>"><div class="MainBody_02_1_in">
      	<div class="MainBody_02_1_left"><p class="Typeface_03">《<?php echo $poem_list['name'];?>》</p></div>
      	<div class="MainBody_02_1_right"><p class="Typeface_03"><?php echo $poem_list['writer'];?></p></div>
    </div></a>
    </div>
    <?php }  ?>
  </div>
  <div class="MainBody_00"></div>
  <!--古人书画-->
  <div class="MainBody_01">
    <div class="MainBody_01_1">
      <div class="MainBody_01_1_logo"><a href="#"><img src="<?php echo base_url('/source/images/homepage/HomeNavigation_03.png'); ?>"></a></div>
      <div class="MainBody_01_1_more"><a href="<?php echo site_url('/banner/to_calli'); ?>"><p class="Typeface_02">更多...</p></a></div>
    </div>
    <?php foreach($calli_one as $calli_list_one){  ?>
    <div class="MainBody_01_2"><a href="<?php $s_id = $calli_list_one['id']; echo site_url('/shuhua/get_out/calli_get').'/'.$s_id; ?>"><img src="<?php $picpath = $calli_list_one['pic_path']; echo base_url($picpath);?>"></a></div>
    <?php }  ?>
    <div class="MainBody_01_3">
    	<?php foreach($calli as $calli_list){  ?>
      <div class="MainBody_01_3_1">
      	<a href="<?php $s_id = $calli_list['id']; echo site_url('/shuhua/get_out/calli_get').'/'.$s_id; ?>">
          <figure class="text3">
          <img src="<?php $picpath = $calli_list['pic_path']; echo base_url($picpath);?>">
          <figcaption>
          <h2><?php echo $calli_list['writer'];?></h2>
          </figcaption>
          <div></div>
        </figure> 
        </a>
      </div>
  		<?php }  ?>
    </div>
  </div>
  <div class="MainBody_00"></div>
  <!--陌上遗风-->
  <div class="MainBody_02">
    <div class="MainBody_01_1">
      <div class="MainBody_01_1_logo"><a href="#"><img src="<?php echo base_url('/source/images/homepage/HomeNavigation_04.png'); ?>"></a></div>
      <div class="MainBody_01_1_more"><a href="<?php echo site_url('/banner/to_artical'); ?>"><p class="Typeface_02">更多...</p></a></div>
    </div>
    
    <?php foreach($artical as $artical_list){  ?>
    <div class="MainBody_02_1">
    	<a href="<?php $s_id = $artical_list['id']; echo site_url('/artical/get_out/artical_get').'/'.$s_id; ?>">
    	<div class="MainBody_02_1_in">
      	<div class="MainBody_02_1_left"><p class="Typeface_03">《<?php echo $artical_list['name'];?>》</p></div>
      	<div class="MainBody_02_1_right"><p class="Typeface_03"><?php echo $artical_list['writer'];?></p></div>
    	</div>
    	</a>
    </div>
    <?php }  ?>
  </div>
  <div class="MainBody_0"></div>
</div>
<!--页脚-->
<div id="Footer"></div>
</body>
</html>
