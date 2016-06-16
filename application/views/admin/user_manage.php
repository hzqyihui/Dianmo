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
                window.location.href='<?php echo site_url('admin/admin_post/user_del').'/'?>'+id;
        }else{
        	
        }
}
</script>
</head>

<body>
<br/>
<form name="user" method="post" action="<?php echo site_url('admin/admin_post/user_reseach'); ?>">
	<div><input type="text" name="user_name" class="seh" placeholder="输入用户名查询用户">
		<input type="submit" value="搜索">
	</div>
</form><br/><br/>
<div id="div_001">
  <div>
    <div class="div_1101_tr">编号</div>
    <div class="div_1102_tr">用户名</div>
    <div class="div_1103_tr">邮箱</div>
    <div class="div_1106_tr">操作</div>
  </div>
  <?php foreach($detail as $value){ ?>
  <div class="next">
  	<div class="div_1101_tr"><?php echo $value['u_id']; ?></div>
  	<div class="div_1102_tr"><?php echo $value['u_name']; ?></div>
  	<div class="div_1103_tr"><?php echo $value['u_email']; ?></div>
  	<div class="div_1106_tr"><a href="#" onclick="del_alert('<?php echo $value['u_id']; ?>')">删除</a> <a href="<?php echo site_url('admin/admin_post/user_modify').'/'.$value['u_id']?>" target="_self">修改</a></div>
  </div>
  <?php } ?>
  	<div id='last'>
			<?php echo $links ?>
		</div >
</div>
</body>
</html>
