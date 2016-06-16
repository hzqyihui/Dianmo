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
                window.location.href='<?php echo site_url('admin/admin_post/upload_sizhu_del').'/'?>'+id;
        }else{
        	
        }
        }
        
        function pass_alert(id){
        var temp=confirm('确认通过该用户上传的音乐吗？');
        if(temp){
                window.location.href='<?php echo site_url('admin/admin_post/pass_upload_sizhu').'/'?>'+id;
        }else{
        	
        	}
        }

</script>
</head>

<body>
<br/>
<div id="div_001">
  <div >
    <div class="div_6101_tr">编号</div>
    <div class="div_6102_tr">用户</div>
    <div class="div_6103_tr">音乐名</div>
    <div class="div_6104_tr">歌手</div>
    <div class="div_6105_tr">作词</div>
    <div class="div_6106_tr">作曲</div>
    <div class="div_6107_tr">编曲</div>
    <div class="div_6108_tr">上传时间</div>
    <div class="div_6111_tr">操作</div>
  </div>
 	<?php foreach($detail as $value){ ?>
  <div>
  	<div class="div_6101_tr"><?php echo $value['id']; ?></div>
  	<div class="div_6102_tr"><?php echo $value['user_name']; ?></div>
  	<div class="div_6103_tr"><?php echo $value['music_name']; ?></div>
  	<div class="div_6104_tr"><?php echo $value['singer']; ?></div>
  	<div class="div_6105_tr"><?php echo $value['writer']; ?></div>
  	<div class="div_6106_tr"><?php echo $value['composer']; ?></div>
  	<div class="div_6107_tr"><?php echo $value['arranger']; ?></div>
  	<div class="div_6108_tr"><?php echo $value['time']; ?></div>
  	<div class="div_6109_tr"><a href="#" onclick="del_alert('<?php echo $value['id']; ?>')">不通过</a></div>
  	<div class="div_6110_tr"><a href="#" onclick="pass_alert('<?php echo $value['id']; ?>')">通过</a></div>
  </div>
  <?php } ?>
  	<div id='last'>
			<?php echo $links ?>
		</div >
</div>

</body>
</html>