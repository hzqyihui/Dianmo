<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * 这里是进入导航页的控制器
 * */
 
 class Banner extends CI_Controller{
 	/**
	 * 这里是整个系统的入口,进入导航页，从此页面进入其它页面
	 */
	public function index(){
		$this->load->view('index/banner');
	}
	/**
	 * 这是从导航页跳转进入首页
	 */
	public function to_index(){
		
		$this->load->model('index/music_index');
		$this->load->model('index/calli_index');
		$this->load->model('index/poem_index');
		$this->load->model('index/artical_index');
		$data['music'] = $this->music_index->getsome();
		$data['calli'] = $this->calli_index->getsome();
		$data['poem'] = $this->poem_index->getsome();
		$data['artical'] = $this->artical_index->getsome();
		//$data = array_chunk($data, 2,true);
		$data['music_one'] = $this->music_index->get_one();
		$data['calli_one'] = $this->calli_index->get_one();
		//print_r($data);die;
		$this->load->view('index/index',$data);
	}
	
	/**
	 * 这是导航页中加载卷轴的动作
	 */
	public function to_juanzhou(){
		$this->load->view('index/juanzhou');
	}
	
	/**
	 * 这是首页中加载首页js效果的动作
	 */
	public function to_index_top(){
		$this->load->view('index/index_top');
	}
	
	/**
	 * 这是从首页跳转进入丝竹古韵
	 */
	public function to_music(){
		$this->load->model('three/music_get');
		$data['good_song'] = $this->music_get->musicget();
		$data['good_singer'] = $this->music_get->musicget_singer();
		$data['good_singer_one'] = $this->music_get->musicget_singer_one();
		$data['list'] = $this->music_get->musicget_list();
		$data['new_song'] = $this->music_get->musicget_new_song();
		$this->load->view('two/music_two',$data);
	}
	
	/**
	 * 这是从首页跳转进入诗词鉴赏
	 */
	public function to_poem(){
		$this->load->library('poem_common');
		$this->load->model('three/poem_get');
		//因为一下调用为分类别的,使用自己写的类库可以传参来实现
		$data['poem_shi'] = $this->poem_common->poem_class('诗');
		$data['poem_ci'] = $this->poem_common->poem_class('词');
		$data['poem_qu'] = $this->poem_common->poem_class('曲');
		$data['poem_fu'] = $this->poem_common->poem_class('赋');
		$data['poem_chi'] = $this->poem_common->poem_class('辞');//为便于区分,此处辞写为chi
		
		$data['new_poem'] = $this->poem_get->get_new_poem();
		
		$data['good_writer'] = $this->poem_get->poemget_writer();
		$data['good_writer_one'] = $this->poem_get->poemget_writer_one();
		
		$data['poem_list'] = $this->poem_get->poem_list();
		//print_r(array_chunk($data,3,true));die;
		$this->load->view('two/poem_two',$data);
	}
	
	
	
	
	/**
	 * 这是从首页跳转进入古人书画
	 */
	public function to_calli(){
		
		$this->load->model('three/calli_get');
		$data['modern_detail'] = $this->calli_get->calli_some_detail();
		
		$this->load->view('two/picture_two',$data);
	}
	
	/**
	 * 这是从首页跳转进入陌上遗风
	 */
	public function to_artical(){
		
		$this->load->model('three/artical_get');
		$data['modern_detail'] = $this->artical_get->artical_some_detail('现代美文');
		$data['anti_detail'] = $this->artical_get->artical_some_detail('古人风韵');
		$data['article_list'] = $this->artical_get->article_list();
		
		$data['good_writer'] = $this->artical_get->articalget_writer();
		$data['good_writer_one'] = $this->artical_get->articalget_writer_one();
		
		$data['new_artical'] = $this->artical_get->get_new_artical();
		
		//print_r($data);die;
		$this->load->view('two/article_two',$data);
	}
	
	/**
	 * 这是从任意网页进入当前用户的个人中心
	 */
	public function to_personal(){
		
		$user_name = urldecode($this->uri->segment(3));
		if($user_name == 'admin_root'){
			header('Refresh:0.1; url='.site_url('banner/to_admin'));
		}else{
			//加载自己写的分页类库
			$this->load->library('public_page');
			//加载所需模型
			$this->load->model('user/calli_get');
			$this->load->model('user/music_get');
			$this->load->model('user/user_info');
			//使用模型里的方法
			$data['upload_calli'] = $this->calli_get->calli_list($user_name);
			$data['upload_music'] = $this->music_get->music_list($user_name);
			$data['personal'] = $this->user_info->user_detail($user_name);
						
			//个人主页音乐分页
			$perpage = 100;   //每页多少
			$data['music_links'] = $this->public_page->music_page($perpage,$user_name);
			$artical_offset = $this->uri->segment(4);
			$data['upload_music'] = $this->music_get->music_page_list($user_name,$perpage,$artical_offset);
			
			//个人主页书画分页
			$data['calli_links'] = $this->public_page->calli_page($perpage,$user_name);
			$artical_offset = $this->uri->segment(5);
			$data['upload_calli'] = $this->calli_get->calli_page_list($user_name,$perpage,$artical_offset);
			
			$this->load->view('user/personal',$data);
		}
		
	}
	
	
	/**
	 * 这是从任意网页进入当前用户的个人中心
	 */
	public function to_other_personal(){
		//if(!isset($_SESSION)){session_start();}
		if(isset($_SESSION)){
			$current_name = $_SESSION['username'];
		}
		else{
			$current_name = NULL;
		}
		$user_name = urldecode($this->uri->segment(3));
		//加载自己写的分页类库
		$this->load->library('public_page');
		//加载所需模型
		$this->load->model('user/calli_get');
		$this->load->model('user/music_get');
		$this->load->model('user/user_info');
		//使用模型里的方法
		$data['upload_calli'] = $this->calli_get->calli_list($user_name);
		$data['upload_music'] = $this->music_get->music_list($user_name);
		$data['personal'] = $this->user_info->user_detail($user_name);
					
		//个人主页音乐分页
		$perpage = 100;
		$data['music_links'] = $this->public_page->music_page($perpage,$user_name);
		$artical_offset = $this->uri->segment(4);
		$data['upload_music'] = $this->music_get->music_page_list($user_name,$perpage,$artical_offset);
		
		//个人主页书画分页
		$data['calli_links'] = $this->public_page->calli_page($perpage,$user_name);
		$artical_offset = $this->uri->segment(5);
		$data['upload_calli'] = $this->calli_get->calli_page_list($user_name,$perpage,$artical_offset);
		
		if($user_name == $current_name){
			$this->load->view('user/personal',$data);
		}else{
			$this->load->view('user/other_personal',$data);
		}
		
	}
	
	/**
	 * 这是从诗词网页进入被点击作者的个人中心
	 */
	public function to_poem_writer_personal(){
		//if(!isset($_SESSION)){session_start();}
		if(isset($_SESSION)){
			$current_name = $_SESSION['username'];
		}
		else{
			$current_name = NULL;
		}
		$writer_id = urldecode($this->uri->segment(3));
		//加载自己写的分页类库
		$this->load->library('public_page');
		//加载所需模型
		$this->load->model('user/poem_get');
		$this->load->model('user/user_info');
		//使用模型里的方法
		//$data['upload_music'] = $this->poem_get->poem_writer_list($user_name);
		$data['personal'] = $this->user_info->writer_detail($writer_id);
					
		
		
		//个人主页诗词分页
		$perpage = 10;
		$artical_offset = $this->uri->segment(5);
		$data['poem_links'] = $this->public_page->poem_page($perpage,$writer_id);
		
		$data['upload_poem'] = $this->poem_get->poem_page_list($writer_id,$perpage,$artical_offset);
		$this->load->view('user/poem_writer_personal',$data);
		
		
	}


	/**
	 * 这是从文章网页进入被点击作者的个人中心
	 */
	public function to_artical_writer_personal(){
		//if(!isset($_SESSION)){session_start();}
		if(isset($_SESSION)){
			$current_name = $_SESSION['username'];
		}
		else{
			$current_name = NULL;
		}
		$writer_id = urldecode($this->uri->segment(3));
		//加载自己写的分页类库
		$this->load->library('public_page');
		//加载所需模型
		$this->load->model('user/artical_get');
		$this->load->model('user/user_info');
		//使用模型里的方法
		//$data['upload_music'] = $this->poem_get->poem_writer_list($user_name);
		$data['personal'] = $this->user_info->writer_detail($writer_id);
					
		
		
		//个人主页诗词分页
		$perpage = 10;
		$artical_offset = $this->uri->segment(5);
		$data['artical_links'] = $this->public_page->artical_page($perpage,$writer_id);
		
		$data['upload_artical'] = $this->artical_get->artical_page_list($writer_id,$perpage,$artical_offset);
		$this->load->view('user/artical_writer_personal',$data);
		
		
	}
	
	
	/**
	 * 这是从首页跳转进入登录页面
	 */
	public function to_log(){
		//$this->load->view('admin/admin.html');
		$this->load->view('user/log.html');
	}
	
	/**
	 * 这是从首页跳转进入注册页面
	 */
	public function to_register(){
		$this->load->view('user/register.html');
	}
	/**
	 * 这是获得验证码
	 */
	public function to_code(){
		$this->load->view('code/code');
	}
	
	/**
	 * 进入管理系统
	 */
	public function to_admin(){
		$this->load->view('admin/admin.html');
	}
	/*
	 * 以下代码是管理员页面进入子页面的控制器
	 */
	public function to_admin_0(){
		$this->load->view('admin/LOGO_1.html');
	}
	
	public function to_admin_2(){
		$this->load->view('admin/sizhu_publish.html');
	}
	public function to_admin_3(){
		$this->load->view('admin/shici_publish.html');
	}
	public function to_admin_4(){
		$this->load->view('admin/shuhua_publish.html');
	}
	public function to_admin_5(){
		$this->load->view('admin/artical_publish.html');
	}
	
	
	
 }
