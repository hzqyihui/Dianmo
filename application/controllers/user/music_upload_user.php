<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Music_upload_user extends CI_Controller{
	
	public function music_post(){
		//文件上传类
	 	$config['upload_path'] = './source/mp3/';
		$config['allowed_types'] = 'mp3|wav|ogg';
		$config['max_size'] = '20480';
		
		$music_name = $this->input->post('music_name');
		$singer = $this->input->post('singer');
		$writer = $this->input->post('writer');
		$composer = $this->input->post('composer');
		$arranger = $this->input->post('arranger');
		$lyric = $this->input->post('lyric');
		$user_pic_path = $this->input->post('user_pic_path');
		$user_name = $this->input->post('user_name');
		
		$config['file_name'] = rand(1, time()).'_'.time();
		
		$this->load->library('upload', $config);
		
		if(empty($music_name) || empty($lyric) || empty($singer) ||empty($writer)||empty($composer)||empty($arranger)){
			echo "<script>alert('所有项目为必填,若没有可填无');history.go(-1);</script>";
		}
		else{
			$status_1 = $this->upload->do_upload('song');
			if(!$status_1){
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);die;
				echo "<script>alert($error);history.go(-1);</script>";
			}
			else{
				$path = $this->upload->data();
				$music_path = 'source/mp3/'.$path['file_name'];
				$this->load->model('user/music_upload');
				$this->music_upload->music_insert($user_name,$music_name,$user_pic_path,$singer,$writer,$composer,$arranger,$lyric,$music_path);
			}	
		}
	}
}
	