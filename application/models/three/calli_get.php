<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得古人书画相关的数据
 * */
class Calli_get extends CI_Model{
	
	/** 
	 * 这里首页进入古人书画对其进行展示
	 */
	public function calli_list(){
		
		$this->db->select('id,pic_path');
		$this->db->limit(16);
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('calligraphy')->result_array();
		return $data;
	}
	
	/** 
	 * 这里首页进入点击古人书画某一个对象对其进行展示
	 */
	public function calli_detail($id,$num){
		
		$this->db->select('calligraphy.id,calligraphy.pic_path,calligraphy.writer,user.u_pic_path,admire_num');
		$this->db->where('id',$id);
		$this->db->from('calligraphy');
		$this->db->join('user','calligraphy.writer = user.u_name');
		$data = $this->db->get()->result_array();
		if($num == 1){
				$data_2 = array(
		 		'admire_num' => $data[0]['admire_num']+$num,
			);
			$this->db->where('id',$id)->update('calligraphy',$data_2);
		}
		return $data;
	}
	
	/** 
	 * 这里首页进入点击古人书画某一个对象对其进行展示
	 */
	public function calli_some_detail(){
		
		$this->db->select('id,pic_path,writer,admire_num');
		$this->db->limit(16);
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('calligraphy')->result_array();
		return $data;
	}
	
	
	
	
}
