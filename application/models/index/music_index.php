<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Music_index extends CI_Model{
	
	/**
	 * 这是首页中对丝竹古韵从后台取数据到前台
	 */
	public function getsome(){
		
		$this->db->select('id,music_name,pic_path,singer,writer,composer');
		$this->db->limit(8);
		$data = $this->db->get('music')->result_array();
		return $data;
		
	}
	
	/**
	 * 这是首页中对丝竹古韵从后台取一条数据到前台
	 */
	public function get_one(){
		$this->db->select('id,pic_path');
		//选出一首音乐
		$this->db->limit(1);
		//选出点赞量最大的一首
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('music')->result_array();
		return $data;
		
	}
}
