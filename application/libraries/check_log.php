<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这里是判断是否有session值，判断用户是否登陆
 * */
 class Check_log{
 	//$username = $this->session->userdata('username');
 	public function check_log(){
	 		if(!$_SESSION['username']){
			redirect('banner/to_log');
		}
 	}
	
 }
