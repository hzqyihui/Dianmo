<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	/**
	 * 这是首页上的用户登录页面的数据请求
	 * */
	 public function log_in($username,$userpwd){
	 	$user_data = $this->db->where('u_name' ,$username)->get('user')->result_array();
		if(empty($user_data)){
			echo "<script>alert('您输入的用户名不存在!');history.go(-1);</script>";
		}
		else{
			foreach($user_data as $row){
				$data['name'] = $row['u_name'];
				$data['pwd'] = $row['u_password'];
			}
			if($data['name'] != $username){
				echo "<script>alert('您输入的用户名不存在!');history.go(-1);</script>";
			}
			else{
				$user_pwd = md5($userpwd);
				//echo $user_pwd;die;
				if($data['pwd'] != $user_pwd){
					echo "<script>alert('您输入的密码错误!');history.go(-1);</script>";
				}
				else{
					//echo "<script>alert('恭喜你，登录成功!');</script>";
					//$data= $this->db->select('u_id')->where('u_name',$username)->get('user')->result_array();
					//$_SESSION['id'] = $data[0]['u_id'];
					header('Refresh:0.1; url='.site_url('banner/to_index'));
					return TRUE;
					
				}
			}
		}
	}
}
