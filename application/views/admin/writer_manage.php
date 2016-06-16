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
                window.location.href='<?php echo site_url('admin/admin_post/writer_del').'/'?>'+id;
        }else{
        }
}
</script>
<body>
<br/>
<form name="user" method="post" action="<?php echo site_url('admin/admin_post/writer_reseach'); ?>">
	<div><input type="text" name="writer_name" class="seh" placeholder="输入作者名字或分类查询">
		<input type="submit" value="搜索">
	</div>
</form><br/>
<table width="100%" border="1" align="center" class="page_h">
  
  <tr>
    <td width="10%" align="center">编号</td>
    <td width="15%" align="center">作者</td>
    <td width="39%" align="center">头像</td>
    <td width="10%" align="center">所属分类</td>
    <td width="15%" align="center">点赞量</td>
    <td width="26%" align="center">操作</td>
    </tr>
    <?php foreach($detail as $value){ ?>
  <tr>
    <td height="200" align="center"><?php echo $value['id']?></td>
    <td height="200" align="center"><?php echo $value['name']?></td>
    <td align="center"><div class="image"><img src="<?php $pic_path=$value['pic_path'];echo base_url($pic_path)?>" width="50%"></div></td>
    <td height="200" align="center"><?php echo $value['class']?></td>
    <td height="200" align="center"><?php echo $value['all_admire_num']?></td>
    <td align="center"><a href="#" onclick="del_alert(<?php echo $value['id']?>)">删除</a> <a href="<?php echo site_url('admin/admin_post/writer_modify').'/'.$value['id']?>" target="_self">修改</a></td>
  </tr>
 <?php } ?>
  </table>
<!--<div id="div_001">
  <div >
    <div class="div_1101_tr">编号</div>
    <div class="div_1103_tr">作者</div>
    <div class="div_1104_tr">图片</div>
    <div class="div_1104_tr">点赞量</div>
    <div class="div_1106_tr">操作</div>
  </div>
 	<?php foreach($detail as $value){ ?>
  <div>
  	<div class="div_1101_tr"><?php echo $value['id']; ?></div>
  	<div class="div_1102_tr"><?php echo $value['writer']; ?></div>
  	<div class="div_1104_tr"><img src="<?php echo $value['pic_path']?>" width="100%"></div>
  	<div class="div_1103_tr"><?php echo $value['writer']; ?></div>
  	<div class="div_1106_tr"><a href="#" onclick="del_alert('<?php echo $value['id']?>')" >删除</a> <a href="<?php echo site_url('admin/admin_post/shuhua_modify').'/'.$value['id']?>" target="_self">修改</a></div>
  </div>
  <?php } ?>-->
  	<div id='last'>
			<?php echo $links ?>
	</div>
</div>

</body>
</html>