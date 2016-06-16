<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_model extends CI_Model{
	/**
	 * 这里是用户注册的操作插入数据库的操作
	 */
	 public function reg($user_name,$user_pwd,$user_email){
	 	$data = array(
			'u_name' => $user_name,
			'u_password' => md5($user_pwd),
			'u_email' => 	$user_email,
			'u_pic_path' => 'source\photo\personal\public.jpg'  //每个用户注册后使用统一公用头像,可自己修改
		);
		$user_data = $this->db->where('u_name' ,$data['u_name'])->get('user')->result_array();
		if(!empty($user_data)){
			echo "<script>alert('您输入的用户名已经存在!请重新输入!');history.go(-1);</script>";
		}
		else{
			if($this->db->insert('user',$data)){
				$data_2 = array(
					'user_name' => $user_name,
				);
				if($this->db->insert('admire',$data_2)){
					echo "<script>alert('恭喜你，注册成功!');</script>";
					//$this->load->model('index/email_send');
					//$bool = $this->email_send->email_out($user_email);
					//if(!$bool){
					//	echo "<script>alert('抱歉。邮件发送失败!');</script>";
					//}
					//else{
					//echo site_url('/banner/to_index'); 
					header('Refresh:0.1; url='.site_url('/banner/to_index'));
					//}
				}
				
				
			}
			else{
				echo "<script>alert('很抱歉，注册失败!');history.go(-1);</script>";
			}
		}
	 }
	 
	 public function re_ajax($name){
	 	$user_data = $this->db->where('u_name' ,$name)->get('user')->result_array();
		if(empty($user_data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	 }
}
