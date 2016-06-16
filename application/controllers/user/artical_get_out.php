<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是二级页面发出动作，请求数据库
 * */
class Artical_get_out extends CI_Controller{
	
	/** 
	 * 这里是用户个人主页点击事件，接受ID
	 */
	
	public function artical_get(){
		$id = $this->uri->segment(4);
		$this->load->model('user/artical_get');
		$data['artical_detail'] = $this->artical_get->artical_detail($id);
		$this->load->view('three/artical_three', $data);
	}
	
	
}