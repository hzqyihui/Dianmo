<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_post extends CI_Controller{
	
	/*
	 * 这里是对后台管理系统的用户管理栏目进行展示
	 * */
	 public function user_show(){
	 	$this->load->library('pagination');
		$perpage = 3;
		
		$config['base_url'] = site_url('admin/admin_post/user_show');
		$config['total_rows'] = $this->db->count_all_results('user');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->user_show();
		$this->load->view('admin/user_manage',$data);
	 }
	 
	 /*
	 * 这里是对后台管理系统的用户管理栏目修改后提交的数据进行处理
	 * */
	 public function user_post_modify(){
	 	$id = $this->input->post('id');
	 	$name = $this->input->post('name');
		$pwd = md5($this->input->post('pwd'));
		$email = $this->input->post('email');
		
		if(empty($name) || empty($pwd) || empty($email)){
			echo "<script>alert('所有项目均必须填写');history.go(-1);</script>";
		}
		else{
			$this->load->model('admin/manage');
			$this->manage->user_update($id,$name,$pwd,$email);
		}
	 }
	 
	 
	/** 
	 * 这里是对后台管理系统的用户管理栏目进行展示
	 */
	 public function user_modify(){
	 	$id = $this->uri->segment(4);
		$name = $this->input->post('name');
		$pwd = $this->input->post('pwd');
		$email = $this->input->post('email');
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->user_show_modify($id);
		$this->load->view('admin/user_modify.html',$data);
	 }


	
	/*
	 * 这里是对后台管理系统的丝竹古韵栏目提交的数据进行处理
	 * */
	 public function sizhu_post(){
	 	//文件上传类
	 	$config['upload_path'] = './source/sizhu/music_pic/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '3072';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
		$this->load->library('upload', $config);
		
		$name = $this->input->post('music_name');
		$singer = $this->input->post('singer');
		$writer = $this->input->post('writer');
		$composer = $this->input->post('composer');
		//$arranger = $this->input->post('arranger');
		$lyric = $this->input->post('lyric');
			
		//$music_path = $this->input->post('music_path');
		if(empty($name) || empty($lyric)){
			echo "<script>alert('歌曲名字,歌词,音乐必须填写');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('song_name');
			if(!$status){
				echo "<script>alert('必须上传图片');history.go(-1);</script>";
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/sizhu/music_pic/'.$path['file_name'];
				$this->load->model('admin/manage');
				$this->manage->sizhu_insert($name,$singer,$writer,$composer,$lyric,$pic_path);
			}	
		}
		
		
		
		
	 }
	 
	 
	 /*
	 * 这里是对后台管理系统的丝竹古韵栏目修改后提交的数据进行处理
	 * */
	 public function sizhu_post_modify(){
		
	 	$id = $this->input->post('id');
		$upload_id = $this->input->post('upload_id');
	 	$name = $this->input->post('music_name');
		$singer = $this->input->post('singer');
		$writer = $this->input->post('writer');
		$composer = $this->input->post('composer');
		$arranger = $this->input->post('arranger');
		$lyric = $this->input->post('lyric');
		$pic_old_path = $this->input->post('pic_old_path');
		$music_path = $this->input->post('music_old_path');
		
		if(empty($name) || empty($lyric) || empty($singer) ||empty($writer)||empty($composer)||empty($arranger)){
			echo "<script>alert('所有项目必须填写');history.go(-1);</script>";
		}
		else{
			$this->load->model('admin/manage');
			$this->manage->sizhu_update($id,$upload_id,$name,$singer,$writer,$composer,$arranger,$lyric,$pic_old_path,$music_path);
		}
	}
		
	 
	 
	 /**
	  * 这里是对丝竹古韵的展示
	  * */
	  public function sizhu_show(){
	  	$this->load->library('pagination');
		$perpage = 5;
		
		$config['base_url'] = site_url('admin/admin_post/sizhu_show');
		$config['total_rows'] = $this->db->count_all_results('music');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->sizhu_show();
		$this->load->view('admin/sizhu_data_manage',$data);
	  }
	  
	  /*
	 * 这里是对后台管理系统的丝竹古韵栏目提交修改的id进行数据库返回信息
	 * */
	 public function sizhu_modify(){
	 	$id = $this->uri->segment(4);
	 	
		$this->load->model('admin/manage');
		$data['detail'] = $this->manage->sizhu_show_modify($id);
		$this->load->view('admin/sizhu_modify.html',$data);
		
	 }
	 
	 
	 /*
	 * 这里是对后台管理系统的诗词鉴赏栏目提交的数据进行处理
	 * */
	 public function shici_post(){
	 	$config['upload_path'] = './source/photo/poem/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '3072';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
		
	 	$poemName = $this->input->post('poemName');
		$pomeAuthor = $this->input->post('pomeAuthor');
		$pomeOrigina = $this->input->post('pomeOrigina');
		$pomeComments = $this->input->post('pomeComments');
		$pomeTranslation = $this->input->post('pomeTranslation');
		$pomeAppreciation = $this->input->post('pomeAppreciation');
		$class = $this->input->post('class');
		$config['file_name'] = '_'.time();
		
		$this->load->library('upload', $config);
		//echo $class[0];die;
		//var_dump($class);die;
		if(empty($poemName) || empty($pomeAuthor) || empty($pomeOrigina) ||empty($pomeComments) ||empty($pomeTranslation) ||empty($pomeAppreciation)){
			echo "<script>alert('所有项目均必须填写,若没有,请填写无');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('pic_path');
			if(!$status){
				//$error = array('error' => $this->upload->display_errors());print_r($error);
				echo "<script>alert('必须上传图片');history.go(-1);</script>";
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/photo/poem/'.$path['file_name'];
				$this->load->model('admin/manage');
				$this->manage->shici_insert($poemName,$class[0],$pomeAuthor,$pomeOrigina,$pomeComments,$pomeTranslation,$pomeAppreciation,$pic_path);
			}
		}
	 }
	 
	/**
	 * 这里是对后台管理系统的诗词鉴赏栏目提交的数据进行处理
	 */
	 public function shici_post_modify(){
	 	$config['upload_path'] = './source/photo/poem/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '3072';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
		
		
	 	$id = $this->input->post('id');
	 	$poemName = $this->input->post('poemName');
		$pomeAuthor = $this->input->post('pomeAuthor');
		$pomeOrigina = $this->input->post('pomeOrigina');
		$pomeComments = $this->input->post('pomeComments');
		$pomeTranslation = $this->input->post('pomeTranslation');
		$pomeAppreciation = $this->input->post('pomeAppreciation');
		$class = $this->input->post('class');
		$pic_old_path = $this->input->post('pic_old_path');
		$config['file_name'] = '_'.time();
		
		$this->load->library('upload', $config);
		
		if(empty($poemName) || empty($pomeAuthor) || empty($pomeOrigina) ||empty($pomeComments) ||empty($pomeTranslation) ||empty($pomeAppreciation)){
			echo "<script>alert('所有项目均必须填写,若没有,请填写无');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('pic_new_path');
			if(!$status){
				$this->load->model('admin/manage');
				
				$this->manage->shici_update($id,$class[0],$poemName,$pomeAuthor,$pomeOrigina,$pomeComments,$pomeTranslation,$pomeAppreciation,$pic_old_path);
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/shici/shici_pic/'.$path['file_name'];
				$this->load->model('admin/manage');
				$this->manage->shici_update($id,$class[0],$poemName,$pomeAuthor,$pomeOrigina,$pomeComments,$pomeTranslation,$pomeAppreciation,$pic_path);
			}
		}
	 }
	 
	 /*
	 * 这里是对后台管理系统的诗词鉴赏栏目提交修改的id进行数据库返回信息
	 * */
	 public function shici_modify(){
	 	$id = $this->uri->segment(4);
	 	
		$this->load->model('admin/manage');
		$data['detail'] = $this->manage->shici_show_modify($id);
		$this->load->view('admin/shici_modify.html',$data);
		
	 }
	 
	 
	 /**
	  * 这里是对古诗鉴赏的展示
	  * */
	  public function shici_show(){
	  	$this->load->library('pagination');
		$perpage = 2;
		
		$config['base_url'] = site_url('admin/admin_post/shici_show');
		$config['total_rows'] = $this->db->count_all_results('poem');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->shici_show();
		$this->load->view('admin/shici_data_manage',$data);
	  }
	 /*
	 * 这里是对后台管理系统的古人书画栏目提交的数据进行处理
	 * */
	 public function shuhua_post(){
	 	$config['upload_path'] = './source/shuhua/shuhua_pic/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['max_width'] = '2500';
		$config['max_height'] = '1280';
		$this->load->library('upload', $config);
		
	 	$name = $this->input->post('shuhua_name');
		$writer = $this->input->post('writer');
		
		if(empty($name) || empty($writer)){
			echo "<script>alert('书画名字,书画作者均必须填写');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('shuhua_path');
			if(!$status){
				echo "<script>alert('必须上传图片');history.go(-1);</script>";
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/shuhua/shuhua_pic/'.$path['file_name'];
				$this->load->model('admin/manage');
				$this->manage->shuhua_insert($name,$pic_path,$writer);
			}
		}
			
	 }
	 
	 /*
	 * 这里是对后台管理系统的古人书画栏目修改后的提交的数据进行处理
	 * */
	 public function shuhua_post_modify(){
	 	$config['upload_path'] = './source/shuhua/shuhua_pic/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		$this->load->library('upload', $config);
		
		$id = $this->input->post('id');
	 	$name = $this->input->post('shuhua_name');
		$writer = $this->input->post('writer');
		
	 	$shuhua_old_path = $this->input->post('shuhua_old_path');
		
		if(empty($name) || empty($writer)){
			echo "<script>alert('书画名字,书画作者均必须填写');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('shuhua_new_path');
			if(!$status){
				$this->load->model('admin/manage');
				$this->manage->shuhua_update($id,$name,$shuhua_old_path,$writer);
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/shuhua/shuhua_pic/'.$path['file_name'];
				unlink($shuhua_old_path);
				$this->load->model('admin/manage');
				$this->manage->shuhua_update($id,$name,$pic_path,$writer);
				
			}
		}
			
		
	 }
	 
	 
	  /*
	 * 这里是对后台管理系统的古人书画栏目提交修改的id进行数据库返回信息
	 * */
	 public function shuhua_modify(){
	 	$id = $this->uri->segment(4);
	 	
		$this->load->model('admin/manage');
		$data['detail'] = $this->manage->shuhua_show_modify($id);
		$this->load->view('admin/shuhua_modify.html',$data);
		
	 }
	 
	 
	 /**
	  * 这里是对古人书画的展示
	  * */
	  public function shuhua_show(){
	  	$this->load->library('pagination');
		$perpage = 1;
		
		$config['base_url'] = site_url('admin/admin_post/shuhua_show');
		$config['total_rows'] = $this->db->count_all_results('calligraphy');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->shuhua_show();
		$this->load->view('admin/shuhua_data_manage',$data);
	  }
	 /*
	 * 这里是对后台管理系统的陌上遗风栏目提交的数据进行处理
	 * */
	 public function artical_post(){
	 	$config['upload_path'] = './source/photo/writer/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '3072';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
		
	 	$articalName = $this->input->post('articalName');
	 	$articalAuthor = $this->input->post('articalAuthor');
		$articalOrigina = $this->input->post('articalOrigina');
		$class = $this->input->post('class');
		$config['file_name'] = '_'.time();
		
		$this->load->library('upload', $config);
		
		if(empty($articalName) || empty($articalAuthor) || empty($articalOrigina)){
			echo "<script>alert('所有项目均必须填写,若没有请填无');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('pic_path');
			if(!$status){
				//$error = array('error' => $this->upload->display_errors());print_r($error);
				echo "<script>alert('必须上传图片');history.go(-1);</script>";
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/photo/writer/'.$path['file_name'];
				$this->load->model('admin/manage');
				$this->manage->artical_insert($articalName,$class[0],$articalAuthor,$articalOrigina,$pic_path);
			}
		}
	 }
	 
	 /*
	 * 这里是对后台管理系统的陌上遗风栏目修改后的提交的数据进行处理
	 * */
	 public function artical_post_modify(){
	 	$config['upload_path'] = './source/photo/artical/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '3072';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
	 	$id = $this->input->post('id');
		$name = $this->input->post('articalName');
	 	$artical = $this->input->post('articalOrigina');
		$writer = $this->input->post('articalAuthor');
		$pic_old_path = $this->input->post('pic_old_path');
		$config['file_name'] = '_'.time();
		
		
		
		$this->load->library('upload', $config);
		
		if(empty($name) || empty($artical) || empty($writer)){
			echo "<script>alert('所有项目均必须填写,若没有请填无');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('pic_new_path');
			if(!$status){
				$this->load->model('admin/manage');
				
				$this->manage->artical_update($id,$name,$artical,$writer,$pic_old_path);
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/photo/artical/'.$path['file_name'];
				$this->load->model('admin/manage');
				$this->manage->artical_update($id,$name,$artical,$writer,$pic_path);
			}
		}
	 }
	 
	 /**
	  * 这里是对陌上遗风的修改
	  * */
	 public function artical_modify(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->artical_show_modify($id);
		$this->load->view('admin/artical_modify.html',$data);
	 }
	 
	 
	 /**
	  * 这里是对陌上遗风的展示
	  * */
	  public function artical_show(){
	  	$this->load->library('pagination');
		$perpage = 3;
		
		$config['base_url'] = site_url('admin/admin_post/calli_show');
		$config['total_rows'] = $this->db->count_all_results('artical');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->artical_show();
		$this->load->view('admin/artical_data_manage',$data);
	  }
	  
	  /**
	  * 这里是对丝竹古韵评论的展示
	  * */
	  public function comment_sizhu_show(){
	  	$this->load->library('pagination');
		$perpage = 3;
		
		$config['base_url'] = site_url('admin/admin_post/comment_sizhu_show');
		$config['total_rows'] = $this->db->count_all_results('comments_music');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->comment_sizhu_show();
		$this->load->view('admin/comments_sizhu_manage',$data);
	  }
	  
	  /**
	  * 这里是对诗词欣赏评论的展示
	  * */
	  public function comment_shici_show(){
	  	$this->load->library('pagination');
		$perpage = 1;
		
		$config['base_url'] = site_url('admin/admin_post/comment_shici_show');
		$config['total_rows'] = $this->db->count_all_results('comments_poem');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->comment_shici_show();
		$this->load->view('admin/comments_shici_manage',$data);
	  }
	  
	  /**
	  * 这里是对古人书画评论的展示
	  * */
	  public function comment_shuhua_show(){
	  	$this->load->library('pagination');
		$perpage = 1;
		
		$config['base_url'] = site_url('admin/admin_post/comment_shuhua_show');
		$config['total_rows'] = $this->db->count_all_results('comments_calli');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->comment_shuhua_show();
		$this->load->view('admin/comments_shuhua_manage',$data);
	  }
	  
	  /**
	  * 这里是对陌上遗风评论的展示
	  * */
	  public function comment_artical_show(){
	  	$this->load->library('pagination');
		$perpage = 1;
		
		$config['base_url'] = site_url('admin/admin_post/comment_artical_show');
		$config['total_rows'] = $this->db->count_all_results('comments_artical');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->comment_artical_show();
		$this->load->view('admin/comments_artical_manage',$data);
	  }
	 
	  /**
	  * 以下是管理系统修改操作
	  * */
	
	 
	 /**
	  * 这里是对用户的删除
	  * */
	 public function user_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->user_del($id);
	 }
	 
	 /**
	  * 这里是对丝竹古韵的删除
	  * */
	 public function sizhu_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$data = $this->manage->sizhu_del($id);
	 }
	 
	 /**
	  * 这里是对诗词鉴赏的删除
	  * */
	 public function shici_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->shici_del($id);
	 }
	 
	 /**
	  * 这里是对古人书画的删除
	  * */
	 public function shuhua_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->shuhua_del($id);
	 }
	 
	 /**
	  * 这里是对陌上遗风的删除
	  * */
	 public function artical_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->artical_del($id);
	 }
	 
	 
	 
	 /**
	  * 这里是对丝竹古韵评论的删除
	  * */
	 public function comment_sizhu_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->comment_sizhu_del($id);
	 }
	/**
	  * 这里是对诗词欣赏评论的删除
	  * */
	 public function comment_shici_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->comment_shici_del($id);
	 }
	 /**
	  * 这里是对古人书画评论的删除
	  * */
	 public function comment_shuhua_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->comment_shuhua_del($id);
	 }
	 /**
	  * 这里是对陌上遗风评论的删除
	  * */
	 public function comment_artical_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->comment_artical_del($id);
	 }
	 
	 
	 
	 /**
	  * 这里是对用户上传丝竹古韵的展示
	  * */
	  public function upload_sizhu_show(){
	  	$this->load->library('pagination');
		$perpage = 5;
		
		$config['base_url'] = site_url('admin/admin_post/upload_sizhu_show');
		$config['total_rows'] = $this->db->count_all_results('upload_music');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->upload_sizhu_show();
		$this->load->view('admin/upload_sizhu_data_manage',$data);
	  }
	 
	 /**
	  * 这里是对用户上传丝竹古韵的删除
	  * */
	 public function upload_sizhu_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$data = $this->manage->upload_sizhu_del($id);
	 }
	 
	 /**
	  * 这里是对用户上传丝竹古韵的审核通过
	  * */
	 public function pass_upload_sizhu(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$data = $this->manage->pass_upload_sizhu($id);
	 }
	 
	 /**
	  * 这里是对用户上传古人书画的展示
	  * */
	  public function upload_shuhua_show(){
	  	$this->load->library('pagination');
		$perpage = 5;
		
		$config['base_url'] = site_url('admin/admin_post/upload_shuhua_show');
		$config['total_rows'] = $this->db->count_all_results('upload_calligraphy');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->upload_shuhua_show();
		$this->load->view('admin/upload_shuhua_data_manage',$data);
	  }
	 
	 
	 /**
	  * 这里是对用户上传古人书画的删除
	  * */
	 public function upload_shuhua_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$data = $this->manage->upload_shuhua_del($id);
	 }
	 
	 /**
	  * 这里是作者管理
	  */
	  public function writer_show(){
	  	$this->load->library('pagination');
		$perpage = 1;
		
		$config['base_url'] = site_url('admin/admin_post/writer_show');
		$config['total_rows'] = $this->db->count_all_results('writer');
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		$this->db->limit($perpage,$offset);
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->writer_show();
		$this->load->view('admin/writer_manage',$data);
	  }
	 /**
	  * 这里是对用户上传古人书画的审核通过
	  * */
	 public function pass_upload_shuhua(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$data = $this->manage->pass_upload_shuhua($id);
	 }
	 
	 /**
	  * 这是用户查询的代码
	  */
	 public function user_reseach(){
		$name = trim($this->input->post('user_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->user_reseach($name);
		$data['name'] = $name;
		$this->load->view('admin/user_manage_search',$data);
	 }
	 
	 /**
	  * 这是音乐查询的代码
	  */
	 public function music_reseach(){
		$name = trim($this->input->post('music_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->music_reseach($name);
		$data['name'] = $name;
		$this->load->view('admin/sizhu_data_manage_search',$data);
	 }
	 
	 /**
	  * 这是诗词查询的代码
	  */
	 public function poem_reseach(){
		$name = trim($this->input->post('poem_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->poem_reseach($name);
		$data['name'] = $name;
		$this->load->view('admin/shici_data_manage_search',$data);
	 }
	 
	 
	 /**
	  * 这是书画查询的代码
	  */
	 public function calli_reseach(){
		$name = trim($this->input->post('calli_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->calli_reseach($name);
		$data['name'] = $name;
		$this->load->view('admin/shuhua_data_manage_search',$data);
	 }
	 
	 /**
	  * 这是文章查询的代码
	  */
	 public function artical_reseach(){
		$name = trim($this->input->post('artical_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->artical_reseach($name);
		$data['name'] = $name;
		$this->load->view('admin/artical_data_manage_search',$data);
	 }
	 
	 /**
	  * 这是音乐,诗词,文章评论查询的代码
	  */
	 public function comment_reseach(){
		$name = trim($this->input->post('name'));
		$class_name = trim($this->input->post('class_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->comment_reseach($name,$class_name);
		$data['name'] = $name;
		if($class_name == 'comments_artical'){
			$this->load->view('admin/comments_artical_manage_search',$data);
		}else if($class_name == 'comments_poem'){
			$this->load->view('admin/comments_shici_manage_search',$data);
		}else if($class_name == 'comments_music'){
			$this->load->view('admin/comments_sizhu_manage_search',$data);
		}
		
	 }
	 
	 /**
	  * 这是书画评论查询的代码
	  */
	 public function comment_calli_reseach(){
		$name = trim($this->input->post('name'));
		$class_name = trim($this->input->post('class_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->comment_calli_reseach($name,$class_name);
		$data['name'] = $name;
		$this->load->view('admin/comments_shuhua_manage_search',$data);
		
	 }
	 
	 /**
	  * 这是作者查询的代码
	  */
	 public function writer_reseach(){
		$name = trim($this->input->post('writer_name'));
		
	  	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->writer_reseach($name);
		$data['name'] = $name;
		$this->load->view('admin/writer_manage_search',$data);
	 }
	 
	 /**
	  * 这里是对作者的删除
	  * */
	 public function writer_del(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$this->manage->writer_del($id);
	 }
	 
	 
	 
	 /**
	  * 这里是对作者的修改
	  * */
	 public function writer_modify(){
	 	$id = $this->uri->segment(4);
	 	$this->load->model('admin/manage');
		$data['detail'] = $this->manage->writer_show_modify($id);
		$this->load->view('admin/writer_modify.html',$data);
	 }
	 
	 /**
	 * 这里是对后台管理系统的作者栏目修改后提交的数据进行处理
	 */
	 public function writer_post_modify(){
	 	$config['upload_path'] = './source/photo/poem/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '3072';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
		
		
	 	$id = $this->input->post('id');
	 	$Name = $this->input->post('Name');
		$class = $this->input->post('class');
		$pic_old_path = $this->input->post('pic_old_path');
		$config['file_name'] = '_'.time();
		
		$this->load->library('upload', $config);
		
		if(empty($Name)){
			echo "<script>alert('所有项目均必须填写,若没有,请填写无');history.go(-1);</script>";
		}
		else{
			$status = $this->upload->do_upload('pic_new_path');
			if(!$status){
				$this->load->model('admin/manage');
				
				$this->manage->writer_update($id,$class[0],$Name,$pic_old_path);
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/photo/writer/'.$path['file_name'];
				$this->load->model('admin/manage');
				$this->manage->writer_update($id,$class[0],$Name,$pic_path);
			}
		}
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
}
