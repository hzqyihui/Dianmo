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
                window.location.href='<?php echo site_url('admin/admin_post/shici_del').'/'?>'+id;
        }else{
        }
}
</script>
<body>
<br/>
<form name="user" method="post" action="<?php echo site_url('admin/admin_post/poem_reseach'); ?>">
	<div><input type="text" name="poem_name" class="seh" placeholder="输入古诗名作者类别查询">
		<input type="submit" value="搜索">
	</div>
</form><br/>
<div id="div_001">
  <div >
    <div class="div_5101_tr">编号</div>
    <div class="div_5102_tr">古诗名</div>
    <div class="div_5103_tr">类别</div>
    <div class="div_5104_tr">作者</div>
    <div class="div_5105_tr">古诗内容</div>
    <div class="div_5107_tr">注释</div>
    <div class="div_5108_tr">翻译</div>
    <div class="div_5109_tr">赏析</div>
    <div class="div_5110_tr">点赞量</div>
    <div class="div_5106_tr">操作</div>
  </div>
 	<?php foreach($detail as $value){ ?>
  <div>
  	<div class="div_5101_tr"><textarea readonly="readonly"rows='5'><?php echo $value['id']; ?></textarea></div>
  	<div class="div_5102_tr"><textarea readonly="readonly"rows='5'><?php echo $value['name']; ?></textarea></div>
  	<div class="div_5103_tr"><textarea readonly="readonly"rows='5'><?php echo $value['class']; ?></textarea></div>
  	<div class="div_5104_tr"><textarea readonly="readonly"rows='5'><?php echo $value['writer']; ?></textarea></div>
  	<div class="div_5105_tr"><textarea readonly="readonly" cols= '20' rows='5'><?php echo $value['poem']; ?></textarea></div>
  	<div class="div_5107_tr"><textarea readonly="readonly" cols= '20' rows='5'><?php echo $value['note']; ?></textarea></div>
  	<div class="div_5108_tr"><textarea readonly="readonly" cols= '20' rows='5'><?php echo $value['translation']; ?></textarea></div>
  	<div class="div_5109_tr"><textarea readonly="readonly" cols= '20' rows='5'><?php echo $value['appreciate']; ?></textarea></div>
  	<div class="div_5110_tr"><textarea readonly="readonly"cols= '5'rows='5'><?php echo $value['admire_num']; ?></textarea></div>
  	<div class="div_5106_tr"><a href="#" onclick="del_alert('<?php echo $value['id']?>')" >删除</a> <a href="<?php echo site_url('admin/admin_post/shici_modify').'/'.$value['id']?>" target="_self">修改</a></div>
  </div>
  <?php } ?>
  	<div id='last'>
			<?php echo $links ?>
	</div>
</div>

</body>
</html>