<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_form extends CI_Controller{
	/**
	 * 用户登录
	 */
	public function log_in(){
		$this->load->library('form_validation');
		session_start();
		
		$status = $this->form_validation->run('log');
		if($status){
			$user_name = trim($this->input->post('user_name'));
			$user_pwd = $this->input->post('user_pwd');
			$user_check = strtolower($this->input->post('user_check'));
			if(empty($user_check)){
				echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
				echo "<script>alert('请输入验证码!');history.go(-1);</script>";
				die;
			}
			else if($this->session->userdata('code') != $user_check){
				echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
				echo "<script>alert('验证码输入不正确!');history.go(-1);</script>";
				die;
			}else if($user_name == 'admin_root' && $user_pwd==123 && $this->session->userdata('code') == $user_check)
			{
				$_SESSION['username'] = 'admin_root';
				$_SESSION['last_time'] = time();
				//header('Location:'.site_url('banner/to_admin'));
				header('Refresh:0.1; url='.site_url('banner/to_admin'));
			}
			else{
				$this->load->model('index/log_model');
				$status = $this->log_model->log_in($user_name,$user_pwd);
				if($status == TRUE){
					$_SESSION['username'] = $user_name;
					$_SESSION['last_time'] = time();
				}
				
			}
			
		}
		else{
			header('Refresh:0.1; url='.site_url('banner/to_log'));
		}
		
	}

	/**
	 *退出登录 
	 */
	 public function log_out(){
	 	//$this->session->sess_destroy();
	 	session_start();
		session_unset($_SESSION['username']);
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		echo "<script>alert('退出成功!');</script>";
		header('Refresh:0.1; url='.site_url('banner/to_index'));
	 }

}
