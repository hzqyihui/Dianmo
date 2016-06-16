<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_form extends CI_Controller{
	/**
	 *这里是对用户注册的判断和对数据模型的调用 
	 */
	 public function register(){
	 	$this->load->library('form_validation');
		
		$status = $this->form_validation->run('reg');
		
		if($status){
		 	$user_name = trim($this->input->post('user_name'));
			$user_pwd_1 = $this->input->post('user_pwd_1');
			$user_pwd_2 = $this->input->post('user_pwd_2');
			$user_email = trim($this->input->post('user_email'));
			if($user_pwd_1 != $user_pwd_2){
				echo "<script>alert('您输入的密码不一致!');history.go(-1);</script>";
			}
			else{
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$user_email)){
					echo "<script>alert('您输入的邮件不合法!');history.go(-1);</script>";
				}
				else{
					
						 
					$this->load->model('index/reg_model','reg');
					$this->reg->reg($user_name,$user_pwd_1,$user_email);
				}
				
			}
		}
		else{
			$this->load->view('user/register.html');
		}
	 }
	 
	 /**
	  * 这是对注册页面前台的ajax请求回应
	  * */
	  public function re_ajax(){
	  	$name = $_POST['name'];
		$this->load->model('index/reg_model','reg');
		$response = $this->reg->re_ajax($name);
		echo $response;
	  }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
}
