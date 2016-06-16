<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ZXin Antiquity</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('source/admin/css/Iframe.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('source/admin/utilLib/bootstrap.min.css'); ?>" type="text/css" media="screen" />
</head>
<script type="text/javascript">
		function del_alert(id){
        var temp=confirm('把该条记录删除吗？')
        if(temp){
                window.location.href='<?php echo site_url('admin/admin_post/artical_del').'/'?>'+id;
        }else{
        }
}
</script>
<body>
<br/>
<form name="user" method="post" action="<?php echo site_url('admin/admin_post/artical_reseach'); ?>">
	<div><input type="text" name="name" class="seh" placeholder="输入文章名字作者类别查询">
		<input type="submit" value="搜索">
	</div>
</form><br/>
<div id="div_001">
  <div >
    <div class="div_3101_tr">编号</div>
    <div class="div_3102_tr">文章名</div>
    <div class="div_3103_tr">作者</div>
    <div class="div_3104_tr">文章内容</div>
    <div class="div_3105_tr">类别</div>
    <div class="div_3107_tr">点赞量</div>
    <div class="div_3106_tr">操作</div>
  </div>
 	<?php foreach($detail as $value){ ?>
  <div>
  	<div class="div_3101_tr"><?php echo $value['id']; ?></div>
  	<div class="div_3102_tr"><?php echo str_replace($name,'<font color="#FF0000">'.$name.'</font>',$value['name']); ?></div>
  	<div class="div_3103_tr"><?php echo str_replace($name,'<font color="#FF0000">'.$name.'</font>',$value['writer']); ?></div>
  	<div class="div_3104_tr"><?php echo $value['artical']; ?>"</div>
  	<div class="div_3105_tr"><?php echo str_replace($name,'<font color="#FF0000">'.$name.'</font>',$value['class']); ?></div>
  	<div class="div_3107_tr"><?php echo $value['admire_num']; ?></div>
  	<div class="div_3106_tr"><a href="#" onclick="del_alert(<?php echo $value['id']?>)" >删除</a> <a href="<?php echo site_url('admin/admin_post/artical_modify').'/'.$value['id']?>" target="_self">修改</a></div>
  </div>
  <?php } ?>
  	<!--<div id='last'>
			<?php echo $links ?>
	</div>-->
</div>

</body>
</html>