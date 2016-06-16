<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Calli_index extends CI_Model{
	
	/**
	 * 这是首页中对古人书画从后台取数据到前台
	 */
	public function getsome(){
		$this->db->select('id,pic_path,writer');
		$this->db->limit(8);
		$data = $this->db->get('calligraphy')->result_array();
		return $data;
		
	}
	
	/**
	 * 这是首页中对古人书画从后台取数据到前台
	 */
	public function get_one(){
		$this->db->select('id,pic_path,writer');
		//选出一篇书画
		$this->db->limit(1);
		//选出点赞量最大的一篇
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('calligraphy')->result_array();
		return $data;
		
	}
}