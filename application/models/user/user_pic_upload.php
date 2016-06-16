<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得用户相关介绍信息
 * */
class User_pic_upload extends CI_Model{
	
	public function user_pic_insert($user_name,$pic_path){
		$data = array(
			'u_pic_path' =>$pic_path,
		);
		
		if($this->db->where('u_name',$user_name)->update('user',$data)){
			echo "<script>alert('恭喜你，上传成功!');</script>";
			header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$user_name);
		}
		else{
			echo "<script>alert('对不起，上传失败!');history.go(-1);</script>";
		}
	}
	
	public function user_introduce_insert($user_name,$introduce){
		$data = array(
			'introduce' =>$introduce,
		);
		
		if($this->db->where('u_name',$user_name)->update('user',$data)){
			echo "<script>alert('恭喜你，更新成功!');</script>";
			header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$user_name);
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	}
	
	public function user_all_insert($user_name,$pic_path,$introduce){
		$data = array(
			'u_pic_path' =>$pic_path,
			'introduce' =>$introduce,
		);
		
		if($this->db->where('u_name',$user_name)->update('user',$data)){
			echo "<script>alert('恭喜你，更新成功!');</script>";
			header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$user_name);
		}
		else{
			echo "<script>alert('对不起，更新失败!');history.go(-1);</script>";
		}
	}
}