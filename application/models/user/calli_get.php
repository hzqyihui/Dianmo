<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得古人书画相关的数据
 * */
class Calli_get extends CI_Model{
	
	/** 
	 * 这里首页进入点击古人书画某一个对象对其进行展示
	 */
	public function calli_detail($id){
		$this->db->select('upload_calligraphy.id,upload_calligraphy.pic_path,upload_calligraphy.user_name,user.u_pic_path');
		$this->db->where('id',$id);
		$this->db->from('upload_calligraphy');
		$this->db->join('user','upload_calligraphy.user_name = user.u_name');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
	/** 
	 * 这里用户登录之后，从数据库取出用户上传的作品
	 */
	public function calli_list($name){
		
		$this->db->select('id,pic_path');
		$this->db->where('user_name',$name);
		$data = $this->db->get('upload_calligraphy')->result_array();
		return $data;
	}
	
	 /**
	 * 这里是用户登录之后，从数据库取出用户上传的作品
	 */
	 public function calli_page_list($name,$perpage,$offset){
		$this->db->select('id,pic_path');
		$this->db->limit($perpage,$offset);
		$this->db->where('user_name',$name);
		$data = $this->db->get('upload_calligraphy')->result_array();
		return $data;
	}
	
	
}
