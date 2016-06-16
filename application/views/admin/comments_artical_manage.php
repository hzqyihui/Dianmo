<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
                window.location.href='<?php echo site_url('admin/admin_post/comment_artical_del').'/'?>'+id;
        }else{
        	
        }
}
</script>
<body>
<br/>
<form name="user" method="post" action="<?php echo site_url('admin/admin_post/comment_reseach'); ?>">
	<div>
		<input type="text" name="name" class="seh" placeholder="输入评论对象或者敏感词汇查询">
		<input type="hidden" name="class_name" value="comments_artical">
		<input type="submit" value="搜索">
	</div>
</form><br/>
<div id="div_001">
  <div >
    <div class="div_4101_tr">编号</div>
    <div class="div_4102_tr">用户名</div>
    <div class="div_4110_tr">评论对象id</div>
    <div class="div_4103_tr">评论对象</div>
    <div class="div_4104_tr">评论</div>
    <div class="div_4105_tr">评论时间</div>
    <div class="div_4106_tr">操作</div>
  </div>
 	<?php foreach($detail as $value){ ?>
  <div>
  	<div class="div_4101_tr"><textarea readonly="readonly"><?php echo $value['u_id']; ?></textarea></div>
  	<div class="div_4102_tr"><textarea readonly="readonly"><?php echo $value['u_name']; ?></textarea></div>
  	<div class="div_4110_tr"><textarea readonly="readonly"><?php echo $value['object_id']; ?></textarea></div>
  	<div class="div_4103_tr"><textarea readonly="readonly" cols= '15'><?php echo $value['object']; ?></textarea></div>
  	<div class="div_4104_tr"><textarea readonly="readonly" cols= '56'><?php echo $value['comment']; ?></textarea></div>
  	<div class="div_4105_tr"><textarea readonly="readonly" cols= '19'><?php echo $value['time']; ?></textarea></div>
  	<div class="div_4106_tr"><a href="#" onclick="del_alert('<?php echo $value['u_id']?>')" >删除</a> </div>
  </div>
  <?php } ?>
  	<div id='last'>
			<?php echo $links ?>
	</div>
</div>

</body>
</html>
