<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是二级页面发出动作，请求数据库
 * */
class Upload_pic extends CI_Controller{
	
	public function user_pic_post(){
		//文件上传类
	 	$config['upload_path'] = './source/photo/personal/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['max_width'] = '1920';
		$config['max_height'] = '1080';
		
		$user_name = $this->input->post('user_name');
		$introduce = $this->input->post('introduce');
		
		$config['file_name'] = $user_name.'_'.time();
		
		$this->load->library('upload', $config);
		
		if(empty($introduce)){
			$status = $this->upload->do_upload('pic_path');
			if(!$status){
				echo "<script>alert('必须上传图片');history.go(-1);</script>";
			}
			else{
				$path = $this->upload->data();
				$pic_path = 'source/photo/personal/'.$path['file_name'];
				$this->load->model('user/user_pic_upload');
				$this->user_pic_upload->user_pic_insert($user_name,$pic_path);
			}
		}else{
			$status = $this->upload->do_upload('pic_path');
			if(!$status){
				$this->load->model('user/user_pic_upload');
				$this->user_pic_upload->user_introduce_insert($user_name,$introduce);
			}else{
				$path = $this->upload->data();
				$pic_path = 'source/photo/personal/'.$path['file_name'];
				$this->load->model('user/user_pic_upload');
				$this->user_pic_upload->user_all_insert($user_name,$pic_path,$introduce);
			}
		}
		
	}
}