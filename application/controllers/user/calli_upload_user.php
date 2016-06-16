<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Calli_upload_user extends CI_Controller{
	
	public function calli_post(){
		//文件上传类
	 	$config['upload_path'] = './source/photo/calligraphy/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
		$user_name = $this->input->post('user_name');
		
		$config['file_name'] = rand(1, time()).'_'.time();
		
		$this->load->library('upload', $config);
		
		$status = $this->upload->do_upload('pic_path');
			if(!$status){
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);die;
				echo "<script>alert($error);history.go(-1);</script>";
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/photo/calligraphy/'.$path['file_name'];
				$this->load->model('user/calli_upload');
				$this->calli_upload->calli_insert($user_name,$pic_path);
			}
	}
	
	
	
}




