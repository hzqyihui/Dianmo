<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Model{
	
	/**
	 * 这里是用户管理对数据库进行展示
	 * */
	 public function user_show(){
	 	$this->db->select('u_id,u_name,u_email');
		$data = $this->db->get('user')->result_array();
		return $data;
	 }
	 
	 /**
	 * 这里是用户管理对用户根据id展示出相关信息示
	 * */
	 public function user_show_modify($id){
	 	$this->db->select('u_id,u_password,u_name,u_email');
		$this->db->where('u_id',$id);
		$data = $this->db->get('user')->result_array();
		return $data;
	 }
	 
	 /**
	 * 这里是作者管理对作者根据id展示出相关信息示
	 * */
	 public function writer_show_modify($id){
	 	$this->db->select('id,name,pic_path,class');
		$this->db->where('id',$id);
		$data = $this->db->get('writer')->result_array();
		return $data;
	 }
	 
	 
	 
	 /**
	 * 这里是用户管理对数据库进行更新
	 * */
	 public function user_update($id,$name,$pwd,$email){
		$data = array(
			'u_name' => $name,
			'u_password' => $pwd,
			'u_email' => $email
		);
		$this->db->where('u_id',$id);
		if($this->db->update('user',$data)){
			echo "<script>alert('修改成功!');</script>";
			header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	 }
	 /**
	 * 这里是作者管理对数据库进行展示
	 * */
	 public function writer_show(){
	 	$this->db->select('id,name,pic_path,class,all_admire_num');
		$data = $this->db->get('writer')->result_array();
		return $data;
	 }
	 
	/**
	 * 这里是丝竹古韵对数据库进行插入操作
	 * */
	 public function sizhu_insert($name,$singer,$writer,$composer,$lyric,$pic_path){
	 	$data = array(
			'music_name' => $name,
			'singer' => $singer,
			'writer' => $writer,
			'composer' => $composer,
			//'arranger' => $arranger,
			'lyric' => $lyric,
			'pic_path' => $pic_path,
			//'music_path' => $music_path
		);
		
		if($this->db->insert('music',$data)){
			echo "<script>alert('恭喜你，录入成功!');</script>";
			header('Refresh:0.1; url='.site_url('banner/to_admin_2'));
		}
		else{
			echo "<script>alert('对不起，录入失败!');history.go(-1);</script>";
		}
	 }
	 
	 
	 /**
	 * 这里是丝竹古韵对数据库进行更新操作
	 * */
	 public function sizhu_update($id,$upload_id,$name,$singer,$writer,$composer,$arranger,$lyric,$pic_path,$music_path){
	 	$data = array(
			'music_name' => $name,
			'singer' => $singer,
			'writer' => $writer,
			'composer' => $composer,
			'arranger' => $arranger,
			'lyric' => $lyric,
			'pic_path' => $pic_path,
			'music_path' => $music_path
		);
		if($this->db->where('id',$id)->update('music',$data)){
			if($this->db->where('id',$upload_id)->update('upload_music',$data)){
				echo "<script>alert('恭喜你，更新成功!');</script>";
				header('Refresh:0.1; url='.site_url('admin/admin_post/sizhu_show'));
			}
			
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	 }
	 
	 /**
	  * 这里是丝竹古韵从数据库里调出进行后台展示修改
	  * */
	  public function sizhu_show_modify($id){
	  	$this->db->where('id', $id);
	  	$this->db->select('id,music_name,singer,writer,lyric,composer,arranger,pic_path,music_path,upload_id');
		$data = $this->db->get('music')->result_array();
		return $data;
	  }
	  
	 /**
	  * 这里是丝竹古韵从数据库里调出进行后台展示
	  * */
	  public function sizhu_show(){
	  	$this->db->select('id,music_name,singer,writer,composer,arranger,admire_num');
		$data = $this->db->get('music')->result_array();
		return $data;
	  }
	 
	 
	 
	  
	  
	 /**
	 * 这里是诗词鉴赏对数据库进行插入操作
	 * */
	 public function shici_insert($poemName,$class,$pomeAuthor,$pomeOrigina,$pomeComments,$pomeTranslation,$pomeAppreciation,$pic_path){
	 	$data = array(
			'name' => $poemName,
			'class' =>$class,
			'writer' => $pomeAuthor,
			'poem' => $pomeOrigina,
			'pic_path' => $pic_path,
			'note' => $pomeComments,
			'translation' => $pomeTranslation,
			'appreciate' => $pomeAppreciation,
			'time' => date("Y-m-d H:i:s"),
		);
		$data_2 = array(
			'name' => $pomeAuthor,
			'pic_path' => $pic_path,
			'class' =>'诗词鉴赏',
		);
		$result = $this->db->select('name')->where('name',$pomeAuthor)->get('writer')->result_array();
		if(!empty($result)){
			if($this->db->insert('poem',$data)){
				echo "<script>alert('恭喜你，录入成功!');</script>";
				header('Refresh:0.1; url='.site_url('banner/to_admin_3'));
			}
			else{
				echo "<script>alert('对不起，录入失败!');history.go(-1);</script>";
			}
		}else{
			if($this->db->insert('writer',$data_2)){
				$data_id = $this->db->select('id')->where('name',$pomeAuthor)->get('writer')->result_array();
				$data['writer_id'] = $data_id[0]['id'];
				//var_dump($data);die;
				if($this->db->insert('poem',$data)){
					echo "<script>alert('恭喜你，录入成功!');</script>";
					header('Refresh:0.1; url='.site_url('banner/to_admin_3'));
				}
				
			}
			else{
				echo "<script>alert('对不起，录入失败!');history.go(-1);</script>";
			}
		}
		
	 }
	 
	 /**
	 * 这里是诗词鉴赏对数据库进行更新操作
	 * */
	 public function shici_update($id,$class,$poemName,$pomeAuthor,$pomeOrigina,$pomeComments,$pomeTranslation,$pomeAppreciation,$pic_path){
	 	$data = array(
			'name' => $poemName,
			'class' =>$class,
			'writer' => $pomeAuthor,
			'poem' => $pomeOrigina,
			'pic_path' => $pic_path,
			'note' => $pomeComments,
			'translation' => $pomeTranslation,
			'appreciate' => $pomeAppreciation,
			'time' => date("Y-m-d H:i:s"),
		);
		$this->db->where('id',$id);
		if($this->db->update('poem',$data)){
			echo "<script>alert('恭喜你，更新成功!');</script>";
			header('Refresh:0.1; url='.site_url('admin/admin_post/shici_show'));
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	 }
	 
	 
	 /**
	  * 这里是诗词鉴赏从数据库里调出进行后台展示
	  * */
	  public function shici_show(){
	  	$this->db->select('id,name,class,writer,admire_num,poem,note,translation,appreciate');
		$data = $this->db->get('poem')->result_array();
		return $data;
	  }
	  
	  /**
	  * 这里是诗词鉴赏从数据库里调出进行修改后台展示
	  * */
	  public function shici_show_modify($id){
	  	$this->db->select('id,name,class,writer,poem,note,translation,appreciate,pic_path');
		$this->db->where('id',$id);
		$data = $this->db->get('poem')->result_array();
		return $data;
	  }
	  
	  
	 /**
	 * 这里是古人书画对数据库进行插入操作
	 * */
	 public function shuhua_insert($name,$path,$writer){
	 	$data = array(
	 		'name' => $name,
			'pic_path' => $path,
			'writer' => $writer
		);
		if($this->db->insert('calligraphy',$data)){
			header('Refresh:0.1; url='.site_url('banner/to_admin_4'));
			echo "<script>alert('恭喜你，录入成功!');</script>";
		}
		else{
			echo "<script>alert('对不起，录入失败!');history.go(-1);</script>";
		}
	 }
	 
	 /**
	 * 这里是古人书画对数据库进行更新操作
	 * */
	 public function shuhua_update($id,$name,$path,$writer){
	 	$data = array(
	 		'name' => $name,
			'pic_path' => $path,
			'writer' => $writer
		);
		$this->db->where('id',$id);
		if($this->db->update('calligraphy',$data)){
			echo "<script>alert('恭喜你，更新成功!');</script>";
			header('Refresh:0.1; url='.site_url('admin/admin_post/shuhua_show'));
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	 }
	 
	 
	 /**
	  * 这里是古人书画从数据库里调出进行后台展示
	  * */
	  public function shuhua_show(){
	  	$this->db->select('id,admire_num,writer,pic_path');
		$data = $this->db->get('calligraphy')->result_array();
		return $data;
	  }
	  
	  /**
	  * 这里是古人书画从数据库里调出进行后台展示
	  * */
	  public function shuhua_show_modify($id){
	  	$this->db->select('id,name,writer,pic_path');
		$this->db->where('id',$id);
		$data = $this->db->get('calligraphy')->result_array();
		return $data;
	  }
	  
	  
	 /**
	 * 这里是陌上遗风对数据库进行插入操作
	 * */
	 public function artical_insert($poemName,$class,$pomeAuthor,$pomeOrigina,$pic_path){
	 	$data = array(
	 		'name' => $poemName,
			'artical' => $pomeOrigina,
			'writer' => $pomeAuthor,
			'class' => $class,
			'time' => date("Y-m-d H:i:s"),
		);
		$data_2 = array(
			'name' => $pomeAuthor,
			'pic_path' => $pic_path,
			'class' =>'陌上遗风',
		);
		$result = $this->db->select('name')->where('name',$pomeAuthor)->where('class','陌上遗风')->get('writer')->result_array();
		if(!empty($result)){
			if($this->db->insert('artical',$data)){
				echo "<script>alert('恭喜你，录入成功!');</script>";
				header('Refresh:0.1; url='.site_url('banner/to_admin_5'));
			}
			else{
				echo "<script>alert('对不起，录入失败!');history.go(-1);</script>";
			}
		}else{
			if($this->db->insert('writer',$data_2)){
				$data_id = $this->db->select('id')->where('name',$pomeAuthor)->get('writer')->result_array();
				$data['writer_id'] = $data_id[0]['id'];
				//var_dump($data);die;
				if($this->db->insert('artical',$data)){
					echo "<script>alert('恭喜你，录入成功!');</script>";
					header('Refresh:0.1; url='.site_url('banner/to_admin_5'));
				}
				
			}
			else{
				echo "<script>alert('对不起，录入失败!');history.go(-1);</script>";
			}
		}
		
	 }
	 
	/**
	 * 这里是陌上遗风对数据库进行更新操作
	 * */
	 public function artical_update($id,$name,$artical,$writer){
	 	$data = array(
	 		'name' => $name,
			'artical' => $artical,
			'writer' => $writer
		);
		$this->db->where('id',$id);
		if($this->db->update('artical',$data)){
			echo "<script>alert('恭喜你，更新成功!');</script>";
			header('Refresh:0.1; url='.site_url('admin/admin_post/artical_show'));
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	 }
	 
	 /**
	  * 这里是陌上遗风从数据库里调出进行后台展示
	  * */
	  public function artical_show(){
	  	$this->db->select('id,name,writer,artical,class,admire_num');
		$data = $this->db->get('artical')->result_array();
		return $data;
	  }
	  
	  /**
	  * 这里是陌上遗风从数据库里调出进行后台展示
	  * */
	  public function artical_show_modify($id){
	  	$this->db->select('id,name,writer,artical,class,pic_path');
	  	$this->db->where('id',$id);
		$data = $this->db->get('artical')->result_array();
		return $data;
	  }
	  
	  /**
	  * 这里是从数据库里调出丝竹古韵评论进行后台展示
	  * */
	  public function comment_sizhu_show(){
	  	$this->db->select('u_id,u_name,object_id,object,comment,time');
		$data = $this->db->get('comments_music')->result_array();
		return $data;
	  }
	  
	  /**
	  * 这里是从数据库里调出诗词欣赏评论进行后台展示
	  * */
	  public function comment_shici_show(){
	  	$this->db->select('u_id,u_name,object_id,object,comment,time');
		$data = $this->db->get('comments_poem')->result_array();
		return $data;
	  }
	  
	  /**
	  * 这里是从数据库里调出古人书画评论进行后台展示
	  * */
	  public function comment_shuhua_show(){
	  	$this->db->select('u_id,u_name,object_id,comment,time');
		$data = $this->db->get('comments_calli')->result_array();
		return $data;
	  }
	  
	  /**
	  * 这里是从数据库里调出陌上遗风评论进行后台展示
	  * */
	  public function comment_artical_show(){
	  	$this->db->select('u_id,u_name,object_id,object,comment,time');
		$data = $this->db->get('comments_artical')->result_array();
		return $data;
	  }
	  
	 /**
	  * 以下是管理系统修改操作，对数据库进行操作
	  * */
	 
	 /**
	  * 这里是对丝竹古韵的数据库修改
	  * */
	 public function sizhu_modify($id){
	 	$this->db->select('music_name,singer,writer,composer,arranger,lyric,pic_path,music_path');
	 	$this->db->where('id',$id);
		$data = $this->db->get('all_music')->result_array();
		return $data;
	 }
	 
	 /**
	  * 这里是对丝竹古韵的数据库删除
	  * */
	 public function sizhu_del($id){
	 	$this->db->where('id',$id);
		$data = $this->db->select('music_path,upload_id')->get('music')->result_array();
		$this->db->where('id',$id);
		if($this->db->delete('music')){
			if($this->db->where('id',$data[0]['upload_id'])->delete('upload_music')){
				if(unlink($data[0]['music_path'])){
				echo "<script>alert('删除音乐成功!');</script>";
				}
				header('Refresh:0.1; url='.site_url("admin/admin_post/shuhua_show"));
			}
			header('Refresh:0.1; url='.site_url("admin/admin_post/sizhu_show"));
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
		
	 }
	 
	 
	 
	 /**
	  * 这里是对古诗鉴赏的数据库修改
	  * */
	 public function shici_modify($id){
	 	$this->db->select('name,class,writer,poem,note,translation,appreciate');
	 	$this->db->where('id',$id);
		$data = $this->db->get('poem')->result_array();
		return $data;
	 }
	 
	 /**
	  * 这里是对古诗鉴赏的数据库删除
	  * */
	 public function shici_del($id){
	 	$this->db->where('id',$id);
		if($this->db->delete('poem')){
			echo "<script>alert('恭喜你，删除成功!');</script>";
			header('Refresh:0.1; url='.site_url("admin/admin_post/shici_show"));
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	 }
	 /**
	  * 这里是对古人书画的数据库修改
	  * */
	 public function shuhua_modify($id){
	 	$this->db->select('pic_path,writer');
	 	$this->db->where('id',$id);
		$data = $this->db->get('calligraphy')->result_array();
		return $data;
	 }
	 
	 /**
	  * 这里是对古人书画的数据库删除
	  * */
	 public function shuhua_del($id){
	 	$this->db->where('id',$id);
	 	$data = $this->db->select('pic_path,upload_id')->get('calligraphy')->result_array();
		$this->db->where('id',$id);
		if($this->db->delete('calligraphy')){
			if($this->db->where('id',$data[0]['upload_id'])->delete('upload_calligraphy')){
				if(unlink($data[0]['pic_path'])){
				echo "<script>alert('删除书画成功!');</script>";
				}
				header('Refresh:0.1; url='.site_url("admin/admin_post/shuhua_show"));
			}
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	 }
	 
	 /**
	  * 这里是对陌上遗风的数据库修改
	  * */
	 public function artical_modify($id){
	 	$this->db->select('artical,writer');
	 	$this->db->where('id',$id);
		$data = $this->db->get('artical')->result_array();
		return $data;
	 }
	 
	 /**
	  * 这里是对作者的数据库修改进行展示
	  * */
	 public function writer_modify($id){
	 	$this->db->select('id,name,pic_path,class');
	 	$this->db->where('id',$id);
		$data = $this->db->get('writer')->result_array();
		return $data;
	 }
	 
	 /**
	  * 这里是对陌上遗风的数据库删除
	  * */
	 public function artical_del($id){
	 	$this->db->where('id',$id);
		if($this->db->delete('artical')){
			echo "<script>alert('恭喜你，删除成功!');</script>";
			header('Refresh:0.1; url='.site_url("admin/admin_post/artical_show"));
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
		
	 }
	 
	 /**
	  * 这里是对丝竹古韵评论的数据库删除
	  * */
	 public function comment_sizhu_del($id){
	 	$this->db->where('u_id',$id);
		if($this->db->delete('comments_music')){
			echo "<script>alert('删除评论成功!');</script>";
			header('Refresh:0.1; url='.site_url("admin/admin_post/comment_sizhu_show"));	
		
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	}
	 
	 /**
	  * 这里是对诗词欣赏评论的数据库删除
	  * */
	 public function comment_shici_del($id){
	 	$this->db->where('u_id',$id);
		if($this->db->delete('comments_poem')){
			echo "<script>alert('删除评论成功!');</script>";
			header('Refresh:0.1; url='.site_url("admin/admin_post/comment_shici_show"));	
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	}
	 /**
	  * 这里是对古人书画评论的数据库删除
	  * */
	 public function comment_shuahua_del($id){
	 	$this->db->where('u_id',$id);
		if($this->db->delete('comments_calli')){
			echo "<script>alert('删除评论成功!');</script>";
			header('Refresh:0.1; url='.site_url("admin/admin_post/comment_shuhua_show"));	
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	}
	 /**
	  * 这里是对陌上遗风评论的数据库删除
	  * */
	 public function comment_artical_del($id){
	 	$this->db->where('u_id',$id);
		if($this->db->delete('comments_artical')){
			echo "<script>alert('删除评论成功!');</script>";
			header('Refresh:0.1; url='.site_url("admin/admin_post/comment_artical_show"));	
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	}
	 
	  /**
	  * 这里是对用户的数据库删除
	  * */
	 public function user_del($id){
	 	$data = $this->db->select('u_name')->where('u_id',$id)->get('user')->result_array();
		if($this->db->where('u_name',$data[0]['u_name'])->delete('comments_artical')){
			if( $this->db->where('u_name',$data[0]['u_name'])->delete('comments_music')){
				if($this->db->where('u_name',$data[0]['u_name'])->delete('comments_poem')){
					if($this->db->where('u_name',$data[0]['u_name'])->delete('comments_calli')){
						if($this->db->where('user_name',$data[0]['u_name'])->delete('upload_calligraphy') && $this->db->where('user_name',$data[0]['u_name'])->delete('upload_music')){
							if($this->db->where('writer',$data[0]['u_name'])->delete('calligraphy')){
								
								if($this->db->where('user_name',$data[0]['u_name'])->delete('admire')){
									$this->db->where('u_id',$id);
									if($this->db->delete('user')){
									echo "<script>alert('删除用户成功!');</script>";
									header('Refresh:0.1; url='.site_url("admin/admin_post/user_show"));
									}else{
										echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
									}
								}
								
									
							}
						}
					}
				}
			}
		}
	}
	 
	  /**
	  * 这里是对作者的数据库删除
	  * */
	 public function writer_del($id){
	 	$data = $this->db->select('class')->where('id',$id)->get('writer')->result_array();
		if($this->db->where('id',$id)->delete('writer')){
			if($data[0]['class'] =='陌上遗风'){
				$data_2 = $this->db->select('pic_path')->where('writer_id',$id)->get('artical')->result_array();
				if($this->db->where('writer_id',$id)->delete('artical') && unlink($data_2[0]['pic_path'])){
					echo "<script>alert('删除作者成功!');</script>";
					header('Refresh:0.1; url='.site_url("admin/admin_post/writer_show"));
				}
			}else if($data[0]['class'] =='诗词鉴赏'){
				$data_2 = $this->db->select('pic_path')->where('writer_id',$id)->get('poem')->result_array();
				
				if($this->db->where('writer_id',$id)->delete('poem') && unlink($data_2[0]['pic_path'])){
					echo "<script>alert('删除作者成功!');</script>";
					header('Refresh:0.1; url='.site_url("admin/admin_post/writer_show"));
				}
			}
			
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	}
	 
	 /**
	  * 这里是用户上传丝竹古韵从数据库里调出进行后台展示
	  * */
	  public function upload_sizhu_show(){
	  	$this->db->select('id,user_name,music_name,singer,writer,composer,arranger,time');
	  	$this->db->where('bool_change',0);
		$data = $this->db->get('upload_music')->result_array();
		return $data;
	  }
	  
	 /**
	  * 这里是对丝竹古韵的数据库删除
	  * */
	 public function upload_sizhu_del($id){
	 	$this->db->where('id',$id);
		$data = $this->db->select('music_path')->get('upload_music')->result_array();
		$this->db->where('id',$id);
		if($this->db->delete('upload_music')){
			if(unlink($data[0]['music_path'])){
				echo "<script>alert('删除音乐成功!');</script>";
			}
			header('Refresh:0.1; url='.site_url("admin/admin_post/upload_sizhu_show"));
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
		
	 }
	 
	 /**
	 * 这里是通过用户上传的音乐并合入总表
	 * */
	 public function pass_upload_sizhu($id){
	 	$data = $this->db->select('music_name,singer,writer,composer,arranger,lyric,music_path')->where('id',$id)->get('upload_music')->result_array();
	 	
	 	$data_3 = $this->db->select('user_name')->where('id',$id)->get('upload_music')->result_array();
		
		$data_2 = $this->db->select('u_pic_path')->where('u_name',$data_3[0]['user_name'])->get('user')->result_array();
		$data[0]['pic_path'] = $data_2[0]['u_pic_path'];
		$data[0]['time'] = date("Y-m-d H:i:s");
		$data[0]['admire_num'] = 0;
		$data[0]['upload_id'] = $id;
		$data_4 = array(
	 		'bool_change' => 1,
		);
		if($this->db->insert('music',$data[0])){
			$this->db->where('id',$id);
				if($this->db->update('upload_music',$data_4)){
				echo "<script>alert('成功通过!更新原上传表成功!');</script>";
				header('Refresh:0.1; url='.site_url('admin/admin_post/upload_sizhu_show'));
				}
				else{
					echo "<script>alert('删除原上传表失败!');history.go(-1);</script>";
				}
		}else{
			echo "<script>alert('并入总音乐表失败!');history.go(-1);</script>";
		}
	}
	
	 
	 /**
	  * 这里是用户上传古人书画从数据库里调出进行后台展示
	  * */
	  public function upload_shuhua_show(){
	  	$this->db->select('id,user_name,pic_path,time');
		$this->db->where('bool_change',0);
		$data = $this->db->get('upload_calligraphy')->result_array();
		return $data;
	  }
	  
	 /**
	  * 这里是对丝竹古韵的数据库删除
	  * */
	 public function upload_shuhua_del($id){
	 	$this->db->where('id',$id);
		$data = $this->db->select('pic_path')->get('upload_calligraphy')->result_array();
		//affected_row();die;
		
		if($this->db->where('id',$id)->delete('upload_calligraphy')){
			if(unlink($data[0]['pic_path'])){
				echo "<script>alert('删除书画成功!');</script>";
			}
			header('Refresh:0.1; url='.site_url("admin/admin_post/upload_shuhua_show"));
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
		
	 }
	 
	 /**
	 * 这里是通过用户上传的音乐并合入总表
	 * */
	 public function pass_upload_shuhua($id){
	 	$data = $this->db->select('pic_path')->where('id',$id)->get('upload_calligraphy')->result_array();
	 	
	 	$data_3 = $this->db->select('user_name')->where('id',$id)->get('upload_calligraphy')->result_array();
		
		//$data[0]['time'] = date("Y-m-d H:i:s");
		$data[0]['admire_num'] = 0;
		$data[0]['writer'] = $data_3[0]['user_name'];
		$data[0]['upload_id'] = $id;
		$data_4 = array(
	 		'bool_change' => 1,
		);
		if($this->db->insert('calligraphy',$data[0])){
			$this->db->where('id',$id);
				if($this->db->update('upload_calligraphy',$data_4)){
				echo "<script>alert('成功通过!更新原上传表成功!');</script>";
				header('Refresh:0.1; url='.site_url('admin/admin_post/upload_shuhua_show'));
				}
				else{
					echo "<script>alert('删除原上传表失败!');history.go(-1);</script>";
				}
		}else{
			echo "<script>alert('并入总音乐表失败!');history.go(-1);</script>";
		}
	}
	 
	 /**
	  * 这是用户查询代码
	  */
	 public function user_reseach($name){
		$data = $this->db->select('u_id,u_email,u_name')->like('u_name',$name)->get('user')->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此账户!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	 /**
	  * 这是音乐查询代码
	  */
	 public function music_reseach($name){
		$this->db->select('id,music_name,singer,writer,composer,arranger,admire_num');
		$this->db->like('music_name',$name);
		$this->db->or_like('singer',$name);
		$this->db->or_like('writer',$name);
		$this->db->or_like('composer',$name);
		$this->db->or_like('arranger',$name);
		
		$data = $this->db->get('music')->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此音乐相关信息!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	 
	   /**
	  * 这是诗词查询代码
	  */
	 public function poem_reseach($name){
		$this->db->select('id,name,class,writer,admire_num,poem,note,translation,appreciate');
		$this->db->like('name',$name);
		$this->db->or_like('class',$name);
		$this->db->or_like('writer',$name);
		
		$data = $this->db->get('poem')->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此诗词相关信息!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	 /**
	  * 这是书画查询代码
	  */
	 public function calli_reseach($name){
		$this->db->select('id,admire_num,writer,pic_path');
		$this->db->like('writer',$name);
		
		$data = $this->db->get('calligraphy')->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此书画相关信息!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	 
	 /**
	  * 这是文章查询代码
	  */
	 public function artical_reseach($name){
		$this->db->select('id,name,writer,artical,class,admire_num');
		$this->db->like('writer',$name);
		$this->db->or_like('class',$name);
		$this->db->or_like('name',$name);
		
		$data = $this->db->get('artical')->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此文章相关信息!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	 /**
	  * 这是音乐,诗词,文章评论查询代码
	  */
	 public function comment_reseach($name,$table){
		$this->db->select('u_id,u_name,object_id,object,comment,time');
		$this->db->like('object',$name);
		$this->db->or_like('comment',$name);
		
		$data = $this->db->get($table)->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此对象或敏感词汇相关信息!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	 /**
	  * 这是书画评论查询代码
	  */
	 public function comment_calli_reseach($name,$table){
		$this->db->select('u_id,u_name,object_id,comment,time');
		$this->db->or_like('comment',$name);
		
		$data = $this->db->get($table)->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此对象或敏感词汇相关信息!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	 /**
	  * 这是作者查询代码
	  */
	 public function writer_reseach($name){
		$this->db->select('id,all_admire_num,name,pic_path,class');
		$this->db->like('name',$name);
		$this->db->or_like('class',$name);
		
		$data = $this->db->get('writer')->result_array();
		if(empty($data)){
			echo "<script>alert('未查到此作者相关信息!');history.go(-1);</script>";
			//header('Refresh:0.1; url='.site_url('admin/admin_post/user_show'));
		}else{
			return $data;
		}
		
	}
	 
	  /**
	 * 这里是作者栏目对数据库进行更新操作
	 * */
	 public function writer_update($id,$class,$Name,$pic_path){
	 	$data = array(
			'name' => $Name,
			'pic_path' => $pic_path,
			//'time' => date("Y-m-d H:i:s"),
		);
		$data_2 = array(
			'name' => $Name,
			//'time' => date("Y-m-d H:i:s"),
		);
		if($this->db->where('id',$id)->update('writer',$data)){
			if($class == '陌上遗风'){
				if($this->db->where('writer_id',$id)->update('artical',$data_2))
				echo "<script>alert('恭喜你，更新成功!');</script>";
				header('Refresh:0.1; url='.site_url('admin/admin_post/shici_show'));
			}else if($class == '诗词鉴赏'){
				if($this->db->where('writer_id',$id)->update('poem',$data_2))
				echo "<script>alert('恭喜你，更新成功!');</script>";
				header('Refresh:0.1; url='.site_url('admin/admin_post/shici_show'));
			}
			
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	 }
	 
	 
	 
	 
	 
	 
	 
}
