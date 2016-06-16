<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得用户相关介绍信息
 * */
class User_info extends CI_Model{
	
	/** 
	 * 这里是用户登陆后在个人主页上给出用户的相关信息
	 */
	public function user_detail($name){
		$this->db->select('u_id,u_name,u_pic_path,introduce');
		$data= $this->db->where('u_name', $name)->get('user')->result_array();
		return $data;
	}
	
	/** 
	 * 这里是诗词鉴赏页面点击作者进入其个人中心
	 */
	public function writer_detail($writer_id){
		$this->db->select('name,pic_path');
		$data= $this->db->where('id', $writer_id)->get('writer')->result_array();
		return $data;
	}
}