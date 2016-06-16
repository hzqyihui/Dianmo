<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是二级页面发出动作，请求数据库
 * */
class Poem_get_out extends CI_Controller{
	
	/**
	 * 这是用户个人主页点击事件进入三级页面
	 */
	public function shici_get(){
		$id = $this->uri->segment(4);
		$this->load->model('user/poem_get');
		$data['detail'] = $this->poem_get->poem_detail($id);
		$this->load->view('three/poem_three', $data);
	}
	
	
}
