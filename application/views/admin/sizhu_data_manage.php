<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ZXin Antiquity</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('source/admin/css/Iframe.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('source/admin/utilLib/bootstrap.min.css'); ?>" type="text/css" media="screen" />
<script type="text/javascript">
		function del_alert(id){
        var temp=confirm('确认把该用户删除吗？');
        if(temp){
                window.location.href='<?php echo site_url('admin/admin_post/sizhu_del').'/'?>'+id;
        }else{
        	
        }
}
</script>
</head>

<body>
<br/>
<form name="user" method="post" action="<?php echo site_url('admin/admin_post/music_reseach'); ?>">
	<div><input type="text" name="music_name" class="seh" placeholder="输入音乐相关信息查询">
		<input type="submit" value="搜索">
	</div>
</form><br/>
<div id="div_001">
  <div >
    <div class="div_1101_tr">编号</div>
    <div class="div_1102_tr">音乐名</div>
    <div class="div_1103_tr">歌手</div>
    <div class="div_1104_tr">作词</div>
    <div class="div_1105_tr">作曲</div>
    <div class="div_1107_tr">编曲</div>
    <div class="div_1108_tr">赞量</div>
    <div class="div_1106_tr">操作</div>
  </div>
 	<?php foreach($detail as $value){ ?>
  <div>
  	<div class="div_1101_tr"><?php echo $value['id']; ?></div>
  	<div class="div_1102_tr"><?php echo $value['music_name']; ?></div>
  	<div class="div_1103_tr"><?php echo $value['singer']; ?></div>
  	<div class="div_1104_tr"><?php echo $value['writer']; ?></div>
  	<div class="div_1105_tr"><?php echo $value['composer']; ?></div>
  	<div class="div_1107_tr"><?php echo $value['arranger']; ?></div>
  	<div class="div_1108_tr"><?php echo $value['admire_num']; ?></div>
  	<div class="div_1106_tr"><a href="#" onclick=del_alert("<?php echo $value['id']; ?>")>删除</a> <a href="<?php echo site_url('admin/admin_post/sizhu_modify').'/'.$value['id']?>" target="_self">修改</a></div>
  </div>
  <?php } ?>
  	<div id='last'>
			<?php echo $links ?>
		</div >
</div>

</body>
</html>